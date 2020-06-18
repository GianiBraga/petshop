<?php

  class Agendamento extends MY_Controller{

      public function __construct(){
          parent::__construct();


          $this->load->model('agendamento_model');

      }

      public function index(){
          $dados['titulo']= "Agendamento";
          $dados['lista'] = $this->agendamento_model->get();

          $this->template->load('template', 'agendamento/viewAgendamento', $dados);
      }

      public function remover($id){
          if(!$this->agendamento_model->remover($id)){
              $this->session->set_userdata('mensagem', 'erro');
          }else{
              $this->session->set_userdata('mensagem', 'sucesso');
          }
          redirect('agendamento');
      }

      public function cadastrar($id=null){
          $this->load->helper('form');
          $this->load->library('form_validation');


          $dados['titulo'] = "Agendamento";


          $this->form_validation->set_rules('tipoServico', 'Servico');
          $this->form_validation->set_rules('idpet', 'Pet', 'required');
          $this->form_validation->set_rules('dataentrada', 'Data', 'required');
          $this->form_validation->set_rules('horaentrada', 'Time',);


          $dados['acao'] = "agendamento/cadastrar/";

          $dados['registro'] = null;
          if($id!==null){
              $dados['acao']    .= $id;
              $dados['registro'] = $this->agendamento_model->get($id);
          }
          $this->load->model('servico_model');
          $dados['listaTipoServico'] = $this->servico_model->get();

          $this->load->model('pessoa_model');
          $dados['listaPessoa'] = $this->pessoa_model->get();

          $this->load->model('animal_model');
          $dados['listaPet'] = $this->animal_model->get();
          if($this->form_validation->run()===false){
              $this->template->load('template', 'agendamento/formAgendamento', $dados);

          } else{
            if(!$this->agendamento_model->cadastrar($id)){
                $this->session->set_userdata('mensagem', 'erro');
              }else{
                $this->session->set_userdata('mensagem', 'sucesso');
             }
          redirect('agendamento');
            }

          }
  }
 ?>
