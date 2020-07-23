<div class="col-lg-8">
    <h1><?= $cedula ?></h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $nombre . " " . $apellido ?></h6>
        </div>
        <div class="card-body">
            <?= $email ?>
        </div>
        <div class="card-body">
            <?php
            if ($estado == 1) {
                echo "Activo";
            } else {
                echo "Inactivo";
            }
            ?>
        </div>
    </div>
    <a href="index.php?clase=ciudadano&funcion=inicio" class="btn btn-success btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-check"></i>
        </span>
        <span class="text">Regresar a inicio</span>
    </a>
    |
    <a href="index.php?clase=ciudadano&funcion=editar&id=<?= $id ?>" class="btn btn-warning btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-exclamation-triangle"></i>
        </span>
        <span class="text">Editar</span>
    </a>
</div>