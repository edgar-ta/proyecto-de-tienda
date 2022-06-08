export class CustomElement extends HTMLElement {
    /** @type {ShadowRoot} **/
    __shadowRoot__;

    constructor() {
        super();
        this.__init__();
    }
}

export function defineCustomElement(namedClass) {
    const kebabCase = (string) => string.split(/(?=[A-Z])/).map(element => element.toLowerCase()).join("-");
    const camelCase = (string) => string.charAt(0).toLowerCase() + string.slice(1);

    let name = namedClass.name;
    const template = document.getElementById(`${camelCase(name)}Template`).content;
    namedClass.prototype.__init__ = function() {
        this.__shadowRoot__ = this.attachShadow({ "mode": "open" });
        this.__shadowRoot__.appendChild(template.cloneNode(true));
    };
    customElements.define(kebabCase(name), namedClass);
}
