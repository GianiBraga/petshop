<?php
  // class Pessoa extends CI_Controller{
  class Servico extends MY_Controller{

      public function __construct(){
          parent::__construct();



          $this->load->model('servico_model');

      }

      public function index(){
          $dados['titulo']= "Manutenção de Serviço";
          $dados['lista'] = $this->servico_model->get();


          $this->template->load('template', 'servico/viewServico', $dados);
      }

      public function remover($id){
          if(!$this->servico_model->remover($id)){
              die('Erro ao tentar remover');
          }
          $this->index();
      }

      public function cadastrar($id=null){
          $this->load->helper('form');
          $this->load->library('form_validation');

          //variaveis enviadas para a View
          $dados['titulo'] = "Cadastro de Serviço";

          //definição de regras para o formulário
          $rule_nome = 'required' . (($id==null)? '|is_unique[servico.descricao]' : '');
          // echo $rule_nome;
          $this->form_validation->set_rules('descricao', 'Descricao', $rule_nome);
          $this->form_validation->set_rules('tipoServico', 'TipoServico', 'required');
          $this->form_validation->set_rules('duracao', 'Duracao', 'required');
          $this->form_validation->set_rules('valor', 'Valor', 'required');


          //acao dinamica que sera enviada para a view
          $dados['acao'] = "servico/cadastrar/";

          $dados['registro'] = null; //Iniciar como null
          if($id!==null){
              $dados['acao']    .= $id; //concatenando o id
              $dados['registro'] = $this->servico_model->get($id);
          }

          //veririca se o form foi submetido e não houve erros de validação
          if($this->form_validation->run()===false){

              $this->template->load('template', 'servico/formServico', $dados);
          }else{
              if(!$this->servico_model->cadastrar($id)){
                  die("Erro ao tentar cadastrar os dados");
              }
              redirect('servico/index'); //redireciona o fluxo da aplicação
          }


      }
  }
 ?>
