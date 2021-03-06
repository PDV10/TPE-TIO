<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class TaskView
{
    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function showTasks($tasks)
    {
        $this->smarty->assign('titulo', 'Lista de tareas');
        $this->smarty->assign('tituloform', 'Ingresar una tarea');
        $this->smarty->assign('tasks', $tasks);
        $this->smarty->display('templates/taskList.tpl');
    }

    function showAbout()
    {
        $this->smarty->display('templates/about.tpl');
    }

    function showContacto()
    {
        $this->smarty->display('templates/contacto.tpl');
    }

    function showModificar($titulo, $descripcion, $prioridad, $id)
    {
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('descripcion', $descripcion);
        $this->smarty->assign('prioridad', $prioridad);
        $this->smarty->assign('id', $id);
        $this->smarty->display('templates/showFormModificar.tpl');
    }
}
