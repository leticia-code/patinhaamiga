<?php
//VERIFICO SE EXISTE SESSÃO
session_start();

if (!key_exists('adm', $_SESSION)) {

    header('location:../');
    die;
}

include('include/cabecalhoAdm.php');

include('include/interfaceAdm.php');

//COUNT DAS ONGS
include_once('../classes/Read.php');
$QTDong = new Read();
$QTDong->fullRead("SELECT id FROM tbl_ongs");
$ReQTDong = $QTDong->getResultado();


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
                        <h6 class="card-title">ONG's cadastradas</h6>
                        <h2 class="lead"><?php echo count($ReQTDong);  ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card bg-danger text-white">
                    <div class="card-body">
                        <i class="fas fa-edit fa-3x"></i>
                        <h6 class="card-title">Editar Front</h6>
                        <h2 class="lead"><?php   ?></h2>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>




<?php
//</body>
include('include/rodapeAdm.php');
?>