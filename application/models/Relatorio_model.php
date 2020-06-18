<?php
  class Relatorio_model extends CI_Model{

      public function __construct(){ }

      public function getEmprestimoPeriodo($ini){
        $this->db->select('a.id,a.dataentrada,a.idservico,p.idraca,s.descricao,s.valor,s.tipoServico,s.duracao,p.nome as animal');
        $this->db->from('agenda a');
        $this->db->join('servico s','s.id=a.idservico');
        $this->db->join('animal p','p.id=a.idpet');

          $where = array('a.dataentrada');
          $this->db->where($where);
          $query = $this->db->get();
          return $query->result_array(); //todos os registros

      }
  }
 ?>
