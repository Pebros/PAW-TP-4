<?php

namespace App\Models;

use App\Core\Model;

class Turnos extends Model
{
    protected $table = 'turnosej6';

    public function get()
    {
        return $this->db->selectAll($this->table);
    }

    public function insert(array $task)
    {
        $this->db->insert($this->table, $task);
    }

    public function delete($parametro, $valor)
    {
        $this->db->delete($this->table, $parametro,$valor);
    }
}
