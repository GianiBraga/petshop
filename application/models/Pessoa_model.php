<?php
  class Pessoa_model extends CI_Model{
      private $tabelaNome;
      public function __construct(){
          $this->tabelaNome = 'pessoa';
      }

      public function get($id=null){
          if($id==null){
              $query = $this->db->get($this->tabelaNome);
              return $query->result_array(); //todos os registros
          }
          $query = $this->db->get_where($this->tabelaNome, array('id'=>$id));
          return $query->row_array(); 
      }

      public function remover($id){
          return $this->db->where(array('id'=>$id))->delete($this->tabelaNome);

}

      public function cadastrar($id=null){
          $registro = $this->input->post();
          $idade = $this->get($id);

          
          if($id==null){ //registro novo
              return $this->db->insert($this->tabelaNome, $registro);
          }
          return $this->db->where(array('id'=>$id))->update($this->tabelaNome,$registro);
      }
    
  }
 ?>
