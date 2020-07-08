<?php

// Verficando se a solicitação de acesso veio do servidor e não da URL
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location:../');
    exit;
}


//Recebendo os dados do FORM via POST do ajax
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$dados['descricao'] = $_POST['descricao'];


if (isset($dados)) {

    unset($dados['imagem_antiga']); //Destruo o nome da imagem antiga
    $id_ong = $dados['id_ong']; 
    unset($dados['id_ong']); //Destruo o input com o valor do ID e deixo na variavel $id_ong
    $dados['imagem'] = $_FILES['imagem_nova']['name']; //Salvo o nome da img vindo do files em uma variavel

    include_once('../../classes/Read.php');   
    $verificaImgPerfil = new Read();
    $verificaImgPerfil->fullRead("SELECT imagem FROM tbl_ongs WHERE id = $id_ong");
    $reverificaImgPerfil = $verificaImgPerfil->getResultado();

    if (!empty($_FILES['imagem_nova']['tmp_name'])) { //VERIFICO SE TEM IMAGEM VINDO FORM

        
        //Diretório onde o arquivo vai ser salvo
        $dir = '../assets/imagens/img_ong_profile/' . $id_ong . '/';

        //Criar a pasta de foto 
        mkdir($dir, 0755);

        //FAZENDO UPLOAD DA IMAGEM PARA DENTRO DO DIRETORIO
        move_uploaded_file($_FILES['imagem_nova']['tmp_name'], $dir . $dados['imagem']);


        //REALZIALIZO O UPDATE DA NOVA IMAGEM
        include_once('../../classes/Update.php');
        $updateDadosOng = new Update();
        $updateDadosOng->exeUpdate("tbl_ongs", $dados, "WHERE id =:id", "id=" . $id_ong);
        $reupdateDadosOng = $updateDadosOng->getResultado();


        if ($reupdateDadosOng) {

            $_SESSION['msg'] = "<div class='alert alert-success'>Cadastro atualizado com sucesso !</div>";
            $retorna = ['success' => true, 'msg' => $_SESSION['msg']]; //Retorno do AJAX no JS
          
            
        } else {

            $_SESSION['msg'] = "<div class='alert alert-danger'>ERRO: Não foi possível realizar a edição no cadastro !</div>";
            $retorna = ['success' => false, 'msg' => $_SESSION['msg']]; //Retorno do AJAX no JS   
            
            
        }
    } else {  //SE NÃO TIVER IMAGEM CADASTRADA FAZ UM UPDATE

        unset($dados['imagem']);  //DESTRUO O CAMPO QUE NÃO TEM IMAGEM

        //REALZIALIZO O UPDATE DA NOVA IMAGEM
        include_once('../../classes/Update.php');
        $updateDadosOng = new Update();
        $updateDadosOng->exeUpdate("tbl_ongs", $dados, "WHERE id =:id", "id=" . $id_ong);
        $reupdateDadosOng = $updateDadosOng->getResultado();

        if ($reupdateDadosOng) {

            $_SESSION['msg'] = "<div class='alert alert-success'>Cadastro atualizado com sucesso !</div>";
            $retorna = ['success' => true, 'msg' => $_SESSION['msg']]; //Retorno do AJAX no JS
            
        } else {

            $_SESSION['msg'] = "<div class='alert alert-danger'>ERRO: Não foi possível realizar a edição no cadastro !</div>";
            $retorna = ['success' => false, 'msg' => $_SESSION['msg']]; //Retorno do AJAX no JS   
            
        }
    }

    header('Content-Type: application/json');
    echo json_encode($retorna);
} else {

    header('location:../');
    exit;
}
