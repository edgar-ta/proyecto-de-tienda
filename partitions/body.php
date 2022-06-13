<link rel="stylesheet" href="/css/body.css">
<script type="module" src="/js/post-element.js"></script>
<script src="/js/body.js" defer></script>

<template id="postElementTemplate">
    <link rel="stylesheet" href="/css/post-element.css">
    <h2></h2>
    <p><slot></slot></p>
    <button>Leer más &#10140;</button>
</template>

<section>
    <h1>Moctezuma Xocoyotzin</h1>
    <video class="moctezuma-video" src="/res/moctezuma.mp4" controls autoplay></video>
</section>

<section id="articles">
    <h1>Artículos</h1>
    <post-element header="Biografía" href="/info/biography.php">
        fdksljflksdj
    </post-element>
    
    <post-element header="Descendencia" href="/info/offspring.php">
        fdksljflksdj
    </post-element>

    <post-element header="Reinado" href="/info/reign.php">
        fdksljflksdj
    </post-element>
    
    <post-element header="Trivia" href="/info/trivia.php">
        fdksljflksdj
    </post-element>
</section>
