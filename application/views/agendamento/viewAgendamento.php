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
                <th class="col-md-1">Horario Entrada</th>
                <th class="col-md-1">Pet</th>
                <th class="col-md-1">Tipo Serviço</th>
                <th class="col-md-2">Pessoa Responsavel</th>
                <th class="col-md-2">Valor</th>
              </thead>
              <tbody>
                <?php foreach($lista as $item):?>
                  <tr>
                    <td><?= $item['id'];?></td>
                    <td><?= date('d/m/Y', strtotime($item['dataentrada'])); ?></td>
                    <td><?= date('H:i', strtotime($item['horario'])); ?></td>
                    <td><?= $item['raca'];?></td>
                    <td><?= $item['tipoServico'];?></td>
                    <td><?= $item['pessoa'];?></td>
                    <td><?= "R$ ", $item['valor'];?></td>

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
