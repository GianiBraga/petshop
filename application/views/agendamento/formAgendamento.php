<div class="row col-md-12">
    <div class="box">
        <div class="box-body">
          <?php
              //verificando se o form_validation retornou erros
              if(validation_errors() != null){ ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Erro!</h4>
                    <?php echo validation_errors(); //mostra os erros?>
                </div>
          <?php } ?>

          <?php echo form_open($acao); ?>
          <div class="form-group">
          <label for="idservico">Serviço</label>
          <select class="form-control" name="idservico" required>
          <option value="">Selecione um item da lista</option>
          <?php foreach ($listaTipoServico as $item): ?>
          <option value="<?= $item['id']; ?>" <?php if(isset($registro) && $item['id']==$registro['idservico']) echo "selected";?>>
          <?= $item['tipoServico']; ?>
          </option>
          <?php endforeach; ?>
          </div>
         </select>


          <div class="form-group">
          <label for="idpet ">Raça</label>
          <select class="form-control" name="idpet" required>
          <option value="">Selecione a Raça</option>
          <?php foreach ($listaPet as $item): ?>
          <option value="<?= $item['id']; ?>" <?php if(isset($registro) && $item['id']==$registro['idpet']) echo "selected";?>>
          <?= $item['raca']; ?>
          </option>
          <?php endforeach; ?>
          </div>
          </select>

          <div class="form-group">
          <label for="idpessoa ">Pessoa Responsavel</label>
          <select class="form-control" name="idpessoa" required>
          <option value="">Selecione a Pessoa</option>
          <?php foreach ($listaPessoa as $item): ?>
          <option value="<?= $item['id']; ?>" <?php if(isset($registro) && $item['id']==$registro['idpessoa']) echo "selected";?>>
          <?= $item['nome']; ?>
          </option>
          <?php endforeach; ?>
          </div>
          </select>


            <div class="form-group">
                <label for="dataentrada">Data Entrada</label>
                <input id="dataentrada" class="form-control" type="date" name="dataentrada"
                value="<?= set_value($registro!=null)? $registro['dataentrada'] : date('Y-m-d'); ?>"
                placeholder="Informe a Data" required>
            </div>

            <div class="form-group">
                <label for="dataentrada">Hora Entrada</label>
                <input id="dataentrada" class="form-control" type="time" name="dataentrada"
                value="<?= set_value($registro!=null) == $registro['horaentrada']; ?>"
                placeholder="Informe a Data" required>
            </div>

            <button class="btn btn-success" type="submit">Enviar</button>
            <a href="<?= site_url('agendamento'); ?>" class="btn btn-info">Cancelar</a>
          </form>
        </div>
    </div>
</div>
