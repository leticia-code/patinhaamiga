<?php

// Verficando se a solicitação de acesso veio do servidor e não da URL
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location:../');
    exit;
}


//Recebendo os dados do FORM via POST do ajax
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$dados['imagem'] = $_FILES['imagem_nova']['name'];
unset($dados['imagem_antiga']);


if (isset($dados)) {


    //INSERINDO O PET
    include_once('../../classes/Create.php');
    $InserirPet = new Create;
    $InserirPet->exeCreate("tbl_pets", $dados);
    $resultadoInserirPet = $InserirPet->GetResultado();

    //BUSCANDO O ULTIMO ID
    include_once('../../classes/Read.php');
    $UltimoId = new Read();
    $UltimoId->fullRead("SELECT LAST_INSERT_ID() FROM tbl_pets");
    $resultadoUltimoId = $UltimoId->getResultado();
    $ultimo_id = $resultadoUltimoId[0]['LAST_INSERT_ID()'];

    
    //Diretório onde o arquivo vai ser salvo
    $dir = '../assets/imagens/img_pet/' . $ultimo_id . '/';

    //Criar a pasta de foto 
    mkdir($dir, 0755);

    //FAZENDO UPLOAD DA IMAGEM PARA DENTRO DO DIRETORIO
    move_uploaded_file($_FILES['imagem_nova']['tmp_name'], $dir . $dados['imagem']);

    if ($resultadoInserirPet) {

        $_SESSION['msg'] = "<div class='alert alert-success'>Cadastro do pet realizado com sucesso !</div>";
        $retorna = ['success' => true, 'msg' => $_SESSION['msg']]; //Retorno do AJAX no JS
        unset($_SESSION['msg']);
    } else {

        $_SESSION['msg'] = "<div class='alert alert-danger'>ERRO: Não foi possível realizar o cadastro do pet !</div>";
        $retorna = ['success' => false, 'msg' => $_SESSION['msg']]; //Retorno do AJAX no JS   
        unset($_SESSION['msg']);
        
    }

    header('Content-Type: application/json');
    echo json_encode($retorna);
} else {

    header('location:../');
    exit;
}
