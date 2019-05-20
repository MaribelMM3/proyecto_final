<?php defined('BASEPATH') or exit ('No se permite acceso directo');

class homeController extends Controller {

    public function index() {

        $this->render('index');

    }

    public function login()
    {
    	if (isset($_POST['username']) && isset($_POST['password']))
        {
            //capturar datos fomrulario $_post
            $username = Security::secure_input($_POST['username']);
            $password = Security::secure_input($_POST['password']);

            //llamar al modelo y comprobar si es correcto
            require_once(ROOT . DS . 'app' . DS . 'models' . DS . 'homeModel.php');
            $a = new user();
            $b = $a->login_mod($username, $password);

            echo json_encode($b);

            //redirigir a la vista home en 
        }

    	//es correcto?
    	//$_SESSION
    	//$this->render('index');
    }

}
