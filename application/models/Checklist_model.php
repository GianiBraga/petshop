<?php
  class Checklist_model extends CI_Model{
      private $tabelaNome;
      public function __construct(){
          $this->tabelaNome = 'checklist';
          // $this->load->database();
      }

      public function get($id=null){
          if($id==null){
            $this->db->select('c.id, c.idservico, c.descricao, c.horainicio, c.horafinal, c.dataservico,s.tipoServico');
            $this->db->from('checklist c');
            $this->db->join('animal a','a.id=c.idpet');
            $this->db->join('servico s','s.id=c.idservico');
              $query = $this->db->get();
              return $query->result_array(); //todos os registros
          }
          $query = $this->db->get_where($this->tabelaNome, array('id'=>$id));
          return $query->row_array(); //uma unica linha MATCH
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
