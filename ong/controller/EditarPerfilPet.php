<?php

// Verficando se a solicitação de acesso veio do servidor e não da URL
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location:../');
    exit;
}


$id_pet = $_POST['id_pet'];
$id_ong = $_POST['id_ong'];

//Recebendo os dados do FORM via POST do ajax
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados)) {

    unset($dados['imagem_antiga']); //Destruo o nome da imagem antiga
    $dados['imagem'] = $_FILES['imagem_nova']['name']; //Salvo o nome da img vindo do files em uma variavel
    $dados['id_ong'] = $id_ong; //PASSANDO O VALOR DO ID DA ONG PARA O CAMPO ID_ONG QUE VAI PARA O BD
    $verifica_tamanho_img = strlen($dados['imagem']); //VERIFICANDO COMPRIMENTO DA STRING VINDA DO CAMPO DA IMAGEM DO FORM 

    if ($verifica_tamanho_img < 1) { //VERIFICO SE O NOME DA IMAGEM VINDO DO FORM É MENOR QUE 1 (PARA SABER SE O USUARIO ALTEROU OU NÃO)

        unset($dados['imagem']); //TIRO O CAMPO DA IMAGEM 
        unset($dados['id_pet']); //TIRO O ID DO PET

        //REALZIALIZO O UPDATE DA NOVA IMAGEM
        include_once('../../classes/Update.php');
        $updateDadosPet = new Update();
        $updateDadosPet->exeUpdate("tbl_pets", $dados, "WHERE id =:id", "id=" . $id_pet);
        $reupdateDadosPet = $updateDadosPet->getResultado();

        if ($reupdateDadosPet) {

            $_SESSION['msg'] = "<div class='alert alert-success'>Cadastro do pet atualizado com sucesso !</div>";
            $retorna = ['success' => true, 'msg' => $_SESSION['msg']]; //Retorno do AJAX no JS
            unset($_SESSION['msg']);
        } else {

            $_SESSION['msg'] = "<div class='alert alert-danger'>ERRO: Não foi possível realizar a edição no cadastro !</div>";
            $retorna = ['success' => false, 'msg' => $_SESSION['msg']]; //Retorno do AJAX no JS   
            unset($_SESSION['msg']);
        }
    } else { //CASO TENHA FOTO SELECIONADA
        unset($dados['id_pet']);

        //REALZIALIZO O UPDATE DA NOVA IMAGEM
        include_once('../../classes/Update.php');
        $updateDadosPet = new Update();
        $updateDadosPet->exeUpdate("tbl_pets", $dados, "WHERE id =:id", "id=" . $id_pet);
        $reupdateDadosPet = $updateDadosPet->getResultado();

        if ($reupdateDadosPet) {

            //Diretório onde o arquivo vai ser salvo
            $dir = '../assets/imagens/img_pet/' . $id_pet . '/';

            //FAZENDO UPLOAD DA IMAGEM PARA DENTRO DO DIRETORIO
            move_uploaded_file($_FILES['imagem_nova']['tmp_name'], $dir . $dados['imagem']);

            $_SESSION['msg'] = "<div class='alert alert-success'>Cadastro do pet atualizado com sucesso !</div>";
            $retorna = ['success' => true, 'msg' => $_SESSION['msg']]; //Retorno do AJAX no JS
            unset($_SESSION['msg']);
        } else {

            $_SESSION['msg'] = "<div class='alert alert-danger'>ERRO: Não foi possível realizar a edição no cadastro !</div>";
            $retorna = ['success' => false, 'msg' => $_SESSION['msg']]; //Retorno do AJAX no JS   
            unset($_SESSION['msg']);
        }
    }

    header('Content-Type: application/json');
    echo json_encode($retorna);
} else {

    header('location:../');
    exit;
}
