// no supe cómo usar links en vez de botones en el css y mejor les añadí un
// listener en el javascript xd

document.querySelectorAll(".post-button__container").forEach(container => {
    container.addEventListener("click", () => document.location = container.getAttribute("href"));
});

