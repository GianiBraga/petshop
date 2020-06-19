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
                <label for="horario">Horário</label>
                <input id="horario" class="form-control" type="time" name="horario"
                value="<?= set_value($registro!=null) == $registro['horario']; ?>"
                placeholder="Informe o Horário para cadastro" required>
            </div>

            <button class="btn btn-success" type="submit">Cadastrar</button>
            <a href="<?= site_url('raca'); ?>" class="btn btn-info">Cancelar</a>
          </form>
        </div>
    </div>
</div>
