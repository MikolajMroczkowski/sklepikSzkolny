<?php
session_start();
if(!isset($_SESSION['zalogowany']) || $_SESSION['zalogowany'] !=true){
    echo "<meta http-equiv='refresh' content='0; ../login.php' />";
    exit;
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <?php
    require "render.php";
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