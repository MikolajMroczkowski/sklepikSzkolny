<?php
session_start();
if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
    echo "<meta http-equiv='refresh' content='0; panel.php' />";
    exit;
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <?php
    require "render.php";
    renderLinks();
    renderTitle("log in");
    ?>
</head>
<body>
<?php
renderMenu("ACCOUNT");
?>
<main>
    <div class="container">
        <form class="form" METHOD="post">
            <h1>Zarejstruj sie</h1>
            <input name="login" placeholder="Login...">
            <br>
            <input name="email" placeholder="E-mail..." type="email">
            <br>
            <input name="password" placeholder="Password..." type="password">
            <br>
            <input name="repassword" placeholder="Re Password..." type="password">
            <br>
            <a class="btn" href="login.php">Zaloguj sie</a>
            <input class="btn login" type="submit" value="Zarejstruj sie">
            <?php
            if ($_POST) {
                require "config.php";
                if (isset($_POST['email']) && $_POST['email'] != "" && isset($_POST['repassword']) && $_POST['repassword'] != ""&&isset($_POST['login']) && $_POST['login'] != "" && isset($_POST['password']) && $_POST['password'] != "") {
                    if($_POST['password']!=$_POST['repassword']){
                        die("<p class='errBox'>Hasła sa niezgodne</p>");
                    }
                    require "config.php";
                    $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
                    $conn = new mysqli($dbAdress, $dbUser, $dbPass, $dbName);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = $conn->prepare("SELECT * from users WHERE username=? OR email=?");
                    $sql->bind_param("ss", $_POST['login'],$_POST['email']);
                    $sql->execute();
                    $result = $sql->get_result();
                    if ($result->num_rows == 0) {
                        $sql = $conn->prepare("INSERT into users (username,password,email,previllages) VALUES (?,?,?,0)");
                        $sql->bind_param("sss", $_POST['login'],$password,$_POST['email']);
                        $sql->execute();
                        echo "<p class='errBox'>Utworzono</p>";
                    } else {
                        echo "<p class='errBox'>Nazwa uzytkownika lub email zajeta</p>";
                    }
                    $conn->close();
                } else {
                    echo "<p class='errBox'>Wypełnij wszystkie pola!</p>";
                }
            }
            ?>
        </form>
    </div>
</main>
</body>
</html>