<?php
include_once('Config.php');

include_once('include/cabecalho.php');

include_once('include/menu.php');

include_once('classes/ReadIndex.php');

$dadosINDEX = new ReadIndex();
$dadosINDEX->fullRead("SELECT sobre_esquerdo, sobre_direito FROM tbl_index");
$redadosINDEX = $dadosINDEX->getResultado();
?>

<div style="background-color:white;" class="container text-center">
    <img src="<?php echo URL . 'assets/img/icons/logo_quem_somos.png' ?>" class="img-fluid" alt="Patinha Amiga">
</div>

<div style="background-color:white; padding:2rem;" class="container">
    <div class="row">

        <div class="col-sm-6">
            <p style="text-align: justify;"><?php echo $redadosINDEX[0]['sobre_esquerdo'] ?></p>
        </div>

        <div class="col-sm-6">
            <p style="text-align: justify;"><?php echo $redadosINDEX[0]['sobre_direito'] ?></p>

        </div>


    </div>
</div>

<div style="background-color:white; padding:1.5rem;" class="container text-center">
    <h4>IDEALIZADORES DO PATINHA AMIGA</h4>
</div>

<div style="background-color:white; padding:1.5rem;" class="container">


    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2">
            <img src="<?php echo URL . 'assets/img/perfil/le.jpg' ?>" class="rounded float-left rounded-circle" alt="Leticia cardoso" width="130px" height="130px">
        </div>

        <div class="col-sm-7"><br>
            <h5>Nome: Letícia de Oliveira Cardoso</h5><br>
            <h5>Responsável por: Desenvolvimento do site (Front e Back-end)</h5>
        </div>
    </div><br><br>

    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2">
            <img src="<?php echo URL . 'assets/img/perfil/mar.jpeg' ?>" class="rounded float-left rounded-circle" alt="Marllon William" width="130px" height="130px">
        </div>

        <div class="col-sm-7"><br>
            <h5>Nome: Marllon William Viera Pereira</h5><br>
            <h5>Responsável por: Criação de layout</h5>
        </div>
    </div><br><br>

    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2">
            <img src="<?php echo URL . 'assets/img/perfil/nay.jpg' ?>" class="rounded float-left rounded-circle" alt="Nayane da silva" width="130px" height="130px">
        </div>

        <div class="col-sm-7"><br>
            <h5>Nome: Nayane da Silva Santos</h5><br>
            <h5>Responsável por: Criação de layout</h5>
        </div>
    </div><br><br>

    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2">
            <img src="<?php echo URL . 'assets/img/perfil/vini.jpeg' ?>" class="rounded float-left rounded-circle" alt="Vinicius alves" width="130px" height="130px">
        </div>

        <div class="col-sm-7"><br>
            <h5>Nome: Vinícius Alves Guedes</h5><br>
            <h5>Responsável por: Documentação</h5>
        </div>
    </div><br><br>


    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2">
            <img src="<?php echo URL . 'assets/img/perfil/will.jpeg' ?>" class="rounded float-left rounded-circle" alt="William Bezerra" width="130px" height="130px">
        </div>

        <div class="col-sm-7"><br>
            <h5>Nome: William Bezerra de Sousa</h5><br>
            <h5>Responsável por: Pesquisa</h5>
        </div>
    </div><br><br>
</div>



<?php
include_once('include/rodape.php');
?>