<?php

// Verficando se a solicitação de acesso veio do servidor e não da URL
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location:../');
    exit;
}

session_start();

$id_pet = $_GET['id'];
var_dump($id_pet);

if(isset($id_pet)){

    //REALZIALIZO O UPDATE DA NOVA IMAGEM
    include_once('../../classes/Delete.php');
    $DeletePet = new Delete();
    $DeletePet->exeDelete("tbl_pets", "WHERE id =:id", "id=" . $id_pet);
    $reDeletePet = $DeletePet->getResultado();

    if($reDeletePet){

            $_SESSION['msg'] = "<div class='alert alert-success'>Pet deletado com sucesso !</div>";
            header('location:' . URL . 'ong/pets');

    }else {

            $_SESSION['msg'] = "<div class='alert alert-danger'>ERRO: Não foi possível deletar este pet !</div>";
            header('location:' . URL . 'ong/pets');

    }

}else {

    header('location:../');
    exit;

}