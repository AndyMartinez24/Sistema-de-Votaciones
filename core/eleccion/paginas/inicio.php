<h1 class="h3 mb-2 text-gray-800">Elecciones</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <?php if ($verificar == false) : ?>
            <a href="index.php?clase=eleccion&funcion=crear" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-flag"></i>
                </span>
                <span class="text">Crear un nuevo puesto</span>
            </a>
        <?php endif ?>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha de realizacion</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($puestos as $key => $value) : ?>
                        <tr>
                            <td><?= $value[1] ?></td>
                            <td><?= $value[2] ?></td>
                            <td>
                                <?php
                                    if ($value[3] == 1) {
                                        echo "Activo";
                                    } else {
                                        echo "Inactivo";
                                    }
                                    ?>
                            </td>
                            <td>
                                <?php if ($verificar == true) : ?>
                                    <a href="index.php?clase=eleccion&funcion=eliminar&id=<?= $value[0] ?>" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-flag"></i>
                                        </span>
                                        <span class="text">Finalizar eleccion</span>
                                    </a>
                                    |
                                    <a href="index.php?clase=eleccion&funcion=ver&id=<?= $value[0] ?>" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-flag"></i>
                                        </span>
                                        <span class="text">Ver resulados</span>
                                    </a>
                                <?php else : ?>
                                    <a href="index.php?clase=eleccion&funcion=ver&id=<?= $value[0] ?>" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-flag"></i>
                                        </span>
                                        <span class="text">Ver resulados</span>
                                    </a>
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>