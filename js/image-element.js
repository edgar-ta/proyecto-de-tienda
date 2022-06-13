customElements.define("image-element", class ImageElement extends HTMLElement {
    static template = document.getElementById("imageElementTemplate").content;

    constructor() {
        super();
        this.__shadowRoot__ = this.attachShadow({ mode: "open" });
        this.__shadowRoot__.appendChild(ImageElement.template.cloneNode(true));

        let image = this.__shadowRoot__.querySelector("img");

        [ "src", "alt" ].forEach(key => image.setAttribute(key, this.getAttribute(key)));

        let float = this.getAttribute("float");
        image.classList.add(`float-${float}`);
    }
});
