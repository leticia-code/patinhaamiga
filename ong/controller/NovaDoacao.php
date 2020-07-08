<?php

// Verficando se a solicitação de acesso veio do servidor e não da URL
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location:../');
    exit;
}

//Recebendo os dados do FORM via POST do ajax
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if (isset($dados)) {

    if (isset($dados['doa_alimento'])) { //SE VIER DADOS DO CHECKBOX ALIMENTO
        $dados['doa_alimento'] = 'Sim';
    } else {
        $dados['doa_alimento'] = 'Nao';
    }

    if (isset($dados['doa_medicamento'])) { //SE VIER DADOS DO CHECKBOX MEDICAMENTOS
        $dados['doa_medicamento'] = 'Sim';
    } else {
        $dados['doa_medicamento'] = 'Nao';
    }

    if (isset($dados['doa_higiene'])) { //SE VIER DADOS DO CHECKBOX HIGIENE
        $dados['doa_higiene'] = 'Sim';
    } else {
        $dados['doa_higiene'] = 'Nao';
    }

    $dados['created'] = date("Y-m-d H:i:s");
    
    //INSERINDO O PET
    include_once('../../classes/Create.php');
    $newDoacao = new Create;
    $newDoacao->exeCreate("tbl_doacoes", $dados);
    $REnewDoacao = $newDoacao->GetResultado();

    if ($REnewDoacao) {

        $_SESSION['msg'] = "<div class='alert alert-success'>Obrigado por fazer parte da mudança com a gente, logo entraremos em contato para confirmar as doações !</div>";
        $retorna = ['success' => true, 'msg' => $_SESSION['msg']]; //Retorno do AJAX no JS
        unset($_SESSION['msg']);
    } else {

        $_SESSION['msg'] = "<div class='alert alert-danger'>ERRO: Não foi possível receber dados da doação, tente mais tarde por favor !</div>";
        $retorna = ['success' => false, 'msg' => $_SESSION['msg']]; //Retorno do AJAX no JS   
        unset($_SESSION['msg']);
    }

    header('Content-Type: application/json');
    echo json_encode($retorna);


} else {
    header('location:../');
    exit;
}
