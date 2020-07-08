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
$BuscaNews = new Read();
$BuscaNews->fullRead("SELECT * FROM tbl_news");
$ResultaBuscaNews = $BuscaNews->getResultado();


//<body>
?>


<div class="content p-1">
    <div class="list-group-item" style="position:unset;">

        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Email's para novidades</h2>
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
        if (empty($ResultaBuscaNews)) {
            echo "<div class='alert alert-warning text-center'>OBS: não foi encontrada nenhuma mensagem !</div>";
        } else {

        ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Cadastrado em</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($ResultaBuscaNews as $msg) {
                            extract($msg);

                            $created = date('d-m-Y H:i', strtotime($created));
                            //echo date('Y-m-d', strtotime($data));

                        ?>
                            <tr>
                                <th><?php echo $id; ?></th>
                                <td><?php echo $news_email; ?></td>
                                <td><?php echo $created; ?></td>
                                <td class="text-center">
                                    <span class="d-none d-md-block">

                                        <a type="button" href="<?php echo URL .  'ong/controller/ApagarEmailNews?id=' . $id; ?>" class="btn btn-outline-danger btn-sm" data-confirm="Tem certeza de que deseja excluir o item selecionado?">Apagar</a>

                                    </span>
                                    <div class="dropdown d-block d-md-none">
                                        <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Ações
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">


                                            <a type="button" href="<?php echo URL .  'ong/controller/ApagarEmailNews?id=' . $id; ?>" class="btn btn-outline-danger btn-sm" data-confirm="Tem certeza de que deseja excluir o item selecionado?">Apagar</a>


                                        </div>
                                    </div>
                                </td>
                            </tr>
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