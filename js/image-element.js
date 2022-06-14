customElements.define("image-element", class ImageElement extends HTMLElement {
    static template = document.getElementById("imageElementTemplate").content;

    constructor() {
        super();
        this.__shadowRoot__ = this.attachShadow({ mode: "open" });
        this.__shadowRoot__.appendChild(ImageElement.template.cloneNode(true));

        let image = this.__shadowRoot__.querySelector("img");

        [ "src", "alt" ].forEach(key => image.setAttribute(key, this.getAttribute(key)));

        let float = this.getAttribute("float");
        this.classList.add(`float-${float}`);

        let a = this.__shadowRoot__.querySelector("a");
        a.innerText = this.getAttribute("alt");
        let url = new URL("http://localhost/php/image-request.php");
        url.search = new URLSearchParams({ "src": this.getAttribute("src"), "alt": this.getAttribute("alt") });
        a.href = url;
        a.title = "Da click para ver la imagen en grande";
    }
});
