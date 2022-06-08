import { CustomElement } from "./custom-element.js";
import { CarouselCard } from "./carousel-card.js";
import { relativeURL } from "./utils.js";

/**
 * Class that can show elements in a lightweight, lazy manner.
 * 
 * Ideally, the number of elements in each load (`batch`) should
 * be greater than the threshold of the carousel.
 * 
 * TODO
 * Check for inclusivity (validate the ranges I've been using are
 * actually correct)
 */
export class CarouselElement extends CustomElement {
    /** @type {number} **/
    currentIndex;

    /** @type {number} **/
    visibleCards;

    /** @type {CarouselCard[]} **/
    cards;

    /** @type {number} **/
    currentToken;

    /** @type {boolean} **/
    done;

    /** @type {number} **/
    threshold;

    constructor() {
        super();
        this.cards =  Array.from(this.__shadowRoot__.querySelectorAll("carousel-card"));
        this.currentIndex = Number.parseInt(this.getAttribute("data-current-index")) ?? 0;
        this.visibleCards = Number.parseInt(this.getAttribute("data-visible-cards")) ?? 1;

        this.__shadowRoot__.getElementById("leftButton").addEventListener("click", () => this.slip(-1));
        this.__shadowRoot__.getElementById("rightButton").addEventListener("click", () => this.slip(1));
    }

    /**
     * @param {number} offset 
     */
    slide(offset) {
        let nextIndex = this.currentIndex + offset;
        let enabledRange  = [];
        let disabledRange = [];
        if (offset >= this.visibleCards)  {
            enabledRange  = [ 
                nextIndex, 
                nextIndex + this.visibleCards 
            ];
            disabledRange = [ 
                this.currentIndex, 
                this.currentIndex + this.visibleCards 
            ];
        } else {
            // if the offset is lesser than the number of visible cards, then there
            // is an overlap between the new cards and the older ones; which we
            // can use to gain some performance
            enabledRange  = [ 
                nextIndex, 
                this.currentIndex 
            ].sort();
            disabledRange = [ 
                this.currentIndex + this.visibleCards, 
                this.currentIndex + this.visibleCards + offset 
            ].sort();
        }
        this.cards.slice(...enabledRange).forEach(this.enableCard);
        this.cards.slice(...disabledRange).forEach(this.disableCard);
        this.controlOffset = nextIndex;

        this.__shadowRoot__.getElementById("leftButton").toggleAttribute("disabled",  this.currentIndex == 0);
        this.__shadowRoot__.getElementById("rightButton").toggleAttribute("disabled", this.currentIndex == this.cards.length - 1 && !this.done);

        // I might want this to execute this before enabling or disabling the cards
        // so that the new cards added by the request show up correctly
        if (this.cards.length - (this.currentIndex + this.visibleCards) < this.threshold && !this.done) {
            this.doRequest();
        }
    }

    /**
     * @param {number} nextIndex
     */
    set controlOffset(nextIndex) {
        this.currentIndex = nextIndex;
        /** @type {HTMLHtmlElement} **/
        let root = document.querySelector(":root");
        // i'll probably want to set this to a negative value
        // to represent better the offset to the left
        root.style.setProperty("--control-offset", nextIndex);
    }

    doRequest() {
        fetch(relativeURL("requests.php", { "currentToken": this.currentToken }))
            .then(response => response.json())
            .then(json => {
                this.done         = json.done;
                this.currentToken = json.currentToken;
                let tape = this.__shadowRoot__.getElementById("tape");
                let nextCards     = json.nextCards.map(cardInformation => {
                    /** @type {CarouselCard} **/
                    let card      = document.createElement("carousel-card");
                    Object.entries(cardInformation).forEach(([ key, value ]) => card[key] = value);
                    tape.appendChild(card);
                    return card;
                });
                this.cards.concat(nextCards);
            })
            .catch(_ => this.__shadowRoot__.getElementById("rightButton").setAttribute("disabled"));
    }

    disableCard(card) {
        card.setAttribute("data-enabled", "false");
    }

    enableCard(card) {
        card.setAttribute("data-enabled", "true");
    }

    toggleCard(index) {
        this.cards[index].toggleAttribute("data-enabled");
    }

}
