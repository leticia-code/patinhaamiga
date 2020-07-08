<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo URL; ?>"><img src="<?php echo URL . 'assets/img/icons/logo.png'; ?>" alt="Patinha logo" width="200" height="70"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URL; ?>">PÁGINA INICIAL</a> <!-- <span class="sr-only">(current)</span> -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo  URL . 'ongs' ?>">ONG's</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="<?php echo  URL . 'quem-somos' ?>">QUEM SOMOS</a>
        </li>
      </ul>
      <div style="margin-left:30%;" class="">
        <a class="btn btn-outline-success btn-persona" type="button" data-toggle="modal" data-target="#logarOng">ENTRAR</a>
        <a class="btn btn-success btn-persona-reg" type="button" data-toggle="modal" data-target="#cadastroOng">REGISTRE-SE</a>
      </div>
    </div>
  </nav>
</div>


<!--MODAL CADASTRO -->
<span class="enderecoCadOng" data-enderecocad="<?php echo URL . 'controller/CadOng'; ?>"></span>
<div class="modal" tabindex="-1" role="dialog" id="cadastroOng">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title">Junte-se ao patinha amiga</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span id="msgCadOng"></span>
        <form id="cadOng" method="POST">
          <div class="form-group">
            <label>CNPJ:</label>
            <input type="text" id="cnpj" name="cnpj" class="form-control input-border" placeholder="Digite o CNPJ da ONG" required="">
          </div>
          <div class="form-group">
            <label>Nome fantasia:</label>
            <input type="text" name="nome_fantasia" class="form-control input-border" placeholder="Digite o nome fantasia da ONG" maxlength="100" required="">
          </div>
          <div class="form-group">
            <label>Seu nome:</label>
            <input type="text" name="nome" class="form-control input-border" placeholder="Digite o seu nome" maxlength="100" required="">
          </div>
          <div class="form-group">
            <label>Telefone:</label>
            <input type="text" id="telefone" name="telefone" class="form-control input-border" placeholder="Digite um telefone para contato" required="">
          </div>
          <div class="form-group">
            <label>E-mail:</label>
            <input type="email" name="email" class="form-control input-border" placeholder="Digite o seu melhor Email" maxlength="100" required="">
          </div>
          <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="senha" class="form-control input-border" placeholder="Digite uma senha. Min 8 caracteres" minlength="8" maxlength="40" required="">
          </div>
          <div style="justify-content:center;" class="modal-footer text-center">
            <input name="CadOng" type="submit" class="btn btn-persona-reg-2 input-border" value="Cadastrar-se" />
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal login -->
<span class="EnderecoLogin" data-enderecocad="<?php echo URL . 'controller/LoginOng'; ?>"></span>
<div class="modal fade" id="logarOng" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Fazer login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Login Form -->
        <span id="msgLogin"></span>
        <form id="login_ong" method="POST">
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control input-border" placeholder="Digite seu email" require="">
          </div>
          <div class="form-group">
            <label>Senha</label>
            <input type="password" name="senha" class="form-control input-border" placeholder="Digite a senha" required="">
          </div>
          <div style="justify-content:center;" class="modal-footer">
            <input name="loginOng" type="submit" class="btn btn-persona-reg-2 input-border" value="Entrar">
          </div>
        </form>
        <div class="text-center"> 
        <a href="admin">Sou administrador</a>
        </div>
      </div>

    </div>
  </div>
</div>