<div class="row">
    <div class="col-md-12">
        <div class="box">
          <!-- <div class="box-header with-border">
              <h2 class="box-title"><?php //echo $titulo; ?></h2>
          </div> -->
          <div class="box-body">
            <a class="btn btn-primary" href="<?= site_url('agendamento/cadastrar'); ?>">
              <i class="fa fa-fw fa-plus"></i>Adicionar
            </a>
            <table class="table table-hover table-striped">
              <thead>
                <th class="col-md-1">#</th>
                <th class="col-md-1">Data Entrada</th>
                <th class="col-md-1">Pet</th>
                <th class="col-md-1">Tipo Serviço</th>
                <th class="col-md-2">Descrição</th>
                <th class="col-md-2">Pessoa Responsavel</th>
                <th class="col-md-2">Valor</th>
              </thead>
              <tbody>
                <?php foreach($lista as $item):?>
                  <tr>
                    <td><?= $item['id'];?></td>
                   
                    <td><?= $item['nome'];?></td>
                    <td><?= $item['descricao'];?></td>
                    <td><?= $item['nome'];?></td>
                    

                    <td class="text-left">
                        <a class="btn btn-sm btn-info" href="<?= site_url('agendamento/cadastrar/'.$item['id']); ?>">
                            <i class="fa fa-fw fa-edit"></i>
                        </a>
                        <a class="btn btn-sm btn-danger confirmaExclusao" href="<?= site_url('agendamento/remover/'.$item['id']); ?>" data-id="<?= $item['id'];?>"
                          data-nome="<?= $item['id'];?>">
                            <i class="fa fa-fw fa-trash"></i>
                        </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('.confirmaExclusao').on('click', function(e){
        e.preventDefault();
        var id   = $(this).data('id');
        var nome = $(this).data('nome');

        console.log('nome: ' + nome);

        $('#nomeItem').text(nome);
        //criando uma variavel id no modal para receber o id do item a ser excluído
        $('#modalConfirmacao').data('id', id);
        $('#modalConfirmacao').modal('show');
    });

    $('.lancarDevolucao').on('click', function(e){
        e.preventDefault();
        var id   = $(this).data('id');
        var nome = $(this).data('nome');

        console.log('nome: ' + nome);

        $('#itemDevolucao').text(nome);

        $('#formDevolucao').attr('action', '<?= site_url("emprestimo/devolver/")?>'+ id);

        //criando uma variavel id no modal para receber o id do item a ser excluído
        $('#modalDevolucao').modal('show');
    });

    function remove(){
        var id = $('#modalConfirmacao').data('id');
        document.location.href = "<?= site_url('emprestimo/remover/')?>" + id;
    }
</script>

 <!-- DataTables -->
<script src="<?= base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>

<script type="text/javascript">
  $(document).ready( function () {
      $('#tabelaDataTable').DataTable();
  } );
</script>

<!-- Modal de confirmação de exclusão -->
<div class="modal fade" id="modalConfirmacao">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title">Atenção</h4>
       </div>
       <div class="modal-body">
         <p>Você tem certeza que deseja excluir o item: <span id="nomeItem"></span>?</p>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
         <button type="button" class="btn btn-danger" onclick="remove();">Sim, remover</button>
       </div>
     </div>
     <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
 </div>
 <!-- /.modal -->

 <!-- Modal de devolução de exclusão -->
 <div class="modal fade" id="modalDevolucao">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Devolução de Objeto</h4>
        </div>
        <div class="modal-body">

          <p>Informe a data de recebimento do item: <span id="itemDevolucao"></span>?</p>
          <form id="formDevolucao" class="" method="post">
            <div class="form-group">
              <label for="idestado">Data Devolução</label>
              <input class="form-control" type="date" name="data_devolucao" value="<?= date('Y-m-d'); ?>">
            </div>
            <button class="btn btn-success" type="submit">Enviar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          </form>
        </div>
        <!-- <div class="modal-footer">

          <button type="submit" class="btn btn-info">Enviar</button>
        </div> -->
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
