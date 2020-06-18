<?php
  // class Pessoa extends CI_Controller{
  class Animal extends MY_Controller{

      public function __construct(){
          parent::__construct();



          $this->load->model('animal_model');

      }

      public function index(){
          $dados['titulo']= "Manutenção de Animal";
          $dados['lista'] = $this->animal_model->get();


          $this->template->load('template', 'animal/viewAnimal', $dados);
      }

      public function remover($id){
          if(!$this->animal_model->remover($id)){
              die('Erro ao tentar remover');
          }
          $this->index();
      }

      public function cadastrar($id=null){
          $this->load->helper('form');
          $this->load->library('form_validation');

          //variaveis enviadas para a View
          $dados['titulo'] = "Cadastro de Animal";

          //definição de regras para o formulário
          $rule_nome = 'required' . (($id==null)? '|is_unique[animal.nome]' : '');
          // echo $rule_nome;
          $this->form_validation->set_rules('nome', 'Nome', $rule_nome);
          $this->form_validation->set_rules('sexo', 'Sexo', 'required');
          $this->form_validation->set_rules('porte', 'Porte', 'required');


          //acao dinamica que sera enviada para a view
          $dados['acao'] = "animal/cadastrar/";

          $dados['registro'] = null; //Iniciar como null
          if($id!==null){
              $dados['acao']    .= $id; //concatenando o id
              $dados['registro'] = $this->animal_model->get($id);
          }


          $this->load->model('raca_model');
          $dados['listaRaca'] = $this->raca_model->get();

          
          //veririca se o form foi submetido e não houve erros de validação
          if($this->form_validation->run()===false){

              $this->template->load('template', 'animal/formAnimal', $dados);
          }else{
              if(!$this->animal_model->cadastrar($id)){
                  die("Erro ao tentar cadastrar os dados");
              }
              redirect('animal'); //redireciona o fluxo da aplicação
          }


      }
  }
 ?>
