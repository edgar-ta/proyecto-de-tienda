<?php

include_once dirname(__DIR__) . "/partitions/header.php";


?>
<?php if(key_exists("src", $_GET) && key_exists("alt", $_GET)): ?>
    <aside>
        <div style="
        z-index: 5;
        position: fixed; 
        top: 0; 
        left: 100%; 
        background-color: white; 
        border: 1px solid black; 
        border-radius: 3px; 
        padding: 1vmin;
        transform: translateX(-100%);
        ">
            <h2>Cambia el tamaño de la imagen</h2>
            <input type="number" id="widthPercentageInput" value="100" max="100" min="10" step="1">
        </div>
    </aside>
    <div>
        <h1 style="text-align: center; margin-bottom: 0;"><?=$_GET["alt"]?></h1>
        <img id="image" src="<?= $_GET["src"] ?>" alt="<?= $_GET["alt"] ?>" style="width: 100%; margin: 5vh auto;" title="<?= $_GET["alt"] ?>">

        <script defer>

const image = document.getElementById("image");
const input = document.getElementById("widthPercentageInput");

function changeImageSize() {
    let newSize = input.value;
    image.style.width = `${newSize}%`;
}

input.addEventListener("change", changeImageSize);

        </script>
    </div>
<?php else: ?>
    <h1>Hubo un error con la imagen especificada :(</h1>
<?php endif; ?>

<?php

include_once dirname(__DIR__) . "/partitions/footer.php";
