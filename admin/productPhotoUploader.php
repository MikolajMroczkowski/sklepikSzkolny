<?php
require "../config.php";
/* Get the name of the uploaded file */
$exts = explode(".", $_FILES['file']['name']);
if (sizeof($exts) != 2) {
    die("ERROR cannot upload file");
}
if (!in_array($exts[1], ["jpg", "png", "gif"])) {
    die("ERROR unknown file extension");
}
$uid = testUniq(generateRandomString(25));
$location = $workDir."/photos/" . $uid . "." . $exts[1];

if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
    echo $uid . "." . $exts[1];
} else {
    echo 'ERROR Problem while uploading file';
}

function testUniq($str)
{
    require "../config.php";
    $conn = new mysqli($dbAdress, $dbUser, $dbPass, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * from produkty WHERE photo like '%" . $str . "%'";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows == 0) {
        return $str;
    } else {
        return testUniq(generateRandomString(25));
    }
}

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>