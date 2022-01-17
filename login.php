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
            <input placeholder="Login...">
            <br>
            <input placeholder="Password..." type="password">
            <br>
            <a class="btn" href="register.php">Zarejstruj sie</a>
            <input class="btn login" type="submit" value="Zaloguj sie">
        </form>
    </div>
</main>
</body>
</html>