<?php

//VERIFICO SE EXISTE SESSÃO
session_start();

if (!key_exists('ong', $_SESSION)) {

    header('location:../');
    die;
}

include('include/cabecalhoOng.php');
include('include/interfaceOng.php');

$id_pet = $_GET['id'];
$id_ong = $_SESSION['ong']['id'];

include_once('../classes/Read.php');
$dadosPet = new Read();
$dadosPet->fullRead("SELECT * FROM tbl_pets WHERE id = $id_pet");
$ResultadodadosPet = $dadosPet->getResultado();

//Consultando tbl_porte
include_once('../classes/Read.php');
$buscaPorte = new Read();
$buscaPorte->fullRead("SELECT * FROM tbl_porte");
$ResultadobuscaPorte = $buscaPorte->getResultado();

//<body>
?>


<div class="content p-1">

    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Editar Pet</h2>
            </div>
            <div class="p-2">
                <span class="d-none d-md-block">
                    <a href="<?php echo URL . 'ong/pets'  ?>" class="btn btn-outline-info btn-sm">Voltar</a>
                </span>
                <div class="dropdown d-block d-md-none">
                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Ações
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                        <a class="dropdown-item" href="<?php echo URL . 'ong/pets' ?>   ">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <span class="EnderecoEditaPerfilPet" data-enderecocad="<?php echo URL . 'ong/controller/EditarPerfilPet'; ?>"></span>
        <span id="msgEditaPerfilPet"></span>
        <form id="editaPerfilPet" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_pet" value="<?php echo $id_pet; ?>">
            <input type="hidden" name="id_ong" value="<?php echo $id_ong; ?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label><span class="text-danger">*</span> Nome do pet</label>
                    <input name="nome_pet" type="text" class="form-control" value="<?php echo $ResultadodadosPet[0]['nome_pet'];  ?>" required="" maxlength="100">
                </div>
                <div class="form-group col-md-6">
                    <label><span class="text-danger">*</span> Sexo</label>
                    <input name="sexo" type="text" class="form-control" value="<?php echo $ResultadodadosPet[0]['sexo']; ?>" required="" maxlength="30">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label><span class="text-danger">*</span> Porte (selecione)</label>
                    <select class="form-control" name="id_porte">
                        <?php
                        foreach ($ResultadobuscaPorte as $porte) {
                            extract($porte);       
                            $atual = $ResultadodadosPet[0]['id_porte'];

                            ?>
                            <option  value="<?php echo $id_porte_id; ?>" name='porte' <?php if ($atual == $id_porte_id) { ?> selected <?php } ?>><?php echo $nome_porte; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <hr>
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Foto</h2>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <?php
                    if (isset($ResultadodadosPet[0]['imagem'])) {
                        $imagem_antiga = URL . 'ong/assets/imagens/img_pet/' . $ResultadodadosPet[0]['id'] . '/' . $ResultadodadosPet[0]['imagem'];
                    } else {
                        $imagem_antiga = URL . 'ong/assets/imagens/preview_img.png';
                    }
                    ?>
                    <input name="imagem_antiga" type="hidden" value="<?php echo $imagem_antiga; ?>">
                    <label>Foto (150x150)</label><br>
                    <input type="file" name="imagem_nova" onchange="previewImagem()">
                </div>
                <div class="form-group col-md-6">
                    <img src="<?php echo $imagem_antiga; ?>" alt="Imagem do usuário" id="preview-user" class="img-thumbnail" style="width: 150px; height: 150px;">
                </div>
            </div>
            <p>
                <span class="text-danger">* </span>Campo obrigatório
            </p>
            <input type="submit" class="btn btn-warning" value="Alterar">
        </form>




    </div>
</div>







<?php
//</body>
include('include/rodapeOng.php');
?>