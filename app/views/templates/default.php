<?php defined('BASEPATH') or exit ('No se permite acceso directo');?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Plantilla MVC</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <base href="<?php echo BASE_DOMAIN_DIR_URL?>">
        <link rel="stylesheet" type="text/css" href="webroot/css/home.css">
        <script type="text/javascript" src="webroot/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="webroot/js/home.js"></script>
    </head>
    <body>
        <header> 
            <nav> 
                <ul>
                    <li><a href="<?php echo BASE_DIR_URL?>home/index">Home</a></li>
                    <li><a href="<?php echo BASE_DIR_URL?>contacto/index">Contacto</a></li>
                </ul>
            </nav>
        </header>
        <main> 

            <?php echo $content_for_layout;?> 

        </main>
        <footer>

            <p><?php echo date("Y");?> © MVC</p>
            
        </footer>
    </body>
</html>