<?php

//VERIFICO SE EXISTE SESSÃO
session_start();

if (!key_exists('ong', $_SESSION)) {

    header('location:../');
    die;
}

include('include/cabecalhoOng.php');
include('include/interfaceOng.php');

$id_ong = $_SESSION['ong']['id'];


//Consultando PETS
include_once('../classes/Read.php');
$Pets = new Read();
$Pets->fullRead("SELECT * FROM tbl_pets 
INNER JOIN tbl_porte ON tbl_pets.id_porte = tbl_porte.id_porte_id
WHERE tbl_pets.id_ong = $id_ong
ORDER BY tbl_pets.id DESC");
$ResultadoPets = $Pets->getResultado();


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
                <h2 class="display-4 titulo">Meus pets</h2>
            </div>
            <div class="p-2">
                <span class="d-none d-md-block">
                    <a href="<?php echo URL . 'ong/dash' ?>" class="btn btn-outline-info btn-sm">Voltar</a>
                </span>
                <div class="dropdown d-block d-md-none">
                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Ações
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                        <a class="dropdown-item" href="<?php echo URL . 'ong/dash' ?>   ">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <div class="mr-auto p-2 text-center">
            <input type="button" class="btn btn-success btn-persona-reg-2" value="Adicionar" data-toggle="modal" data-target="#cadastroPet">
        </div><br><br>

        <?php
        if ($ResultadoPets) {
        ?>
            <div class="container">
                <div class="row">
                    <?php
                    foreach ($ResultadoPets as $pet) {
                        extract($pet);

                    ?>

                        <div class="col-sm-3 col-md-3">
                            <img src="<?php echo URL . 'ong/assets/imagens/img_pet/' . $id . '/' . $imagem  ?>" alt="" class="img-rounded img-responsive" width="250px" height="250px" />
                        </div>
                        <div style="padding-bottom:60px;" class="col-sm-3 col-md-3">
                            <br>
                            <h5>Nome: <?php echo $nome_pet; ?></h5><br>
                            <h5>Sexo: <?php echo $sexo; ?></h5><br>
                            <h5>Porte: <?php echo $nome_porte; ?></h5><br>
                            <a type="button" class="btn btn-success btn-persona-reg-2" href="<?php echo 'editarPerfilPet?id=' . $id ?>">Editar</a>
                            <a type="button" href="<?php echo 'controller/excluirPet?id=' . $id ?>" class="btn btn-danger" data-confirm="Tem certeza de que deseja excluir o item selecionado?">Excluir</a>

                        </div>
                <?php
                    }
                } else {
                    echo "<div class='alert alert-warning text-center'>OBS: não foi encontrado nenhum pet =( !</div>";
                }
                ?>
                </div>
            </div>
    </div>

    <?php
    /* PAGINAÇÃO PARA ARRUMAR
    include_once('../classes/Paginacao.php');
    $paginacao = new Paginacao(URL . 'ong/pets?id=');
    $paginacao->condicao($pageID, $LimiteResultado);
    $paginacao->paginacao("SELECT COUNT(id) AS num_result 
    FROM tbl_pets");
    $resultadoPaginacao = $paginacao->getResultado();
    echo $resultadoPaginacao;
    */
    ?>

</div>

<!--MODAL CADASTRO PET -->
<span class="enderecoCadPet" data-enderecocad="<?php echo URL . 'ong/controller/CadPet'; ?>"></span>
<div class="modal" tabindex="-1" role="dialog" id="cadastroPet">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title">Adicionar Animal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div><br>
            <div class="modal-body">
                <span id="msgCadPet"></span>
                <form id="cadPet" method="POST" enctype="multipart/form-data">
                    <input name="id_ong" type="hidden" value="<?php echo $_SESSION['ong']['id']; ?>"><br>
                    <label><span class="text-danger">*</span> Nome</label>
                    <input name="nome_pet" type="text" class="form-control" placeholder="Nome do bichinho" required=""><br>

                    <label><span class="text-danger">*</span> Sexo</label>
                    <input name="sexo" type="text" class="form-control" placeholder="Sexo do bichinho" required=""><br>

                    <label><span class="text-danger">*</span> Porte (selecione)</label>
                    <select class="form-control" name="id_porte">
                        <?php
                        foreach ($ResultadobuscaPorte as $porte) {
                            extract($porte);
                            echo "<option  value='$id_porte_id' name='porte'>$nome_porte</option>";
                        }
                        ?>
                    </select>
                    <br>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php
                            if (isset($ResultadodadosOng[0]['imagem'])) {
                                $imagem_antiga = URL . 'ong/assets/imagens/img_ong_profile/' . $_SESSION['ong']['id'] . '/' . $ResultadodadosOng[0]['imagem'];
                            } else {
                                $imagem_antiga = URL . 'ong/assets/imagens/preview_pet.png';
                            }
                            ?>
                            <input name="imagem_antiga" type="hidden" value="<?php echo $imagem_antiga; ?>">
                            <label><span class="text-danger">*</span> Foto (150x150)</label><br>
                            <input type="file" name="imagem_nova" onchange="previewImagem()" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <img src="<?php echo $imagem_antiga; ?>" alt="Imagem do usuário" id="preview-user" class="img-thumbnail" style="width: 150px; height: 150px;">
                        </div>
                    </div>
                    <p>
                        <span class="text-danger">* </span>Campo obrigatório
                    </p>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success btn-persona-reg-2" value="Adicionar">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<?php
//</body>
include('include/rodapeOng.php');
?>