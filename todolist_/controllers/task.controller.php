<?php

require_once 'models/task.model.php';
require_once 'views/task.view.php';
require_once 'helpers/auth.helper.php';

class TaskController
{
    private $model;
    private $view;
    private $authHelper;

    public function __construct()
    {
        $this->model = new TaskModel();
        $this->view = new TaskView();
        $this->authHelper = new AuthHelper();
        $this->authHelper->checkLoggedIn();  //Verificacion de sesion activa.
    }

    public function showTasks(){
        $tareas = $this->model->getAllTasks();
        $this->view->showTasks($tareas);
    }

    function addTask(){
        $titulo = $_REQUEST['titulo'];
        $prioridad = $_REQUEST['prioridad'];
        $descripcion = $_REQUEST['descripcion'];
        $this->model->insertTask($titulo, $descripcion, $prioridad);
        header("Location: " . BASE_URL);
    }

    function delTask($id){
        $this->model->deleteTask($id);
        header("Location: " . BASE_URL);
    }

    function completeTask($id){
        $this->model->updateTask($id);
        header("Location: " . BASE_URL);
    }

    function showModificar($id){
        $infoTaskId = $this->model->getTaskId($id);
        $titulo = $infoTaskId->titulo;
        $descripcion = $infoTaskId->descripcion;
        $prioridad = $infoTaskId->prioridad;
        $id = $infoTaskId->id;
        
        $this->view->showModificar($titulo,$descripcion,$prioridad,$id);
    }
    
    function modificar(){
        if(isset($_REQUEST['titulo']) && isset($_REQUEST['descripcion']) && isset($_REQUEST['prioridad'])){
            $titulo = $_REQUEST['titulo'];
            $descripcion = $_REQUEST['descripcion'];
            $prioridad = $_REQUEST['prioridad'];
            $id = $_REQUEST['id'];
            $this->model->modificar($titulo,$descripcion,$prioridad,$id);
            header("Location: " . BASE_URL);
        }
    }

    function showAbout(){
        $this->view->showAbout();
    }
}
