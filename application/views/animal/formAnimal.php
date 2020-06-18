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
                <label for="nome">Nome</label>
                <input id="nome" class="form-control" type="text" name="nome"
                value="<?= set_value('nome', $registro['nome']); ?>"
                placeholder="Digite o nome" required>
            </div>

            <div class="form-group">
            <label for="idraca">Raça</label>
            <select class="form-control" name="idraca" required>
            <option value="">Selecione uma raça da lista</option>
            <?php foreach ($listaRaca as $item): ?>
            <option value="<?= $item['id']; ?>" <?php if(isset($registro) && $item['id']==$registro['idraca']) echo "selected";?>>
            <?= $item['nome']; ?>
            </option>
            <?php endforeach; ?>
            </div>
           </select>
            </div>

            <div class="form-group">
              <label for="sexo">Sexo</label>
              <select class="form-control" name="sexo">
                <option value="M" <?php if(isset($registro) && $registro['sexo']=='M') echo "selected"; ?> >Macho</option>
                <option value="F" <?php if(isset($registro) && $registro['sexo']=='F') echo "selected"; ?> >Fêmea</option>
              </select>
            </div>

            <div class="form-group">
              <label for="porte">Porte</label>
              <select class="form-control" name="porte">
                <option value="P" <?php if(isset($registro) && $registro['porte']=='P') echo "selected"; ?> >Pequeno</option>
                <option value="M" <?php if(isset($registro) && $registro['porte']=='M') echo "selected"; ?> >Medio</option>
                <option value="G" <?php if(isset($registro) && $registro['porte']=='G') echo "selected"; ?> >Grande</option>
              </select>
            </div>

            <button class="btn btn-success" type="submit">Cadastrar</button>
            <a href="<?= site_url('animal'); ?>" class="btn btn-info">Cancelar</a>
          </form>
        </div>
    </div>
</div>
