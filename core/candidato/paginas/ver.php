<h1><?= $nombre . " " . $apellido ?></h1>
<div class="row">
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <?php
                if ($estado == 1) {
                    echo "Activo";
                } else {
                    echo "Inactivo";
                }
                ?>
            </div>
            <div class="card-body">
                <a href="index.php?clase=candidato&funcion=inicio" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Regresar a inicio</span>
                </a>
                |
                <a href="index.php?clase=candidato&funcion=editar&id=<?= $id ?>" class="btn btn-warning btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                    <span class="text">Editar</span>
                </a>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Foto relacionada</h6>
            </div>
            <div class="card-body">
                <?php
                $dir = 'tools/img/';
                if (file_exists($dir . $foto)) {
                    echo '<img src="' . $dir . $foto . '" width="100%" height="100%">';
                }
                ?> </div>
        </div>
    </div>
    <div class="col-lg-4">
        <h3>Partido</h3>
        <div class="card shadow mb-4">
            <?php
            if ($resultado = $this->dbContext->prepare('SELECT nombre, descripcion, logo  FROM partida WHERE id = ?')) {
                $resultado->bind_param('i', $idpartido);
                $resultado->execute();
                $resultado->store_result();
                $resultado->bind_result($nombre, $descripcion, $logo);
                $resultado->fetch();
                $resultado->close();
            }
            $dir = 'tools/img/';
            if (file_exists($dir . $logo)) {
                $a = '<img src="' . $dir . $logo . '" width="100%" height="100%">';
            }else {
                $a="";
            }
            echo '<div class="card-header py-3">' . $nombre . '</div>
                    <div class="card-body">' . $descripcion . '</div>
                    <div class="card-body">' . $a . '</div>';
            ?>
        </div>
        <h3>Puesto</h3>
        <div class="card shadow mb-4">
            <?php
            if ($resultado = $this->dbContext->prepare('SELECT nombre, descripcion  FROM puesto WHERE id = ?')) {
                $resultado->bind_param('i', $idpuesto);
                $resultado->execute();
                $resultado->store_result();
                $resultado->bind_result($nombre, $descripcion);
                $resultado->fetch();
                $resultado->close();
            }

            echo '<div class="card-header py-3">' . $nombre . '</div>
                    <div class="card-body">' . $descripcion . '</div>';
            ?>
        </div>
    </div>
</div>