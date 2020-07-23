<div class="card o-hidden border-0 shadow-lg my-1">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Agregar nuevo partido</h1>
        </div>
        <form class="user" action="index.php?clase=partido&funcion=crear" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" placeholder="Nombre" name="nombre" value="<?php
                                                                                                                        if (isset($_POST["nombre"])) {
                                                                                                                            echo $_POST["nombre"];
                                                                                                                        }
                                                                                                                        ?>">
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input name="foto" size="30" type="file" class="form-control form-control-user">
                </div>
            </div>
            <div class="form-group">
                <textarea name="descripcion" class="form-control form-control-user" placeholder="Descripcion"><?php
                                                                                                                if (isset($_POST["descripcion"])) {
                                                                                                                    echo $_POST["descripcion"];
                                                                                                                }
                                                                                                                ?></textarea>
            </div>

            <input type="submit" class="btn btn-primary btn-user btn-block" value="Crear">

            <a href="index.php?clase=partido&funcion=inicio" class="btn btn-google btn-user btn-block">
                Cancelar
            </a>
    </div>
</div>