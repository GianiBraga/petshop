<?php
  // class Pessoa extends CI_Controller{
  class Pessoa extends MY_Controller{

      public function __construct(){
          parent::__construct();



          $this->load->model('pessoa_model');

      }

      public function index(){
          $dados['titulo']= "Manutenção de Pessoa";
          $dados['lista'] = $this->pessoa_model->get();


          $this->template->load('template', 'pessoa/viewPessoa', $dados);
      }

      public function remover($id){
          if(!$this->pessoa_model->remover($id)){
              die('Erro ao tentar remover');
          }
          $this->index();
      }

      public function cadastrar($id=null){
          $this->load->helper('form');
          $this->load->library('form_validation');

          //variaveis enviadas para a View
          $dados['titulo'] = "Cadastro de Pessoas";

          //definição de regras para o formulário
          $rule_nome = 'required' . (($id==null)? '|is_unique[pessoa.nome]' : '');
          // echo $rule_nome;
          $this->form_validation->set_rules('nome', 'Nome', $rule_nome);
          $this->form_validation->set_rules('idade', 'Idade', 'required');
          $this->form_validation->set_rules('endereco', 'Endereco', 'required');
          $this->form_validation->set_rules('email', 'Email', 'required');
          $this->form_validation->set_rules('cpf', 'Cpf', 'required');
          $this->form_validation->set_rules('rg', 'RG', 'required');
          $this->form_validation->set_rules('telefone', 'Telefone', 'required');


          //acao dinamica que sera enviada para a view
          $dados['acao'] = "pessoa/cadastrar/";

          $dados['registro'] = null; //Iniciar como null
          if($id!==null){
              $dados['acao']    .= $id; //concatenando o id
              $dados['registro'] = $this->pessoa_model->get($id);
          }

          //veririca se o form foi submetido e não houve erros de validação
          if($this->form_validation->run()===false){

              $this->template->load('template', 'pessoa/formPessoa', $dados);
          }else{
              if(!$this->pessoa_model->cadastrar($id)){
                  die("Erro ao tentar cadastrar os dados");
              }
              redirect('pessoa/index'); //redireciona o fluxo da aplicação
          }


      }
  }
 ?>
