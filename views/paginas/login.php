<div class="fondo-login">

    <div class="encabezado-login">
        <h2><img class="logo" src="build/img/logo.png">Invernadero App</h2>
    </div>
    <div class="login-box">
        <img src="build/img/logo.png" class="avatar" alt="Avatar Image">
        <h1>Login</h1>

        <?php
        include_once __DIR__ . "/../templates/alertas.php";
        ?>
        <form method="POST" action="">
            <!-- USERNAME INPUT -->
            <label for="username">Correo electronico.</label>
            <input name="correo" type="text" placeholder="Ingresar Usuario">
            <!-- PASSWORD INPUT -->
            <label for="password">Password</label>
            <input name="password" type="password" placeholder="Ingresar Password">
            <input type="submit" value="Log In">
            <a href="#">Has perdido tu contraseña?</a><br>
        </form>
    </div>
</div>

<?php
include 'footer.php';
?>