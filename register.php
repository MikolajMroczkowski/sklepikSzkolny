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
            <input placeholder="Login...">
            <br>
            <input placeholder="E-mail..." type="email">
            <br>
            <input placeholder="Password..." type="password">
            <br>
            <input placeholder="Re Password..." type="password">
            <br>
            <a class="btn" href="login.php">Zaloguj sie</a>
            <input class="btn login" type="submit" value="Zarejstruj sie">
        </form>
    </div>
</main>
</body>
</html>