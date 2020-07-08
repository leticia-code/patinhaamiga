<?php

// Verficando se a solicitação de acesso veio do servidor e não da URL
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location:../');
    exit;
}

session_start();

$id_msg_news = $_GET['id'];

if(isset($id_msg_news)){

    //REALZIALIZO O UPDATE DA NOVA IMAGEM
    include_once('../../classes/Delete.php');
    $DeletMSGNews = new Delete();
    $DeletMSGNews->exeDelete("tbl_news", "WHERE id =:id", "id=" . $id_msg_news);
    $reDeletMSGNews = $DeletMSGNews->getResultado();

    if($reDeletMSGNews){

            $_SESSION['msg'] = "<div class='alert alert-success'>Mesangem apagada com sucesso !</div>";
            header('location:' . URL . 'ong/emailNews');

    }else {

            $_SESSION['msg'] = "<div class='alert alert-danger'>ERRO: Não foi possível apagar a mensagem !</div>";
            header('location:' . URL . 'ong/emailNews');

    }

}else {

    header('location:../');
    exit;

}