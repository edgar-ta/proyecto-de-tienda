<?php

include_once "./html/general/header.php";

?>
    <script type="module" src="./main.js"></script>
    <carousel-element></carousel-element>

    <template id="carouselTemplate">
        <button id="left"><</button>
        <div id="window"><div id="tape">
        </div></div>
        <button id="right">></button>
    </template>

    <template id="carouselCardTemplate" data-properties="src, rate, name, price">
        <h2></h2>
        <div>
            <img>
            <!-- this div is used for the rating -->
            <div></div>
        </div>
        <p></p>
    </template>

<?php

include_once "./html/general/footer.php";