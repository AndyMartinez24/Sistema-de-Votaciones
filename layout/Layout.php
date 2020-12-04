<?php
    class Layout{
        public $gettingAssetsFolder;

        function __construct($getPage){
            $this->gettingAssetsFolder = ($getPage) ? "../../../" :"" ;
            $this->gettingImages = ($getPage) ? "../" :"" ;
        }

        public function printHeader(){
            $Header = <<<EOF
            <html lang="en">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta name="description" content="">
                <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
                <meta name="generator" content="Jekyll v3.8.5">
                <title>SADVO</title>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap-grid.css">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap-grid.css.map">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap-grid.min.css">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap-grid.min.css.map">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap-reboot.css">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap-reboot.css.map">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap-reboot.min.css">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap-reboot.min.css.map">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap.css">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap.css.map">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap.min.css">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap.min.css.map">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\ourStyle.css">
            </head>
            <body>
            
            <!-- Header -->
            <header>
                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                    <a class="navbar-brand" href="../../../index.php">Sistema Automatizado de Votaciones</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="../../../index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                    <a href="../../../core/usuario/paginas/loginAdmin.php">
                        <span class="btn btn-outline-success my-2 my-sm-0">Login</span>
                    </a>
                    </div>
                </nav>
            </header>
EOF;

            echo $Header;
        }

        public function printFooter(){
            $Footer = <<<EOF
            <!-- FOOTER -->
            <footer class="py-1 fluid-container bg bg-white" style="padding-top:500px;">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-3 d-flex justify-content-center align-items-center">
                    <img class="mb-2 img-fluid " src="../../../tools/images/Logo.jpg" alt="No images found" width="200" height="200">
                </div>
                <div class="col-md-6 my-auto">
                    <p class="my-3 text-primafy h5">©2019</p>
                    <p class="my-3 text-primafy h5">Proyecto Final - Sistema Automatizado De Votaciones</p>
                    <p class="my-3 text-primafy h5">Develop by Erardo Perdomo</p>
                </div>
                <div class="col-md-2"></div>
            </div>
            </footer>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap.bundle.js"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap.bundle.js.map"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap.bundle.min.js"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap.bundle.min.js.map"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap.js"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap.js.map"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap.min.js"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap.min.js.map"></script>
            <script src="{$this->gettingAssetsFolder}assets\jquery-3.4.1.min.js"></script>
            <script src="{$this->gettingAssetsFolder}assets\popper.min.js"></script>
            </body>
            </html>
EOF;
            echo $Footer;
        }

        public function printScript(){
            $Script = <<<EOF
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap.bundle.js"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap.bundle.js.map"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap.bundle.min.js"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap.bundle.min.js.map"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap.js"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap.js.map"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap.min.js"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap.min.js.map"></script>
            <script src="{$this->gettingAssetsFolder}assets\jquery-3.4.1.min.js"></script>
            <script src="{$this->gettingAssetsFolder}assets\popper.min.js"></script>
            </body>
            </html>
EOF;
            echo $Script;
        }

        
        public function printLink(){
            $Link = <<<EOF
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap-grid.css">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap-grid.css.map">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap-grid.min.css">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap-grid.min.css.map">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap-reboot.css">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap-reboot.css.map">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap-reboot.min.css">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap-reboot.min.css.map">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap.css">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap.css.map">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap.min.css">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap.min.css.map">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\ourStyle.css">
EOF;

            echo $Link;
        }


        
    }
?>
