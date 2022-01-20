<?php
require "render.php";
require_once "function.php";
checkLogin();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <?php
    renderLinks();
    renderTitle("koszyk");
    ?>
</head>
<body>
<?php
renderMenu("CART");
?>
<main>
    <div class="container">
        <div class="cartProducts column">
            <h1>Produkty</h1>
            <?php
            for($i=0;$i<10; $i++) {
                renderProductInCart(1,"https://www.carrefour.pl/images/product/350x350/mlekovita-maslo-polskie-ekstra-bez-dodatkow-82-200-g-rubqt2.jpg","Mlekovita Masło Polskie 82% 200 g","7,89 zł");
            }
            ?>
        </div>
        <div class="summary column">
            <h1>Podsumowanie</h1>
            <p>Kwota Zamowienia: <b>1200,00 zł</b></p>
            <p>Promocja: -<b>1200,00 zł</b></p>
            <p>Do Zapłaty: <b>0,00 zł</b></p>
            <button class="btn order">Zamow!</button>
            <hr>
            <input class="promoInput promo" placeholder="Kod promocyjny...">
            <button class="promoBtn promo">Uzyj kodu</button>
        </div>
    </div>
</main>
</body>
</html>