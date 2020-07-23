<div class="card o-hidden border-0 shadow-lg my-1">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Editar candidato</h1>
        </div>
        <form class="user" action="index.php?clase=candidato&funcion=editar&id=<?= $id ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" placeholder="Nombre" name="nombre" value="<?= $nombre ?>">
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" placeholder="Apellido" name="apellido" value="<?= $apellido ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <select name="idpartido" class="form-control">
                        <?php
                        if ($resultado = $this->dbContext->query('SELECT id, nombre FROM partida ORDER BY id DESC')) {
                            $puestos = mysqli_fetch_all($resultado);
                            $resultado->free();
                        }
                        foreach ($puestos as $key => $value) {
                            echo '<option value="' . $value[0] . '" >' . $value[1] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <select name="idpuesto" class="form-control">
                        <?php
                        if ($resultado = $this->dbContext->query('SELECT id, nombre FROM puesto ORDER BY id DESC')) {
                            $puestos = mysqli_fetch_all($resultado);
                            $resultado->free();
                        }
                        foreach ($puestos as $key => $value) {
                            echo '<option value="' . $value[0] . '" >' . $value[1] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input name="foto" size="30" type="file" class="form-control form-control-user">
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <select name="estado" class="form-control">
                        <?php if ($estado == 1) : ?>
                            <option value="1" selected>Activo</option>
                            <option value="0">Inactivo</option>
                        <?php else : ?>
                            <option value="0" selected>Inactivo</option>
                            <option value="1">Activo</option>
                        <?php endif ?>
                    </select>
                </div>
            </div>

            <input type="submit" class="btn btn-primary btn-user btn-block" value="Crear">

            <a href="index.php?clase=candidato&funcion=inicio" class="btn btn-google btn-user btn-block">
                Cancelar
            </a>
    </div>
</div>