<div class="row">
    <div class="col-md-12">
        <div class="box">
          <!-- <div class="box-header with-border">
              <h2 class="box-title"><?php //echo $titulo; ?></h2>
          </div> -->
          <div class="box-body">
            <a class="btn btn-primary" href="<?= site_url('checklist/cadastrar'); ?>">
              <i class="fa fa-fw fa-plus"></i>Adicionar
            </a>
            <table class="table table-hover table-striped">
              <thead>
                <th>#</th>
                <th>Serviço</th>
                <th>Descrição</th>
                <th>Hora Inicial</th>
                <th>Hora Final</th>
                <th>Data</th>
                <th class="col-md-1">Ações</th>
              </thead>
              <tbody>
                <?php foreach($lista as $item):?>
                  <tr>
                    <td><?= $item['id'];?></td>
                    <td><?= $item['tipoServico'];?></td>
                    <td><?= $item['descricao'];?></td>
                    <td><?= date('H:i', strtotime($item['horainicio'])); ?></td>
                    <td><?= date('H:i', strtotime($item['horafinal'])); ?></td>
                    <td><?= date('d/m/Y', strtotime($item['dataservico'])); ?></td>
                    <td>
                        <a class="btn btn-xs btn-info" href="<?= site_url('checklist/cadastrar/'.$item['id']); ?>">
                            <i class="fa fa-fw fa-edit"></i>
                        </a>
                        <a class="btn btn-xs btn-danger" href="<?= site_url('checklist/remover/'.$item['id']); ?>">
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


