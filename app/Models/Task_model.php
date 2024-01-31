<?php namespace App\Models;

use CodeIgniter\Model;

class Task_model extends Model
{

    public function getTasks()
    {
        $this->tasks = $this->db->table('tasks');
        $this->tasks->select('tasks.*, personen.name, personen.vorname, taskarten.taskart, spalten.spalte');

        $this->tasks->join('personen', 'tasks.personenid = personen.id');
        $this->tasks->join('taskarten', 'tasks.taskartenid = taskarten.id');
        $this->tasks->join('spalten', 'tasks.spaltenid = spalten.id');

        $this->tasks->orderBy('tasks', 'desc');

        $result = $this->tasks->get();
        return $result->getResultArray();
    }

    public function getSpalten()
    {
        $this->spalten = $this->db->table('spalten');

        $this->spalten->select('spalten.*, boards.id as idboard');

        $this->spalten->join('boards', 'spalten.boardsid = boards.id');


        $result = $this->spalten->get();
        return $result->getResultArray();
    }

    public function getPersonen()
    {
        $this->personen = $this->db->table('personen');
        $this->personen->select();

        $result = $this->personen->get();
        return $result->getResultArray();
    }

    public function getBoards()
    {
        $result = $this->db->table('boards')->get();
        return $result->getResultArray();
    }

    public function getData()
    {
        $this->tasks = $this->db->table('tasks');

        $this->tasks->select('tasks.*');
        $this->tasks->join('personen', 'personen.id = tasks.personenid');
        $this->tasks->join('spalten', 'spalten.id = tasks.spaltenid');


        $result = $this->tasks->get();
        return $result->getResultArray();


    }

    public function getTask($id = null)
    {
        $this->tasks = $this->db->table('tasks');
        $this->tasks->select('*');


        if ($id != NULL) {
            $this->tasks->where('id', $id);
        }

        $this->tasks->orderBy('tasks');
        $result = $this->tasks->get();

        if ($id != NULL) {
            return $result->getRowArray();
        } else return $result->getResultArray();
    }

    public function createSpalte()
    {
        $this->spalten = $this->db->table('spalten');
        $this->spalten->insert(array(
            'spalte' => $_POST['spalte'],
            'spaltenbeschreibung' => $_POST['spaltenbeschreibung'],
            'sortid' => $_POST['sortid'],
            'boardsid' => $_POST['boardsid']
        ));
    }

    public function getSpalteById($id)
    {
        $this->spalten = $this->db->table('spalten');
        $this->spalten->where('id', $id);
        $query = $this->spalten->get();
        return $query->getRowArray();
    }

    public function getBoardById($id)
    {
        $this->boards = $this->db->table('boards');
        $this->spalten->where('id', $id);
        $query = $this->boards->get();
        return $query->getRowArray();
    }

    public function updateSpalte()
    {
        $this->spalten = $this->db->table('spalten');
        $this->spalten->where('id', $_POST['id']);
        $this->spalten->update(array(
            'spalte' => $_POST['spalte'],
            'spaltenbeschreibung' => $_POST['spaltenbeschreibung'],
            'sortid' => $_POST['sortid'],
            'boardsid' => $this->getBoardId()
        ));
    }

    public function deleteSpalte()
    {
        $this->tasks = $this->db->table('spalten');
        $this->tasks->where('id', $_POST['id']);
        $this->tasks->delete();
    }



    public function createTasks()
    {
        $this->tasks = $this->db->table('tasks');
        $this->tasks->insert(array('personenid' => $_POST['Person'],
            'taskartenid' => 1,
            'spaltenid' => $_POST['Spalte'],
            'sortid' => 1,
            'tasks' => $_POST['Task'],
            'erstelldatum' => '2024-01-19',
            'erinnerungsdatum' => $_POST['Erinnerungsdatum'],
            'erinnerung' => $_POST['Erinnerung'],
            'notizen' => $_POST['Notiz'],
            'erledigt' => '0',
            'geloescht' => '0',));
    }

    public function updateTasks()
    {
        $this->tasks = $this->db->table('tasks');
        $this->tasks->where('id', $_POST['id']);
        $this->tasks->update(array('personenid' => $_POST['Person'],
            'taskartenid' => 1,
            'spaltenid' => $_POST['Spalte'],
            'sortid' => 1,
            'tasks' => $_POST['Task'],
            'erstelldatum' => '2024-01-19',
            'erinnerungsdatum' => $_POST['Erinnerungsdatum'],
            'erinnerung' => $_POST['Erinnerung'],
            'notizen' => $_POST['Notiz'],
            'erledigt' => '0',
            'geloescht' => '0',));
    }

    public function deleteTasks()
    {
        $this->tasks = $this->db->table('tasks');
        $this->tasks->where('id', $_POST['id']);
        $this->tasks->delete();
    }


}
