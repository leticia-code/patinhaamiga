<?php

// Verficando se a solicitação de acesso veio do servidor e não da URL
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location:../');
    exit;
}

session_start();

$id_msg = $_GET['id'];

if(isset($id_msg)){

    //REALZIALIZO O UPDATE DA NOVA IMAGEM
    include_once('../../classes/Delete.php');
    $DeletMSG = new Delete();
    $DeletMSG->exeDelete("tbl_adocoes", "WHERE id =:id", "id=" . $id_msg);
    $reDeletMSG = $DeletMSG->getResultado();

    if($DeletMSG){

            $_SESSION['msg'] = "<div class='alert alert-success'>Mesangem apagada com sucesso !</div>";
            header('location:' . URL . 'ong/adocoes');

    }else {

            $_SESSION['msg'] = "<div class='alert alert-danger'>ERRO: Não foi possível apagar a mensagem !</div>";
            header('location:' . URL . 'ong/adocoes');

    }

}else {

    header('location:../');
    exit;

}