<?php

// Verficando se a solicitação de acesso veio do servidor e não da URL
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location:../');
    exit;
}

//Recebendo os dados do FORM via POST do ajax
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados)) {


    include_once('../classes/Read.php');
    $verifiEmail = new Read();
    $verifiEmail->fullRead("SELECT * FROM tbl_news WHERE news_email =:news_email", "news_email={$dados['news_email']}");
    $resultaverifiEmail = $verifiEmail->getResultado();

    if ($resultaverifiEmail) {

        $_SESSION['msg'] = "<div class='alert alert-warning'>ERRO: Obs, Email já cadastrado em nosso sistema !</div>";
        $retorna = ['success' => true, 'msg' => $_SESSION['msg']]; //Retorno do AJAX no JS
        unset($_SESSION['msg']);
    } else {

        $dados['created'] = date("Y-m-d H:i:s");

        //Instanciando classe de INSERT / CREATE
        include_once('../classes/Create.php');
        $emailNEWS = new Create;
        $emailNEWS->exeCreate("tbl_news", $dados);
        $resultaemailNEWS = $emailNEWS->GetResultado();

        if ($resultaemailNEWS) {


            $_SESSION['msg'] = "<div class='alert alert-success'>Email cadastrado com sucesso, agora você ficará por dentro de nossas novidades !</div>";
            $retorna = ['success' => true, 'msg' => $_SESSION['msg']]; //Retorno do AJAX no JS
            unset($_SESSION['msg']);
        } else {

            $_SESSION['msg'] = "<div class='alert alert-danger'>ERRO: Obs, houve um erro em nosso servidor, tente mais tarde !</div>";
            $retorna = ['success' => true, 'msg' => $_SESSION['msg']]; //Retorno do AJAX no JS
            unset($_SESSION['msg']);
        }
    }


    header('Content-Type: application/json');
    echo json_encode($retorna);
} else {

    header('location:../');
    exit();
}
