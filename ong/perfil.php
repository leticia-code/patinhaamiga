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
include_once('../classes/Read.php');
$dadosOng = new Read();
$dadosOng->fullRead("SELECT * FROM tbl_ongs WHERE id = $id_ong");
$ResultadodadosOng = $dadosOng->getResultado();


//<body>
?>

<div class="content p-1">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Editar dados</h2>
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
        <span class="EnderecoEditaPerfil" data-enderecocad="<?php echo URL . 'ong/controller/EditarPerfil'; ?>"></span>
        <form id="editaPerfilOng" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_ong" value="<?php echo $_SESSION['ong']['id']; ?>">

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label><span class="text-danger">*</span> Fale um pouco sobre a ONG (será exibido no site)</label>
                    <textarea name="descricao" type="text" id="editor-um" class="form-control" rows="3"><?php if(isset($ResultadodadosOng[0]['descricao'])){ 
                    echo $ResultadodadosOng[0]['descricao'];
                    }
                    ?>
                    </textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-5">
                    <label><span class="text-danger">*</span> Nome Fantasia</label>
                    <input name="nome_fantasia" type="text" class="form-control" id="nome_fantasia" placeholder="Nome completo" value="<?php echo $ResultadodadosOng[0]['nome_fantasia'] ?>" required="" maxlength="100">
                </div>
                <div class="form-group col-md-2">
                    <label>CNPJ</label>
                    <input name="cnpj" type="text" class="form-control" id="cnpj" placeholder="99.999.999/9999-99" value="<?php echo $ResultadodadosOng[0]['cnpj'] ?>" required="">
                </div>
                <div class="form-group col-md-5">
                    <label><span class="text-danger">*</span> E-mail</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="Seu melhor e-mail" value="<?php echo $ResultadodadosOng[0]['email'] ?>" required="" maxlength="100">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label><span class="text-danger">*</span> Endereço</label>
                    <input name="endereco" type="text" class="form-control" id="endereco" placeholder="Rua João..." value="<?php echo $ResultadodadosOng[0]['endereco'] ?>" required="" maxlength="100">
                </div>
                <div class="form-group col-md-2">
                    <label><span class="text-danger">*</span> Número</label>
                    <input name="numero" type="text" class="form-control" id="numero" placeholder="123" value="<?php echo $ResultadodadosOng[0]['numero'] ?>" required="" maxlength="15">
                </div>
                <div class="form-group col-md-4">
                    <label>Complemento</label>
                    <input name="complemento" type="text" class="form-control" id="complemento" placeholder="Sala, Apartamento..." value="<?php echo $ResultadodadosOng[0]['complemento'] ?>" maxlength="100">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label><span class="text-danger">*</span> Estado</label>
                    <input type="text" name="estado" id="estado" class="form-control" placeholder="Estado localizado" value="<?php echo $ResultadodadosOng[0]['estado'] ?>" required="" maxlength="15">
                </div>
                <div class="form-group col-md-5">
                    <label><span class="text-danger">*</span> Cidade</label>
                    <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade localizado" value="<?php echo $ResultadodadosOng[0]['cidade'] ?>" required="" maxlength="100">
                </div>
                <div class="form-group col-md-2">
                    <label><span class="text-danger">*</span> CEP</label>
                    <input name="cep" type="text" class="form-control" id="cep" placeholder="12345-678" value="<?php echo $ResultadodadosOng[0]['cep'] ?>" required="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label><span class="text-danger">*</span> Telefone</label>
                    <input name="telefone" type="text" class="form-control" id="telefone" placeholder="Telefone para contato" value="<?php echo $ResultadodadosOng[0]['telefone'] ?>" required="">
                </div>
                <div class="form-group col-md-6">
                    <label><span class="text-danger">*</span> Nome para contato</label>
                    <input name="nome" type="text" class="form-control" id="nome" placeholder="Nome para contato" value="<?php echo $ResultadodadosOng[0]['nome'] ?>" required="" maxlength="100">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label><span class="text-danger">*</span> Instagram</label>
                    <input name="instagram" type="text" class="form-control" id="instagram" placeholder="instagram.com/perfildasuaong" value="<?php echo $ResultadodadosOng[0]['instagram'] ?>" required="">
                </div>
                <div class="form-group col-md-6">
                    <label><span class="text-danger">*</span> Facebook</label>
                    <input name="facebook" type="text" class="form-control" id="facebook" placeholder="facebook.com/perfildasuaong.php?id=100022058325344" value="<?php echo $ResultadodadosOng[0]['facebook'] ?>" required="">
                </div>
            </div>
            <hr>
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Editar dados dos indicadores</h2>
                <span>De 0 a 100%, sendo 0 muito mal e 100% muito bom, coloque em que nível se encontra os indicadores da sua ONG!</span><br>
                <span>Exemplo: 35% - 65% - 100%</span>
            </div><br>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label><span class="text-danger">*</span> Alimentação</label>
                    <input name="alimentacao" type="text" class="form-control" placeholder="Necessidade de alimentação" value="<?php echo $ResultadodadosOng[0]['alimentacao'] ?>" required="" maxlength="4">
                </div>
                <div class="form-group col-md-2">
                    <label><span class="text-danger">*</span> Medicação</label>
                    <input name="medicacao" type="text" class="form-control" placeholder="Necessidade de medicação" value="<?php echo $ResultadodadosOng[0]['medicacao'] ?>" required="" maxlength="4">
                </div>
                <div class="form-group col-md-4">
                    <label><span class="text-danger">*</span> Higiene</label>
                    <input name="higiene" type="text" class="form-control" placeholder="Necessidade de Higiene" value="<?php echo $ResultadodadosOng[0]['higiene'] ?>" required="" maxlength="4">
                </div>

            </div>
            <hr>
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Editar dados bancários para doação</h2>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label><span class="text-danger">*</span> Razão social</label>
                    <input name="razao_social" type="text" class="form-control" id="" placeholder="Noma da razão social da ong" value="<?php echo $ResultadodadosOng[0]['razao_social'] ?>" required="" maxlength="100">
                </div>
                <div class="form-group col-md-6">
                    <label><span class="text-danger">*</span> Banco</label>
                    <input name="banco" type="text" class="form-control" id="" placeholder="Nome do banco Ex. Banco do Brasil, Bradesco...." value="<?php echo $ResultadodadosOng[0]['banco'] ?>" required="" maxlength="50">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label><span class="text-danger">*</span> Agência</label>
                    <input name="agencia" type="text" class="form-control" id="agencia" placeholder="Número da agência" value="<?php echo $ResultadodadosOng[0]['agencia'] ?>" required="">
                </div>
                <div class="form-group col-md-6">
                    <label><span class="text-danger">*</span> Conta (Sem traço e pontos)</label>
                    <input name="conta" type="text" class="form-control" id="" placeholder="Número da conta" value="<?php echo $ResultadodadosOng[0]['conta'] ?>" required="" maxlength="20">
                </div>
            </div>
            <hr>
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Selecione uma foto para o perfil da sua ONG</h2>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <?php
                    if (isset($ResultadodadosOng[0]['imagem'])) {
                        $imagem_antiga = URL . 'ong/assets/imagens/img_ong_profile/' . $_SESSION['ong']['id'] . '/' . $ResultadodadosOng[0]['imagem'];
                    } else {
                        $imagem_antiga = URL . 'ong/assets/imagens/preview_img.png';
                    }
                    ?>
                    <input name="imagem_antiga" type="hidden" value="<?php echo $imagem_antiga; ?>">
                    <label><span class="text-danger">*</span> Foto (150x150)</label><br>
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
        </form><br>
        <span id="msgEditaPerfil"></span>
    </div>

</div>


<?php
//</body>
include('include/rodapeOng.php');
?>