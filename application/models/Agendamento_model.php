<?php
  class Agendamento_model extends CI_Model{
      public function __construct(){
          // $this->load->database();
            $this->tabelaNome = 'agenda';
      }

      public function get($id=null){
          if($id==null){
            $this->db->select('a.id,a.dataentrada,a.idhorario,a.idservico,a.idpessoa,a.idpet,s.descricao,s.tipoServico,s.valor,
           e.nome as pessoa,r.nome as raca,r.nome,h.horario');
            $this->db->from('agenda a');
            $this->db->join('servico s','s.id=a.idservico');
            $this->db->join('animal p','p.id=a.idpet');
            $this->db->join('raca r','r.id=p.idraca');
            $this->db->join('pessoa e','e.id=a.idpessoa');
            $this->db->join('horario h','h.id=a.idhorario');
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
          if($id==null){ //registro novo
              return $this->db->insert($this->tabelaNome, $registro);
          }
          return $this->db->where(array('id'=>$id))->update($this->tabelaNome,$registro);
      }
  }
 ?>
