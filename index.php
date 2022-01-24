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
    renderTitle("main");
    ?>
</head>
<body>
<?php
renderMenu("MAIN");
?>
<main>
    <div class="container">
        <div class="products">
            <?php
            require "config.php";
            $conn = new mysqli($dbAdress, $dbUser, $dbPass, $dbName);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM produkty WHERE removed = 0";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    renderProduct($row['id'],"product.php?id=".$row['id'],$row['photo'],$row['title'],$row['price']);
                }
            } else {
                echo "Database is empty";
            }
            $conn->close();
            ?>
        </div>
    </div>
</main>
</body>
</html>