<?php
require_once 'models/user.model.php';
require_once 'views/auth.view.php';
require_once 'helpers/auth.helper.php';

class AuthController
{
    private $model;
    private $view;
    private $authHelper;

    public function __construct()
    {
        $this->model = new UserModel();
        $this->view = new AuthView();
        $this->authHelper = new AuthHelper();
    }

    public function showLogin()
    {
        $this->view->showFormLogin();  //Formulario de logueo.
    }

    public function login()
    {  //Verifica el usuario.
        if (!empty($_POST['email']) && !empty($_POST['password'])) {   //Verifica si los campos estan vacios.
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->model->getUser($email);   // Obtengo el usuario de la base de datos     
            if ($user && password_verify($password, $user->password)) { //Verifica si el usuario existe y la constaseña coincide.
                $this->authHelper->login($user);  //Se arma el usuario.
                header("Location: " . BASE_URL);
            } else {
                $this->view->showFormLogin("Usuario o contraseña inválida");
            }
        }
    }

    public function logout()
    {
        $this->authHelper->logout();
    }
}
