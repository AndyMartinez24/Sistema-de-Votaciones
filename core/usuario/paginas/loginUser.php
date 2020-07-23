<?php
include "..\..\db\config.php";
include "..\..\usuario\usuario.php";
include "../../../layout/Layout.php";

$layout = new Layout(true);

if (isset($_POST["cedula"]) && $_POST["cedula"] != null) {

  $usuario = new usuario();

  $resultado = $usuario->iniciar_sesion($_POST['cedula']);

  if ($resultado->num_rows == 1) {

    $ciudadano = $resultado->bind_result($cedula, $nombre, $apellido);
    $ciudadano = $resultado->fetch();
    $usuario = $nombre . " " . $apellido;
    $id = $cedula;
    $resultado->close();

    header("location: ../../../index.php?usuario=" . $usuario . "&id=" . $id);
  } else {
    $_SESSION['mensaje'] = "Usuario no encontrado o esta inactivo";
  }
}
?>
<?php $layout->printHeader() ?>

<main role="main" class="container">
  <div class="jumbotron pb-2">
    <h1 class="display-4">Bienvenido a SADVO</h1>
    <p class="lead">A continuación ingrese su documento de identidad para iniciar el proceso de votación.</p>
  </div>
</main>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <h3 class="my-0 py-0">
      <?php if (isset($_SESSION["mensaje"])) : ?>
        <div class="alert alert-warning" role="alert">
          <?php echo $_SESSION["mensaje"]; ?>
        </div>
      <?php endif ?>
      <h3 class="mt-4 py-0">
        <?php
        if (isset($_SESSION["mensaje"])) {
          echo $_SESSION["mensaje"];
        }
        ?>
      </h3>
      <form class="pt-4" method="post" action="loginUser.php">
        <input type="text" id="login" class="fadeIn second" name="cedula" placeholder="Documento de Identidad (Cédula)">
        <input type="submit" class="fadeIn fourth" value="Entrar">
      </form>
  </div>
  <?php $layout->printFooter() ?>
</div>