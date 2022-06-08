function relativeURL(pathname, parameters) {
    let url = new URL(pathname, "http://localhost/");
    url.search = new URLSearchParams(parameters);
    return url;
}

export { relativeURL };
