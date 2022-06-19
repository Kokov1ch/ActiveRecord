<?php
namespace App\Core;
use App\Model;
use App\Controller;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
class application{
    private Controller\mainController $controller;
    private Model\person $person;
    public function __construct(){
        $loader = new FilesystemLoader(dirname(__DIR__,1) . '/View/');
        $twig = new Environment($loader);
        $this->controller = new Controller\mainController($twig);
        $this->person = new Model\person();
    }
    public function run(){
        $this->controller->execute();

        if (isset($_GET['getId'])){
            $this->controller->getAll($this->person->getById($_GET['id']));
        }

        if (isset($_GET['phoneNum'])){
            $this->controller->getAll($this->person->getByPhoneNumber($_GET['phone']));
        }
        if (isset($_GET['delete'])){
            $this->person->deleteById($_GET['delId']);
        }

        if (isset($_GET['add'])){
            $this->person->add($_GET['name'],$_GET['phoneNumb'],$_GET['address']);
        }

        if (isset($_GET['getAll']))
            $this->controller->getAll($this->person->getAll());
        if (isset($_GET['getById'])) {
            $this->controller->getById();
        }
        if (isset($_GET['getByPhoneNumber']))
            $this->controller->getByPhoneNumber();
        if (isset($_GET['deleteById']))
            $this->controller->delete();
        if (isset($_GET['add']))
            $this->controller->add();
    }

}

