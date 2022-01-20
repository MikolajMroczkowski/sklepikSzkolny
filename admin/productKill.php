<?php
session_start();
require "../confReader.php";
if (!isset($_SESSION['logedin']) || $_SESSION['logedin'] != true || !isset($_SESSION['admin']) || $_SESSION['admin'] != true || !isset($_SESSION['previllages']) || $_SESSION['previllages'] == 0) {
    die("<meta http-equiv='refresh' content='0; ../index.php' />");
    exit;
}
if ($_POST) {
    $id = $_POST['id'];
    require "../config.php";
    $conn = new mysqli($dbAdress, $dbUser, $dbPass, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = $conn->prepare("UPDATE produkty SET removed=1 WHERE id=? ");
    $sql->bind_param("i", $id);
    $sql->execute();
    $conn->close();
}