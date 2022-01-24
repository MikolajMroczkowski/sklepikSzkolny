<?php
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
    <title>Products Manager - <?php echo getName(); ?></title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css"
          integrity="sha512-1fPmaHba3v4A7PaUsComSM4TBsrrRGs+/fv0vrzafQ+Rw+siILTiJa0NtFfvGeyY5E182SDTaF5PqP+XOHgJag=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="../js/admin.js"></script>
</head>
<body>
<main>
    <div class="container">
        <div class="header"><h1>Witaj, <?php echo $_SESSION['username'] ?></h1><h4>Products</h4></div>

        <a href="panel.php">
            <div class="block small-height small-width"><i class="bi bi-chevron-left"></i>Go Back</div>
        </a>
        <a href="editProduct.php?id=NEW">
            <div class="block small-height small-width"><i class="bi bi-plus-circle"></i>New</div>
        </a>
        <div class="block huge-height max-width "><h3>Moje Produkty</h3>
            <div class="flexListBox">
                <?php
                require "../config.php";
                $conn = new mysqli($dbAdress, $dbUser, $dbPass, $dbName);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT * FROM produkty WHERE removed=0";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<a href="editProduct.php?id=' . + $row['id'] .'"><div class="box"><img src="'.$row['photo'].'"><p>'.$row['title'].'</p><p class="price">'.$row['price'].'</p></div></a>';
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