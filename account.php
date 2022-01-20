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
    renderTitle("account");
    ?>
</head>
<body>
<?php
renderMenu("ACCOUNT");
?>
<main>
    <div class="container">

    </div>
</main>
</body>
</html>