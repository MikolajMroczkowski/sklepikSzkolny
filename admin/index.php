<?php
session_start();
require "../confReader.php";
if(!isset($_SESSION['zalogowany']) || $_SESSION['zalogowany'] != true || !isset($_SESSION['admin']) || $_SESSION['admin'] != true || !isset($_SESSION['previllages']) || $_SESSION['previllages'] > 0){
//    echo "<meta http-equiv='refresh' content='0; ../index.php' />";
//    exit;
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
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<main>
    <div class="container">
        <h1>Witaj, <?php  echo $_SESSION['username'] ?></h1>
    </div>
</main>
</body>
</html>