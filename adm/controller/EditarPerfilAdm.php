<?php

// Verficando se a solicitação de acesso veio do servidor e não da URL
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location:../');
    exit;
}


//Recebendo os dados do FORM via POST do ajax
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados)) {


      //REALZIALIZO O UPDATE DA NOVA IMAGEM
        include_once('../../classes/Update.php');
        $AttPerfil = new Update();
        $AttPerfil->exeUpdate("tbl_index", $dados);
        $reAttPerfil = $AttPerfil->getResultado();

        if ($reAttPerfil) {

            $_SESSION['msg'] = "<div class='alert alert-success'>Dados atualizado com sucesso !</div>";
            $retorna = ['success' => true, 'msg' => $_SESSION['msg']]; //Retorno do AJAX no JS
            
        } else {

            $_SESSION['msg'] = "<div class='alert alert-danger'>ERRO: Não foi possível realizar a edição dos dados !</div>";
            $retorna = ['success' => false, 'msg' => $_SESSION['msg']]; //Retorno do AJAX no JS   
            
        }
    

    header('Content-Type: application/json');
    echo json_encode($retorna);
} else {

    header('location:../');
    exit;
}


