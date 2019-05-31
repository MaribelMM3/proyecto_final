<?php defined('BASEPATH') or exit ('No se permite acceso directo'); 

class Router {

    static public function parse($url, $request) {

        $url = trim($url);

        if ($url == BASE_DIR_URL) {

            //creamos este if para condicionar que, cuando hay un login,
            //en lugar de ir o tomar como página principal 'home',
            //tome como página principal 'inventario' que es la que hemos 
            //definido en INDEX_CONTROLLER_LOG
            if(isset($_SESSION['username'])){

                $request->controller = INDEX_CONTROLLER_LOG;
                $request->action = INDEX_ACTION_LOG;
                $request->params = [];

            } else {

                $request->controller = INDEX_CONTROLLER;
                $request->action = INDEX_ACTION;
                $request->params = [];

            }
           
           //Estos parámetros los incluiremos dentro del nuevo if, son los que llevan a la 'home'
            //los dejaremos como condición si no hay login.
            // $request->controller = INDEX_CONTROLLER;
            // $request->action = INDEX_ACTION;
            // $request->params = [];

        } else {

            $explode_url = explode('/', $url);
            $explode_url = array_slice($explode_url, 2);
            $request->controller = $explode_url[0];
            $request->action = $explode_url[1];
            $request->params = array_slice($explode_url, 2);
            
        }

    }
    
}
