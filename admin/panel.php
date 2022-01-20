<?php
echo $_SESSION['username'];
session_start();
require "../confReader.php";
if (!isset($_SESSION['logedin']) || $_SESSION['logedin'] != true || !isset($_SESSION['admin']) || $_SESSION['admin'] != true || !isset($_SESSION['previllages']) || $_SESSION['previllages'] == 0) {
    echo "<meta http-equiv='refresh' content='0; ../index.php' />";
    exit;
}
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin panel - <?php echo getName(); ?></title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css"
          integrity="sha512-1fPmaHba3v4A7PaUsComSM4TBsrrRGs+/fv0vrzafQ+Rw+siILTiJa0NtFfvGeyY5E182SDTaF5PqP+XOHgJag=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
<main>
    <div class="container">
        <div class="header"><h1>Witaj, <?php echo $_SESSION['username'] ?></h1><h4>Main</h4></div>
        <a href="../logout.php">
            <div class="block small-height small-width"><i class="bi bi-box-arrow-left"></i>Log out</div>
        </a>
        <a href="./products.php">
            <div class="block small-height small-width"><i class="bi bi-shop"></i>Products</div>
        </a>
        <div class="block small-height small-width"><i class="bi bi-archive"></i>Orders</div>
        <div class="block small-height small-width"><i class="bi bi-tags"></i>Tags</div>
        <div class="block small-height small-width"><i class="bi bi-book"></i>Pages</div>
        <div class="block small-height small-width"><i class="bi bi-front"></i>NavBar</div>
        <div class="block small-height small-width"><i class="bi bi-sliders"></i>Settings</div>
        <div class="block big-width big-height info"><h3>Zamówienia (Do realizacji)</h3></div>
        <div class="block big-width big-height info"><h3>Zamówienia (Do realizacji)</h3></div>
</main>
</body>
</html>