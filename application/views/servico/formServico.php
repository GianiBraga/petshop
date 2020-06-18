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
                <label for="descricao">Descrição:</label>
                <input id="descricao" class="form-control" type="text" name="descricao"
                value="<?= set_value('descricao', $registro['descricao']); ?>"
                placeholder="Digite a descrição" required>
            </div>

            <div class="form-group">
              <label for="tipoServico">Tipo do Serviço</label>
              <input class="form-control" id="tipoServico" type="text" name="tipoServico" value="<?= set_value('tipoServico', $registro['tipoServico']); ?>"
                 min="0" max="30" placeholder="Informe o tipo do serviço: ">
            </div>

            <div class="form-group">
              <label for="duracao">Duração</label>
              <input class="form-control" id="sexo" type="time" name="duracao"
                value="<?= set_value('duracao', $registro['duracao']); ?>"
               placeholder="Informe a duração: ">
            </div>

            <div class="form-group">
              <label for="valor">Valor</label>
              <input class="form-control" id="valor" type="float" name="valor" value="<?= set_value('valor', $registro['valor']); ?>"
                 placeholder="Informe o Valor: ">
            </div>

            <button class="btn btn-success" type="submit">Cadastrar</button>
            <a href="<?= site_url('servico'); ?>" class="btn btn-info">Cancelar</a>
          </form>
        </div>
    </div>
</div>
