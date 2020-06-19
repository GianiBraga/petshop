<?php
  // class Pessoa extends CI_Controller{
  class Horario extends MY_Controller{

      public function __construct(){
          parent::__construct();



          $this->load->model('horario_model');

      }

      public function index(){
          $dados['titulo']= "Manutenção de Horarios";
          $dados['lista'] = $this->horario_model->get();


          $this->template->load('template', 'horario/viewHorario', $dados);
      }

      public function remover($id){
          if(!$this->horario_model->remover($id)){
              die('Erro ao tentar remover');
          }
          $this->index();
      }

      public function cadastrar($id=null){
          $this->load->helper('form');
          $this->load->library('form_validation');

          //variaveis enviadas para a View
          $dados['titulo'] = "Cadastro de Horarios";

          //definição de regras para o formulário
          // echo $rule_nome;
          $this->form_validation->set_rules('horario', 'Horario', 'required');


          //acao dinamica que sera enviada para a view
          $dados['acao'] = "horario/cadastrar/";

          $dados['registro'] = null; //Iniciar como null
          if($id!==null){
              $dados['acao']    .= $id; //concatenando o id
              $dados['registro'] = $this->horario_model->get($id);
          }

          //veririca se o form foi submetido e não houve erros de validação
          if($this->form_validation->run()===false){

              $this->template->load('template', 'horario/formHorario', $dados);
          }else{
              if(!$this->horario_model->cadastrar($id)){
                  die("Erro ao tentar cadastrar os dados");
              }
              redirect('horario/index'); //redireciona o fluxo da aplicação
          }


      }
  }
 ?>
