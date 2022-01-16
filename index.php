<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <?php
    require "render.php";
    renderLinks();
    renderTitle("main");
    ?>
</head>
<body>
<?php
renderMenu("MAIN");
?>
<main>
    <div class="container">
        <div class="products">
        <?php
        for($i=0;$i<10;$i++){
            renderProduct(2,"product.php?id=2","https://www.carrefour.pl/images/product/350x350/mlekovita-maslo-polskie-ekstra-bez-dodatkow-82-200-g-rubqt2.jpg","Mlekovita Masło Polskie 82% 200 g","7,89 zł");
        }
        ?>
        </div>
    </div>
</main>
</body>
</html>