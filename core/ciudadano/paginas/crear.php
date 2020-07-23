<div class="card o-hidden border-0 shadow-lg my-1">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Agregar nuevo ciudadano</h1>
        </div>
        <form class="user" action="index.php?clase=ciudadano&funcion=crear" method="POST">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" placeholder="Nombre" name="nombre" value="<?php
                                                                                                                        if (isset($_POST["nombre"])) {
                                                                                                                            echo $_POST["nombre"];
                                                                                                                        }
                                                                                                                        ?>">
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" placeholder="Apellido" name="apellido" value="<?php
                                                                                                                        if (isset($_POST["apellido"])) {
                                                                                                                            echo $_POST["apellido"];
                                                                                                                        }
                                                                                                                        ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" placeholder="Cedula" name="cedula" value="<?php
                                                                                                                        if (isset($_POST["cedula"])) {
                                                                                                                            echo $_POST["cedula"];
                                                                                                                        }
                                                                                                                        ?>">
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="email" class="form-control form-control-user" placeholder="Email" name="email" value="<?php
                                                                                                                        if (isset($_POST["email"])) {
                                                                                                                            echo $_POST["email"];
                                                                                                                        }
                                                                                                                        ?>">
                </div>
            </div>
            <input type="submit" class="btn btn-primary btn-user btn-block" value="Crear">

            <a href="index.php?clase=ciudadano&funcion=inicio" class="btn btn-google btn-user btn-block">
                Cancelar
            </a>
    </div>
</div>