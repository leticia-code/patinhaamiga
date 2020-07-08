<?php

// Verficando se a solicitação de acesso veio do servidor e não da URL
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location:../');
    exit;
}

//Recebendo os dados do FORM via POST do ajax
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados)) {

    unset($dados['loginOng']);
    //Instanciando a classe de SELECT para buscar os email's e CPF's já cadastrado no sistema
    include_once('../classes/Read.php');
    $verificaLogin = new Read();
    $verificaLogin->fullRead("SELECT *   FROM tbl_ongs WHERE email =:email", "email={$dados['email']}");
    $resultadoverificaLogin = $verificaLogin->getResultado();

    if (!empty($resultadoverificaLogin)) {

        if (password_verify($dados['senha'], $resultadoverificaLogin[0]['senha']) == false) { // SE A SENHA DIGITADA FOR DIFERENTE DA QUE ESTÁ NO BD

            $_SESSION['msg'] = "<div class='alert alert-danger'>ERRO: Senha incorreta !</div>";
            $retorna = ['success' => false, 'msg' => $_SESSION['msg']]; //Retorno do AJAX no JS   
            unset($_SESSION['msg']);
        } else { //SE ESTIVER TUDO OK LOGA

            $_SESSION['msg'] = "<div class='alert alert-success'>Entrando...</div>";
            $retorna = ['success' => true, 'msg' => $_SESSION['msg']]; //Retorno do AJAX no JS   
            unset($_SESSION['msg']);
            session_start(); //INICIANDO SESSÃO
            $_SESSION['ong'] = $resultadoverificaLogin[0]; //inciando sessão do usuario todos seus dados 
        }
    } else { //SE NÃO EMAIL N ENCONTRADO

        $_SESSION['msg'] = "<div class='alert alert-danger'>ERRO: Email incorreto !</div>";
        $retorna = ['success' => false, 'msg' => $_SESSION['msg']]; //Retorno do AJAX no JS   
        unset($_SESSION['msg']);
    }
    header('Content-Type: application/json');
    echo json_encode($retorna);
} else {

    header('location:../');
    exit();
}
