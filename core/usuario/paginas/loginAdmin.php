<?php
include "..\..\db\config.php";
include "..\..\usuario\usuario.php";
require_once "../../../layout/Layout.php";

$layout = new Layout(true);

if (isset($_POST["user"]) && $_POST["user"] != null) {

    $usuario = new usuario();

    $resultado = $usuario->iniciar_sesion_admin($_POST['user'], $_POST['pass']);

    if ($resultado->num_rows > 0) {
        $ciudadano = $resultado->bind_result($id);
        $ciudadano = $resultado->fetch();
        $usuario = "Administrador";
        $idadmin = $id;
        $resultado->close();

        header("location: ../../../index.php?usuario=" . $usuario . "&id=" . $idadmin);
    } else {
        $_SESSION['mensaje'] = "Usuario no encontrado";
    }
}
?>
<link href="../../../assets/loginAdmin.css" rel="stylesheet">
<?php $layout->printHeader() ?>

<main class="text-center mt-4">
    <h3>
    <?php if (isset($_SESSION["mensaje"])) : ?>
        <div class="alert alert-warning" role="alert">
          <?php echo $_SESSION["mensaje"]; ?>
        </div>
      <?php endif ?>
    </h3>
    <form class="form-signin" method="post" action="loginAdmin.php" >
        <img class="mb-4" src="../../../tools/images/login.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Administrator</h1>
            
        <label for="inputEmail" class="sr-only">User</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Administrator Account" name="user" required="" autofocus="">

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" required="">
        <div class="checkbox mb-3">
            <label>
            <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
</main>

<?php $layout->printFooter() ?>