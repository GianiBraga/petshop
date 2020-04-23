<?php
  // class Pessoa extends CI_Controller{
  class Raca extends MY_Controller{

      public function __construct(){
          parent::__construct();



          $this->load->model('raca_model');

      }

      public function index(){
          $dados['titulo']= "Manutenção de Raça";
          $dados['lista'] = $this->raca_model->get();


          $this->template->load('template', 'raca/viewRaca', $dados);
      }

      public function remover($id){
          if(!$this->raca_model->remover($id)){
              die('Erro ao tentar remover');
          }
          $this->index();
      }

      public function cadastrar($id=null){
          $this->load->helper('form');
          $this->load->library('form_validation');

          //variaveis enviadas para a View
          $dados['titulo'] = "Cadastro de Raça";

          //definição de regras para o formulário
          $rule_nome = 'required' . (($id==null)? '|is_unique[raca.nome]' : '');
          // echo $rule_nome;
          $this->form_validation->set_rules('nome', 'Nome', $rule_nome);
          $this->form_validation->set_rules('descricao', 'Descrição', 'required');


          //acao dinamica que sera enviada para a view
          $dados['acao'] = "raca/cadastrar/";

          $dados['registro'] = null; //Iniciar como null
          if($id!==null){
              $dados['acao']    .= $id; //concatenando o id
              $dados['registro'] = $this->raca_model->get($id);
          }

          //veririca se o form foi submetido e não houve erros de validação
          if($this->form_validation->run()===false){

              $this->template->load('template', 'raca/formRaca', $dados);
          }else{
              if(!$this->raca_model->cadastrar($id)){
                  die("Erro ao tentar cadastrar os dados");
              }
              redirect('raca/index'); //redireciona o fluxo da aplicação
          }


      }
  }
 ?>
