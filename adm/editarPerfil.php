<?php
//VERIFICO SE EXISTE SESSÃO
session_start();

if (!key_exists('adm', $_SESSION)) {

    header('location:../');
    die;
}

include('include/cabecalhoAdm.php');

include('include/interfaceAdm.php');


include_once('../classes/Read.php');
$dadosINDEX = new Read();
$dadosINDEX->fullRead("SELECT * FROM tbl_index");
$RedadosINDEX = $dadosINDEX->getResultado();


//<body>
?>


<div class="content p-1">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Editar dados da INDEX</h2>
            </div>
            <div class="p-2">
                <span class="d-none d-md-block">
                    <a href="<?php echo URL . 'adm/dash' ?>" class="btn btn-outline-info btn-sm">Voltar</a>
                </span>
                <div class="dropdown d-block d-md-none">
                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Ações
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                        <a class="dropdown-item" href="<?php echo URL . 'adm/dash' ?>   ">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <span class="EditarPerfilAdm" data-enderecocad="<?php echo URL . 'adm/controller/EditarPerfilAdm'; ?>"></span>
        <form id="editaPerfilAdm" method="POST" enctype="multipart/form-data">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label><span class="text-danger">*</span> Vídeo príncipal (Insira apenas o SRC do IFRAME)</label>
                    <input name="video_principal" type="text" class="form-control" value="<?php echo $RedadosINDEX[0]['video_principal']; ?>" required="" maxlength="200">
                </div>

                <div class="form-group col-md-6">
                    <label><span class="text-danger">*</span> Título missão da ONG</label>
                    <input name="titulo_missao" type="text" class="form-control" value="<?php echo $RedadosINDEX[0]['titulo_missao']; ?>" required="" maxlength="200">
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label><span class="text-danger">*</span> Texto missão da ONG</label>
                    <textarea name="missao" id="editor-um" class="form-control" rows="3"><?php if (isset($RedadosINDEX[0]['missao'])) {
                                                                                                            echo $RedadosINDEX[0]['missao'];
                                                                                                        }
                                                                                                        ?>
                    </textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label><span class="text-danger">*</span> Vídeo secundario (Insira apenas o SRC do IFRAME)</label>
                    <input name="video_sec" type="text" class="form-control" value="<?php echo $RedadosINDEX[0]['video_sec']; ?>" required="" maxlength="200">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label><span class="text-danger">*</span> Texto sobre a ONG lado esquerdo</label>
                    <textarea name="sobre_esquerdo" type="text" id="editor-dois" class="form-control" rows="3"><?php
                                                                                                                if (isset($RedadosINDEX[0]['sobre_esquerdo'])) {
                                                                                                                    echo $RedadosINDEX[0]['sobre_esquerdo'];
                                                                                                                }
                                                                                                                ?>
                    </textarea>
                </div>

            </div>

            <p>
                <span class="text-danger">* </span>Campo obrigatório
            </p>
            <input type="submit" class="btn btn-warning" value="Alterar">
        </form><br>
        <span id="msgEditaPerfilAdm"></span>
    </div>

</div>





<?php
//</body>
include('include/rodapeAdm.php');
?>