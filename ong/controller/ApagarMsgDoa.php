<?php

// Verficando se a solicitação de acesso veio do servidor e não da URL
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location:../');
    exit;
}

session_start();

$id_Msg_Doa = $_GET['id'];

if(isset($id_Msg_Doa)){

    //REALZIALIZO O UPDATE DA NOVA IMAGEM
    include_once('../../classes/Delete.php');
    $DeletMsgDoa = new Delete();
    $DeletMsgDoa->exeDelete("tbl_doacoes", "WHERE id =:id", "id=" . $id_Msg_Doa);
    $reDeletMsgDoa = $DeletMsgDoa->getResultado();

    if($DeletMsgDoa){

            $_SESSION['msg'] = "<div class='alert alert-success'>Mesangem apagada com sucesso !</div>";
            header('location:' . URL . 'ong/doacoes');

    }else {

            $_SESSION['msg'] = "<div class='alert alert-danger'>ERRO: Não foi possível apagar a mensagem !</div>";
            header('location:' . URL . 'ong/doacoes');

    }

}else {

    header('location:../');
    exit;

}