<?php
function checkLogin()
{
    require_once "confReader.php";
    session_start();
    if (!isset($_SESSION['logedin']) || $_SESSION['logedin'] != true) {
        echo "<meta http-equiv='refresh' content='0; login.php' />";
        exit;
    }
}