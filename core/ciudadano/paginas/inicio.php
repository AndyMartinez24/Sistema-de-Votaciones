<h1 class="h3 mb-2 text-gray-800">Ciudadanos</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="index.php?clase=ciudadano&funcion=crear" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-flag"></i>
            </span>
            <span class="text">Agregar un nuevo ciudadano</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($puestos as $key => $value) : ?>
                        <tr>
                            <td><?= $value[1] ?></td>
                            <td><?= $value[2] . " " . $value[3] ?></td>
                            <td><?= $value[4] ?></td>
                            <td>
                                <?php
                                    if ($value[5] == 1) {
                                        echo "Activo";
                                    } else {
                                        echo "Inactivo";
                                    }
                                    ?>
                            </td>
                            <td>
                                <a href="index.php?clase=ciudadano&funcion=ver&id=<?= $value[0] ?>" class="btn btn-info btn-circle btn-sm">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                                <a href="index.php?clase=ciudadano&funcion=editar&id=<?= $value[0] ?>" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </a>
                                <a href="index.php?clase=ciudadano&funcion=eliminar&id=<?= $value[0] ?>" class="btn btn-danger btn-circle btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>