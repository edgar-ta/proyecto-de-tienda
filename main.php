<?php

include_once "./html/general/header.php";

?>
    <script type="module" src="./main.js"></script>
    <carousel-element></carousel-element>

    <template id="carouselElementTemplate">
        <button id="leftButton"><</button>
        <div id="window"><div id="tape">
        </div></div>
        <button id="rightButton">></button>
    </template>

    <template id="carouselCardTemplate">
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