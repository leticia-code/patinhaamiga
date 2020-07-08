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
$BuscaMSG = new Read();
$BuscaMSG->fullRead("SELECT * FROM tbl_adocoes WHERE id_ong = $id_ong");
$ResultadoBuscaMSG = $BuscaMSG->getResultado();


//<body>
?>


<div class="content p-1">
    <div class="list-group-item" style="position:unset;">

        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Mensagens para adoção</h2>
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
        <?php
        if (empty($ResultadoBuscaMSG)) {
            echo "<div class='alert alert-warning text-center'>OBS: não foi encontrada nenhuma mensagem !</div>";
        } else {

        ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th class="d-none d-sm-table-cell">E-mail</th>
                            <th class="d-none d-sm-table-cell">Telefone</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($ResultadoBuscaMSG as $msg) {
                            extract($msg);
                            $created = date('d-m-Y H:i', strtotime($created));
                        ?>
                            <tr>
                                <th><?php echo $id; ?></th>
                                <td><?php echo $cliente_nome; ?></td>
                                <td class="d-none d-sm-table-cell"><?php echo $cliente_email; ?></td>
                                <td class="d-none d-sm-table-cell"><?php echo $cliente_telefone; ?></td>
                                <td class="text-center">
                                    <span class="d-none d-md-block">

                                        <a type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="<?php echo '#VisuMsg' . $id; ?>">Visualizar</a>
                                        <a type="button" href="<?php echo URL .  'ong/controller/ApagarMsgAd?id=' . $id; ?>"  class="btn btn-outline-danger btn-sm" data-confirm="Tem certeza de que deseja excluir o item selecionado?">Apagar</a>

                                    </span>
                                    <div class="dropdown d-block d-md-none">
                                        <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Ações
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">

                                            <a type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="<?php echo '#VisuMsg' . $id; ?>">Visualizar</a>
                                            <a type="button" href="<?php echo URL .  'ong/controller/ApagarMsgAd?id=' . $id; ?>" class="btn btn-outline-danger btn-sm"  data-confirm="Tem certeza de que deseja excluir o item selecionado?">Apagar</a>


                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!--MODAL VISUALIZAR MENSAGEM-->
                            <div class="modal" tabindex="-1" role="dialog" id="<?php echo 'VisuMsg' . $id; ?>">
                                <div class="modal-dialog text-center" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detalhes da mensagem</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Nome:</h5>
                                            <p><?php echo $cliente_nome; ?></p>
                                            <hr>
                                            <h5>Nome do pet:</h5>
                                            <p><?php echo $nome_pet; ?></p>
                                            <hr>
                                            <h5>Mensagem:</h5>
                                            <p><?php echo $cliente_mensagem; ?></p>
                                            <hr>
                                            <h5>Enviado em:</h5>
                                            <p><?php echo $created; ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php
        }
        ?>
    </div>
</div>


<?php
//</body>
include('include/rodapeOng.php');
?>