<?php

namespace App\Controllers;

use App\Models\Task_model;
use App\Models\TasksModel;


class Hauptcontroller extends BaseController
{


    public function __construct()
    {
        $this->tasksmodel = new Task_Model();
        $this->validation = \Config\Services::validation();
        helper(['form', 'url']);


    }


    public function getBoard()
    {
        $tasksmodel = new Task_Model();
        $data['boards'] = $tasksmodel->getBoards();

        echo view('templates/header');
        echo view('templates/board', $data);
        echo view('templates/footer');


    }


    public function getSpalte($id = 0)
    {
        $tasksmodel = new Task_Model();
        $data['spalten'] = $tasksmodel->getSpalten();
        $data['boards'] = $tasksmodel->getBoards();
        //var_drump($this-> Task_model->getSpalten(16));

        echo view('templates/header');
        echo view('templates/spalte', $data);
        echo view('templates/footer');


    }

    public function postDeletespalte($id)
    {
        if ($id != 0) {
            $this->tasksmodel->deleteSpalte($id);
        }
        return redirect()->to(base_url('/hauptcontroller/spalte'));

    }

    public function getSpaltenersteller($id = 0)
    {
        $tasksmodel = new Task_Model();
        $data['spalten'] = $tasksmodel->getSpalten();
        $data['boards'] = $tasksmodel->getBoards();

        if ($id > 0) {
            $data['update'] = $tasksmodel->getSpalteById($id);

        }

        echo view('templates/header');
        echo view('templates/spaltenersteller', $data);
        echo view('templates/footer');

    }


    public function postSubmitSpalten()
    {


        if ($this->validation->run($_POST, 'spaltenbearbeiten')) {
            // Anlegen oder ändern

            if (isset($_POST['submitSpalte'])) {

                if (isset($_POST['id']) && $_POST['id'] != '') {
                    $this->tasksmodel->updateSpalte();
                } else {
                    $this->tasksmodel->createSpalte();
                }
                return redirect()->to(base_url('hauptcontroller/spalte'));

            }

            return redirect()->to(base_url('/hauptcontroller/spalte'));
        } else {
            $tasksmodel = new Task_Model();
            $data['spalten'] = $_POST;
            $data['boards'] = $tasksmodel->getBoards();

            // Fehlermeldungen generieren
            $data['error'] = $this->validation->getErrors();


            echo view('Views/templates/header', $data);
            echo view('Views/templates/spaltenersteller', $data);
            echo view('Views/templates/footer', $data);
        }


    }


    public function getTasks()
    {

        $tasksmodel = new Task_Model();
        $data['tasks'] = $tasksmodel->getTasks();
        $data['spalten'] = $tasksmodel->getSpalten();
        $data['personen'] = $tasksmodel->getPersonen();
        //var_drump($this-> Task_model->getSpalten(16));

        echo view('templates/header');
        echo view('templates/tasks', $data);
        echo view('templates/footer');


    }

    public function getTaskersteller($id = 0, $todo = 0)
    {
        $tasksmodel = new Task_Model();
        $data['tasks'] = $tasksmodel->getData();
        $data['personen'] = $tasksmodel->getPersonen();
        $data['spalten'] = $tasksmodel->getSpalten();
        $data['tasks'] = $tasksmodel->getTasks();

        if ($id > 0) {
            $data['update'] = $this->tasksmodel->getTask($id);
        }

        echo view('templates/header');
        echo view('templates/taskersteller', $data);
        echo view('templates/footer');
    }


    public function postSubmitTasks()
    {

        if ($this->validation->run($_POST, 'taskbearbeiten')) {
            // Anlegen oder ändern

            if (isset($_POST['submitTasks'])) {

                if (isset($_POST['id']) && $_POST['id'] != '') {
                    $this->tasksmodel->updateTasks();
                } else {
                    $this->tasksmodel->createTasks();
                }
                return redirect()->to(base_url('hauptcontroller/tasks'));

            }

            return redirect()->to(base_url('/hauptcontroller/tasks'));
        } else {
            $tasksmodel = new Task_Model();
            $data['tasks'] = $tasksmodel->getTasks();
            $data['spalten'] = $tasksmodel->getSpalten();
            $data['personen'] = $tasksmodel->getPersonen();
            $data['tasks'] = $_POST;

            // Fehlermeldungen generieren
            $data['error'] = $this->validation->getErrors();


            echo view('Views/templates/header', $data);
            echo view('Views/templates/taskersteller', $data);
            echo view('Views/templates/footer', $data);

        }
    }

    public function postDeleteTasks($id = 1)
    {
        if ($id != 0) {
            $this->tasksmodel->deleteTasks($id);
        }
        return redirect()->to(base_url('/hauptcontroller/tasks'));

    }


    public function getBoardersteller($id = 0, $todo = 0)
    {

        $tasksmodel = new Task_Model();
        $data['boards'] = $tasksmodel->getBoards();


        echo view('templates/header');
        echo view('templates/boardersteller', $data);
        echo view('templates/footer');
    }




    public function postSubmitBoard()
    {

        if ($this->validation->run($_POST, 'boardbearbeiten')) {
            // Anlegen oder ändern

            if (isset($_POST['submitBoard'])) {

                if (isset($_POST['id']) && $_POST['id'] != '') {
                    $this->tasksmodel->updateBoards();
                } else {
                    $this->tasksmodel->createBoards();
                }
                return redirect()->to(base_url('hauptcontroller/board'));

            }

            return redirect()->to(base_url('/hauptcontroller/board'));
        } else {
            $tasksmodel = new Task_Model();
            $data['boards'] = $tasksmodel->getBoards();

            $data['baord'] = $_POST;

            // Fehlermeldungen generieren
            $data['error'] = $this->validation->getErrors();


            echo view('Views/templates/header', $data);
            echo view('Views/templates/boardersteller', $data);
            echo view('Views/templates/footer', $data);

        }
    }


    public function postDeleteBoard($id)
    {
        if ($id != 0) {
            $this->tasksmodel->deleteBoard($id);
        }
        return redirect()->to(base_url('/hauptcontroller/board'));

    }



}


