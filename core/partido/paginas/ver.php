<h1><?= $nombre ?></h1>
<div class="row">

    <div class="col-lg-6">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                &nbsp;
            </div>
            <div class="card-body">
                <?= $descripcion ?>
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

    </div>

    <div class="col-lg-6">

        <!-- Default Card Example -->
        <div class="card mb-4">
            <div class="card-header">
                Foto relacionada
            </div>
            <div class="card-body">
                <?php
                $dir = 'tools/img/';
                if (file_exists($dir . $logo)) {
                    echo '<img src="' . $dir . $logo . '" width="100%" height="100%">';
                }
                ?>
            </div>
        </div>

    </div>
</div>

<a href="index.php?clase=partido&funcion=inicio" class="btn btn-success btn-icon-split">
    <span class="icon text-white-50">
        <i class="fas fa-check"></i>
    </span>
    <span class="text">Regresar a inicio</span>
</a>
|
<a href="index.php?clase=partido&funcion=editar&id=<?= $id ?>" class="btn btn-warning btn-icon-split">
    <span class="icon text-white-50">
        <i class="fas fa-exclamation-triangle"></i>
    </span>
    <span class="text">Editar</span>
</a>