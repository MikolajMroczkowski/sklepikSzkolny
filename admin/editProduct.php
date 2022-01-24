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
    <title>Product Editor - <?php echo getName(); ?></title>
    <link rel="stylesheet" href="../css/admin.css">
    <script src="../js/admin.js"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css"
          integrity="sha512-1fPmaHba3v4A7PaUsComSM4TBsrrRGs+/fv0vrzafQ+Rw+siILTiJa0NtFfvGeyY5E182SDTaF5PqP+XOHgJag=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
    <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
</head>
<body>
<main>
    <?php
    $_prod['title'] = "";
    $_prod['price'] = 99.99;
    $_prod['about'] = "## opis";
    $_prod['photo'] = "https://st3.depositphotos.com/23594922/31822/v/600/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg";
    if ($_GET['id'] != "NEW") {
        echo "<script>isNew=false;  id=" . $_GET['id'] . "</script>";
        require "../config.php";
        $conn = new mysqli($dbAdress, $dbUser, $dbPass, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = $conn->prepare("SELECT * from produkty WHERE id=?");
        $sql->bind_param("i", $_GET['id']);
        $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_prod['title'] = $row['title'];
                $_prod['price'] = $row['price'];
                $_prod['about'] = $row['about'];
                $_prod['photo'] = $row['photo'];
            }
        } else {
            echo "Unknown product";
        }
        $conn->close();
    }
    ?>
    <div id="photoUploader" class="modal">
        <div class="box">
            <h1>Upload Photo</h1>
            <input accept=".jpg,.gif,.webp,.png" id="photoUploaderInput" type="file">
            <button onclick="closeModal('photoUploader')" class="btn">Zamknij</button>
            <input class="btn green" type="submit" onclick="uploadFile()" value="Dodaj">
        </div>
    </div>
    <div class="container">

        <div class="header"><h1>Witaj, <?php echo $_SESSION['username'] ?></h1><h4>Edit Products</h4></div>

        <a href="products.php">
            <div class="block small-height small-width"><i class="bi bi-chevron-left"></i>Go Back</div>
        </a>
        <div onclick="openModal('photoUploader')" class="block small-height small-width"><img id="photo"
                    src="<?php echo $_prod['photo'] ?>">Edit
            Image
        </div>
        <div class="block small-height small-width" onclick="saveProduct()"><i class="bi bi-hdd"></i>Save</div>
        <div class="block small-height small-width" onclick="killProduct()"><i class="bi bi-trash"></i>Remove</div>
        <div class="block huge-height max-width"><h3>Edytor</h3>
            <input class="name" id="title" value="<?php echo $_prod['title'] ?>" placeholder="Nazwa">
            <input class="name" id="price" value="<?php echo $_prod['price'] ?>" type="number" placeholder="Cena...">
            <div class="editor">
                <textarea id="my-text-area"><?php echo $_prod['about'] ?></textarea>
                <script>
                    const easyMDE = new EasyMDE({element: document.getElementById('my-text-area')});
                </script>
            </div>
        </div>
    </div>
</main>
</body>
</html>