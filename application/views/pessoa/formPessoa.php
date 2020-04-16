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
                placeholder="Digite seu nome" required>
            </div>

            <div class="form-group">
              <label for="idade">Idade</label>
              <input class="form-control" id="idade" type="number" name="idade" value="<?= set_value('idade', $registro['idade']); ?>"
                 min="0" max="150" placeholder="Informe sua idade">
            </div>

            <div class="form-group">
              <label for="endereco">Endereço</label>
              <input class="form-control" id="endereco" type="text" name="endereco"
                value="<?= set_value('endereco', $registro['endereco']); ?>"
                placeholder="Informe seu endereço">
            </div>

            <div class="form-group">
              <label for="email">E-mail</label>
              <input class="form-control" id="email" type="text" name="email" value="<?= set_value('email', $registro['email']); ?>"
                 min="0" max="20" placeholder="Informe seu E-mail">
            </div>

            <div class="form-group">
              <label for="idade">CPF</label>
              <input class="form-control" id="cpf" type="number" name="cpf" value="<?= set_value('cpf', $registro['cpf']); ?>"
                 min="0" max="99999999999" placeholder="Informe seu CPF">
            </div>

            <div class="form-group">
              <label for="idade">RG</label>
              <input class="form-control" id="rg" type="number" name="rg" value="<?= set_value('rg', $registro['rg']); ?>"
                 min="0" max="99999999999" placeholder="Informe seu RG">
            </div>

            <div class="form-group">
              <label for="idade">Telefone</label>
              <input class="form-control" id="telefone" type="number" name="telefone" value="<?= set_value('telefone', $registro['telefone']); ?>"
                 min="0" max="99999999999" placeholder="Informe sua idade">
            </div>

            <button class="btn btn-success" type="submit">Cadastrar</button>
            <a href="<?= site_url('pessoa'); ?>" class="btn btn-info">Cancelar</a>
          </form>
        </div>
    </div>
</div>
