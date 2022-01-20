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
            <h1>Zaloguj sie</h1>
            <input name="login" placeholder="Login...">
            <br>
            <input name="password" placeholder="Password..." type="password">
            <br>
            <a class="btn" href="register.php">Zarejstruj sie</a>
            <input class="btn login" type="submit" value="Zaloguj sie">
            <?php
            if ($_POST) {
                require "config.php";
                if (isset($_POST['login']) && $_POST['login'] != "" && isset($_POST['password']) && $_POST['password'] != "") {

                    $conn = new mysqli($dbAdress, $dbUser, $dbPass, $dbName);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = $conn->prepare("SELECT * from users WHERE username=?");
                    $sql->bind_param("s", $_POST['login']);
                    $sql->execute();
                    $result = $sql->get_result();
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if (password_verify($_POST['password'], $row['password'])) {
                                session_start();
                                $_SESSION['logedin'] = true;
                                $_SESSION['userID'] = $row['id'];
                                $_SESSION['admin'] = $row['previllages'] > 0;
                                $_SESSION['previllages'] = $row['previllages'];
                                $_SESSION['username'] = $row['username'];
                                $_SESSION['email'] = $row['email'];
                                echo "<meta http-equiv='refresh' content='0; index.php' />";
                            } else {
                                echo "<p class='errBox'>Złe hasło uzytkownika</p>";
                            }
                        }
                    } else {
                        echo "<p class='errBox'>Zła nazwa uzytkownika</p>";
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