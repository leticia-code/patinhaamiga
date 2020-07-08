<?php
include_once('classes/Config.php');

include_once('include/cabecalho.php');

?>
<link rel="stylesheet" href="<?php echo URL . 'assets/css/personalizadoLoginAdm.css' ?>">

<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <img src="<?php echo URL . 'assets/img/icons/logo_quem_somos.png' ?>" id="icon" alt="Logo" />
        </div>

        <!-- Login Form -->
        <span class="EnderecoLoginAdmin" data-enderecocad="<?php echo URL . 'controller/LoginAdm'; ?>"></span>
        <form method="POST" id="login_adm">
            <input type="email" id="login" class="fadeIn second" name="email" placeholder="Email">
            <input type="password" id="password" class="fadeIn third" name="senha" placeholder="Senha">
            <input type="submit" class="fadeIn fourth" value="Entrar">
        </form>
        <span id="msgLoginAdmin"></span>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script language="javascript" src="<?php echo URL . 'assets/js/jquery.mask.min.js' ?>"></script>
<script language="javascript" src="<?php echo URL . 'assets/js/script.js' ?>"></script>