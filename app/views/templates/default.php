<?php defined('BASEPATH') or exit ('No se permite acceso directo');?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Gesfleet</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <base href="<?php echo BASE_DOMAIN_DIR_URL?>">
        <link rel="stylesheet" type="text/css" href="webroot/css/main.css">
        <script type="text/javascript" src="webroot/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="webroot/js/home.js"></script>

        
    </head>
    <body style="margin: 0;">
        <div id="page-wrapper">
        <header> 
            <?php
                if (isset($_SESSION['user'])) 
                {?>
                    <nav id="nav">
                            <div><img src="webroot/img/Tunstall.png" alt="Tunstall" id="logo-nav"></div>
                            
                            <ul>
                                <li id="logo-li">
                                    <img src="webroot/img/Tunstall.png" alt="Tunstall">
                                </li>
                                <li class="current">
                                    <a href="<?php echo BASE_DIR_URL?>inventario/index">Flota</a>
                                    <!-- <ul>
                                        <li><a href="#">Inventario</a></li>
                                        <li><a href="#">Catálogo</a></li>
                                        <li><a href="#">Informes</a></li>
                                    </ul> -->
                                </li>
                                <li>
                                    <a href="#">Mantenimientos</a>
                                    <ul>
                                        <li><a href="#">Recordatorios</a></li>
                                        <li><a href="#">Histórico</a></li>
                                        <li><a href="#">Catálogo</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Datos</a>
                                    <ul>
                                        <li><a href="#">Combustible</a></li>
                                        <li><a href="#">Gastos</a></li>
                                        <li><a href="#">Kilometraje</a></li>
                                        <li><a href="#">Incidentes</a></li>
                                        <li><a href="#">Revisiones internas</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Proveedores</a>
                                    <ul>
                                        <li><a href="#">Talleres</a></li>
                                        <li><a href="#">Material</a></li>
                                        <li><a href="#">Renting</a></li>
                                        <li><a href="#">Ubicaciones</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Usuarios</a>
                                    <ul>
                                        <li><a href="#">Registro</a></li>
                                        <li><a href="#">Tipos</a></li>
                                    </ul>
                                </li>
                                <div class="user-nav">
                                <p>Fulanito</p>
                                </div>
                            </ul>
                        </nav>                
            <?php } ?>

            
        </header>
        <main> 

            <?php echo $content_for_layout;?> 

        </main>
        <footer id="footer">

            <?php echo date("Y");?> © Maribel Marín Martín
            
        </footer>

    </div>

        <script src="webroot/js/jquery.min.js"></script>
        <script src="webroot/js/jquery.dropotron.min.js"></script>
        <script src="webroot/js/browser.min.js"></script>
        <script src="webroot/js/breakpoints.min.js"></script>
        <script src="webroot/js/util.js"></script>
        <script src="webroot/js/main.js"></script>
    </body>
</html>