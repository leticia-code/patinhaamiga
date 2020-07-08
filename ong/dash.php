<?php

//VERIFICO SE EXISTE SESSÃO
session_start();

if (!key_exists('ong', $_SESSION)) {

    header('location:../');
    die;
}

include('include/cabecalhoOng.php');
include('include/interfaceOng.php');

$id_ong = $_SESSION['ong']['id'];

//COUNT DOS PETS
include_once('../classes/Read.php');
$QTDpet = new Read();
$QTDpet->fullRead("SELECT id FROM tbl_pets WHERE id_ong = $id_ong");
$ReQTDpet = $QTDpet->getResultado();

//COUNT DAS ADOÇÕES
include_once('../classes/Read.php');
$QTDadoc = new Read();
$QTDadoc->fullRead("SELECT id FROM tbl_adocoes WHERE id_ong = $id_ong");
$ReQTDadoc = $QTDadoc->getResultado();

//COUNT DAS DOAÇÕES
include_once('../classes/Read.php');
$QTDdoac = new Read();
$QTDdoac->fullRead("SELECT id FROM tbl_doacoes WHERE id_ong = $id_ong");
$ReQTDdoac = $QTDdoac->getResultado();


//<body>
?>

<div class="content p-1">
<div class="list-group-item">
    <div class="d-flex">
        <div class="mr-auto p-2">
            <h2 class="display-4 titulo">Dashboard</h2>
        </div>
    </div>
    <div style="justify-content:center;" class="row mb-3">
        <div class="col-lg-3 col-sm-6">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <i class="fas fa-paw fa-3x"></i>
                    <h6 class="card-title">Meus Pets</h6>
                    <h2 class="lead"><?php echo count($ReQTDpet);  ?></h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <i class="fas fa-heart fa-3x"></i>
                    <h6 class="card-title">Adoções</h6>
                    <h2 class="lead"><?php echo count($ReQTDadoc);  ?></h2>
                </div>
            </div> 
        </div>

    </div>

    <div style="justify-content:center;" class="row mb-3">

    <div class="col-lg-3 col-sm-6">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <i class="fas fa-balance-scale fa-3x"></i>
                    <h6 class="card-title">Doações</h6>
                    <h2 class="lead"><?php echo count($ReQTDdoac);  ?></h2>
                </div>
            </div>
        </div>

    </div>
</div>
</div>


<?php
//</body>
include('include/rodapeOng.php');
?>
