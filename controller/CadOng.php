<?php

// Verficando se a solicitação de acesso veio do servidor e não da URL
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location:../');
    exit;
}


//Recebendo os dados do FORM via POST do ajax
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados)) {

    //Instanciando a classe de SELECT para buscar os email's e CPF's já cadastrado no sistema
    include_once('../classes/Read.php');
    $verificaCad = new Read();
    $verificaCad->fullRead("SELECT email, cnpj FROM tbl_ongs WHERE email =:email OR cnpj =:cnpj", "email={$dados['email']}&cnpj={$dados['cnpj']}");
    $resultadoverificaCad = $verificaCad->getResultado();
    
    if (!empty($resultadoverificaCad)) { // VERIFICO SE O RESULTADO É DIFERENTE DE VAZIO

        foreach ($resultadoverificaCad as $email) { // FOREACH NA COLUNA EMAIL
            extract($email);


            if ($email == $dados['email']) { // VERFICO SE EXISTE ALGUM VALOR NA COLUNA EMAIL IGUAL AO QUE O USUARIO DIGITOU NO CAMPO EMAIL

                $_SESSION['msg'] = "<div class='alert alert-danger'>ERRO: Email já cadastrado no sistema !</div>";
                $retorna = ['success' => false, 'msg' => $_SESSION['msg']]; //Retorno do AJAX no JS   
                unset($_SESSION['msg']);
                header('Content-Type: application/json');
                echo json_encode($retorna);
                exit();
            }
        }

        foreach ($resultadoverificaCad as $cnpj) { // FOREACH NA COLUNA CPF
            extract($cnpj);


            if ($cnpj == $dados['cnpj']) { // VERFICO SE EXISTE ALGUM VALOR NA COLUNA CPF IGUAL AO QUE O USUARIO DIGITOU NO CAMPO CPF


                $_SESSION['msg'] = "<div class='alert alert-danger'>ERRO: CNPJ já cadastrado no sistema !</div>";
                $retorna = ['success' => false, 'msg' => $_SESSION['msg']]; //Retorno do AJAX no JS   
                unset($_SESSION['msg']);
                header('Content-Type: application/json');
                echo json_encode($retorna);
                exit();
            }
        }
    } else { //SE PASSAR POR TODAS AS VALIDAÇÕES CADASTRO O USUARIO
        unset($dados['CadOng']);
            $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
            $dados['created'] = date("Y-m-d H:i:s");
           
        //Instanciando classe de INSERT / CREATE
        include_once('../classes/Create.php');
        $InserirOng = new Create();
        $InserirOng->exeCreate("tbl_ongs", $dados);
        $resultadoInserirOng = $InserirOng->GetResultado();

        if ($resultadoInserirOng) {

            //$_SESSION['msg'] = "<div class='alert alert-success'>Usuário cadastrado com sucesso, faça o login!</div>";
            $_SESSION['msg'] = "<div class='alert alert-success'>Cadastro efetuado com sucesso, login já pode ser realizado !</div>";
            $retorna = ['success' => true, 'msg' => $_SESSION['msg']]; //Retorno do AJAX no JS
            unset($_SESSION['msg']);
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>ERRO: Não foi possível realizar seu cadastro, tente mais tarde !</div>";
            $retorna = ['success' => false, 'msg' => $_SESSION['msg']]; //Retorno do AJAX no JS   
            unset($_SESSION['msg']);
        }
    }
    header('Content-Type: application/json');
    echo json_encode($retorna);
} else {

    header('location:../');
    exit();
}
