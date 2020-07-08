<?php

// Verficando se a solicitação de acesso veio do servidor e não da URL
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location:../');
    exit;
}

session_start();

//Recebendo os dados do FORM via POST do ajax
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if(isset($dados)){

    unset($dados['adotar']);
    $dados['created'] = date("Y-m-d H:i:s");
    //Instanciando classe de INSERT / CREATE
    include_once('../classes/Create.php');
    $InAdocoes = new Create;
    $InAdocoes->exeCreate("tbl_adocoes", $dados);
    $resultadoInAdocoes = $InAdocoes->GetResultado();

    if($resultadoInAdocoes){

        $_SESSION['msg'] = "<br><div style='padding:25px;' class='alert alert-success text-center'>Obrigado por fazer a diferença, logo entraremos em contato para mais detalhes !</div>";
        header('location:' . URL . 'detalhe?id=' . $dados['id_ong'] . '#indicador');
        exit();

    }else {

        $_SESSION['msg'] = "<div class='alert alert-danger text-center'>ERRO: Obs...infelizmente não conseguimos receber sua mensagem, tente novamente mais tarde !</div>";
        header('location:' . URL . 'detalhe?id=' . $dados['id_ong'] . '#indicador');
        exit();

    }


}else {

    header('location:../');
    exit();
}
