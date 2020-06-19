<?php
  // class Pessoa extends CI_Controller{
  class Checklist extends MY_Controller{

      public function __construct(){
          parent::__construct();



          $this->load->model('checklist_model');

      }

      public function index(){
          $dados['titulo']= "Checklist";
          $dados['lista'] = $this->checklist_model->get();


          $this->template->load('template', 'checklist/viewChecklist', $dados);
      }

      public function remover($id){
          if(!$this->checklist_model->remover($id)){
              die('Erro ao tentar remover');
          }
          $this->index();
      }

      public function cadastrar($id=null){
          $this->load->helper('form');
          $this->load->library('form_validation');

          //variaveis enviadas para a View
          $dados['titulo'] = "Cadastro de Checklist";


          $this->form_validation->set_rules('idservico', 'Serviço', 'required');
          $this->form_validation->set_rules('idpet', 'Pet','required');
          $this->form_validation->set_rules('descricao', 'Descrição','required');
          $this->form_validation->set_rules('horainicio', 'Hora Inicial','required');
          $this->form_validation->set_rules('horafinal', 'Hora Final','required');
          $this->form_validation->set_rules('dataservico', 'Data Serviço','required');


          //acao dinamica que sera enviada para a view
          $dados['acao'] = "checklist/cadastrar/";

          $dados['registro'] = null; //Iniciar como null
          if($id!==null){
              $dados['acao']    .= $id; //concatenando o id
              $dados['registro'] = $this->checklist_model->get($id);
          }

          $this->load->model('servico_model');
          $dados['listaTipoServico'] = $this->servico_model->get();

          $this->load->model('animal_model');
          $dados['listaPet'] = $this->animal_model->get();

          //veririca se o form foi submetido e não houve erros de validação
          if($this->form_validation->run()===false){

              $this->template->load('template', 'checklist/formChecklist', $dados);
          }else{
              if(!$this->checklist_model->cadastrar($id)){
                  die("Erro ao tentar cadastrar os dados");
              }
              redirect('checklist/index'); //redireciona o fluxo da aplicação
          }


      }
  }
 ?>
