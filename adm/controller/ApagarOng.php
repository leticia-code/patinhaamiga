<?php

// Verficando se a solicitação de acesso veio do servidor e não da URL
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location:../');
    exit;
}

$id_ong = $_GET['id'];

include_once('../../classes/Read.php');   
$BuscaID = new Read();
$BuscaID->fullRead("SELECT id FROM tbl_ongs WHERE id = $id_ong");
$resultaBuscaID = $BuscaID->getResultado();


if($resultaBuscaID AND $id_ong){

    session_start();

        //DELETANDO ADOÇÕES REFERNTE A ONG EXCLUIDA
        include_once('../../classes/Delete.php');
        $DeletOngAdocoes = new Delete();
        $DeletOngAdocoes->exeDelete("tbl_adocoes", "WHERE id_ong =:id_ong", "id_ong=" . $id_ong);
        $reDeletOngAdocoes = $DeletOngAdocoes->getResultado();

        //DELETANDO DOAÇÕES REFERNTE A ONG EXCLUIDA
        $DeletOngDoacoes = new Delete();
        $DeletOngDoacoes->exeDelete("tbl_doacoes", "WHERE id_ong =:id_ong", "id_ong=" . $id_ong);
        $reDeletOngDoacoes = $DeletOngDoacoes->getResultado();

        //DELETANDO PETS REFERNTE A ONG EXCLUIDA
        $DeletOngPets = new Delete();
        $DeletOngPets->exeDelete("tbl_pets", "WHERE id_ong =:id_ong", "id_ong=" . $id_ong);
        $reDeletOngPets = $DeletOngPets->getResultado();

        //DELETANDO A ONG
        $DeletOng = new Delete();
        $DeletOng->exeDelete("tbl_ongs", "WHERE id =:id", "id=" . $id_ong);
        $ReDeletOng = $DeletOng->getResultado();

        if($ReDeletOng){

            $_SESSION['msg'] = "<div class='alert alert-success'>ONG apagada com sucesso !</div>";
            header('location:' . URL . 'adm/listarOngs');

        }else {

            $_SESSION['msg'] = "<div class='alert alert-danger'>ERRO: Não foi possível apagar a ONG, tente mais tarde !</div>";
            header('location:' . URL . 'adm/listarOngs');

        }



}else {
    header('location:../');
    exit;
}





