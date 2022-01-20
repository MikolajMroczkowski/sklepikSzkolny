<?php
function getName()
{
    return getParam("app_name");
}

function getParam($paramName)
{
    require "config.php";
    $conn = new mysqli($dbAdress, $dbUser, $dbPass, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT value from vals WHERE name='" . $paramName . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            return $row['value'];
        }
    } else {
        return "NOTFOUND";
    }
    $conn->close();
}

function setParam($paramName, $paramValue)
{
    require "config.php";
    $conn = new mysqli($dbAdress, $dbUser, $dbPass, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sqlDelete = "DELETE FROM vals WHERE name='" . $paramName . "'";
    $conn->query($sqlDelete);
    $sqlInsert = "INSERT INTO vals  (name,value) VALUES ('" . $paramName . "','" . $paramValue . "')";
    $conn->query($sqlInsert);
    $conn->close();
}