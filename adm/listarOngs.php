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
$ListarOng = new Read();
$ListarOng->fullRead("SELECT id,nome_fantasia, nome, telefone, email, endereco, numero, cidade, created FROM tbl_ongs");
$ResultaListarOng = $ListarOng->getResultado();


//<body>
?>


<div class="content p-1">
    <div class="list-group-item" style="position:unset;">

        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">ONG's participantes</h2>
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
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <?php
        if (empty($ResultaListarOng)) {
            echo "<div class='alert alert-warning text-center'>OBS: não foi encontrada nenhuma mensagem !</div>";
        } else {

        ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Nome ONG</th>
                            <th >Contato</th>
                            <th >Telefone</th>
                            <th class="d-none d-sm-table-cell">Email</th>
                            <th class="d-none d-sm-table-cell">Endereço</th>
                            <th class="d-none d-sm-table-cell">Cadastrada em</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($ResultaListarOng as $ong) {
                            extract($ong);
                            $created = date('d-m-Y H:i', strtotime($created));

                        ?>
                            <tr>
                                <td><?php echo $nome_fantasia; ?></td>
                                <td ><?php echo $nome; ?></td>
                                <td ><?php echo $telefone; ?></td>
                                <td class="d-none d-sm-table-cell"><?php echo $email; ?></td>
                                <td class="d-none d-sm-table-cell"><?php echo $endereco .'<br>'. $numero .'<br>'. $cidade; ?></td>
                                <td class="d-none d-sm-table-cell"><?php echo $created; ?></td>
                                <td class="text-center">
                                    <span class="d-none d-md-block">

                                        <a type="button" href="<?php echo URL .  'adm/controller/ApagarOng?id=' . $id; ?>"  class="btn btn-outline-danger btn-sm" data-confirm="Tem certeza de que deseja excluir o item selecionado?">Apagar</a>

                                    </span>
                                    <div class="dropdown d-block d-md-none">
                                        <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Ações
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">

                                            <a type="button" href="<?php echo URL .  'ong/controller/ApagarMsgDoa?id=' . $id; ?>" class="btn btn-outline-danger btn-sm"  data-confirm="Tem certeza de que deseja excluir o item selecionado, todos os pets, doações e adoções relacionadas a esta ONG também será deletada...Deseja continuar?">Apagar</a>


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
include('include/rodapeAdm.php');
?>