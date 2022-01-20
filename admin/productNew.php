<?php
session_start();
require "../confReader.php";
if (!isset($_SESSION['logedin']) || $_SESSION['logedin'] != true || !isset($_SESSION['admin']) || $_SESSION['admin'] != true || !isset($_SESSION['previllages']) || $_SESSION['previllages'] == 0) {
    die("<meta http-equiv='refresh' content='0; ../index.php' />");
    exit;
}
if ($_POST) {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $photo = $_POST['photo'];
    $about = $_POST['about'];
    require "../config.php";
    $conn = new mysqli($dbAdress, $dbUser, $dbPass, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = $conn->prepare("INSERT INTO produkty (title,price,about,photo,removed) VALUES (?,?,?,?,0)");
    $sql->bind_param("sdss", $title, $price, $about, $photo);
    $sql->execute();
    $sql2 = $conn->prepare("SELECT id from produkty WHERE title=? AND price=? AND about=? AND photo=? AND removed=0");
    $sql2->bind_param("sdss", $title, $price, $about, $photo);
    $sql2->execute();
    $result = $sql2->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo $row['id'];
        }
    }
    $conn->close();
}