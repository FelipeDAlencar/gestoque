<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public $usuario;
    public $senha;

    public function usuario_existe($usuario, $senha) {
        // $this->usuario    = $_POST['usuario'];
        // $this->senha    = md5($_POST['senha']);
        $this->usuario    = $usuario;
        $this->senha    = md5($senha);

        
        $this->db->where("usuario", $this->usuario);
        $this->db->where("senha", $this->senha);
    
        $query = $this->db->get('usuario', 1);
        if ($query->num_rows() >= 1) {
            return TRUE;
        }

        return FALSE;
    }
    // public function get_last_ten_entries()
    // {
    //         $query = $this->db->get('entries', 10);
    //         return $query->result();
    // }

    // public function insert_entry()
    // {
    //         $this->title    = $_POST['title']; // please read the below note
    //         $this->content  = $_POST['content'];
    //         $this->date     = time();

    //         $this->db->insert('entries', $this);
    // }

    // public function update_entry()
    // {
    //         $this->title    = $_POST['title'];
    //         $this->content  = $_POST['content'];
    //         $this->date     = time();

    //         $this->db->update('entries', $this, array('id' => $_POST['id']));
    // }

}