<?php

  class Relatorio extends MY_Controller{

      public function __construct(){
          parent::__construct();

          $this->load->model('relatorio_model');
      }

      public function formAgendamentoPeriodo(){
          $dados['titulo'] = "Relatório de Agendamentos";
          $this->load->helper('form');
          $this->load->library('form_validation'); 
          $this->template->load('template', 'relatorio/formAgendamentoPeriodo', $dados);
      }

      public function agendamentoPeriodo() {
          $ini   = $this->input->post('data_inicial');
          $fim   = $this->input->post('data_final');
          $dados['titulo'] = "Agendamento por período";
          $dados['data']   = $this->relatorio_model->getAgendamentoPeriodo($ini, $fim);
          // echo '<pre>';
          // print_r($dados);
          // echo '</pre>';
          $this->load->library('MY_FPDF');
          $this->load->view('relatorio/agendamentoPeriodoPDF', $dados);
      }

  }
 ?>
