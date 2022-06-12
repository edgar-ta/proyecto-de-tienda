customElements.define("post-element", class PostElement extends HTMLElement {
    static template = document.getElementById("postElementTemplate").content;

    constructor() {
        super();
        this.__shadowRoot__ = this.attachShadow({ mode: "open" });
        this.__shadowRoot__.appendChild(PostElement.template.cloneNode(true));

        this.__shadowRoot__.querySelector("h2").innerText = this.getAttribute("header");
    }
});

