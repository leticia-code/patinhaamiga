<?php
include_once('Config.php');
include_once('include/cabecalho.php');

include_once('include/menu.php');


include_once('classes/Read.php');
$buscaOngs = new Read();
$buscaOngs->fullRead("SELECT id, nome_fantasia, telefone, imagem FROM tbl_ongs ORDER BY id DESC");
$ResultabuscaOngs = $buscaOngs->getResultado();

?>
<?php if ($ResultabuscaOngs) {
?>
    <div style="padding:3.5rem; background-color:white;" class="container">
        <div class="row">
            <div style="background-color:white;" class="col-md-6 text-center">
                <img src="<?php echo URL . 'assets/img/icons/procurando.png' ?>" class="img-fluid" alt="Procurando algo">
            </div>

            <div class="col-md-6 text-center">
                <form method="POST" action="" >
                <span class="buscaOng" data-enderecocad="<?php echo URL . 'controller/buscaOng'; ?>"></span>
                    <div class="md-form"><br><br><br><br>
                        <input id="procura_form" name="busca_ong" style="width:70%; margin-left:auto; margin-right:auto;" type="text" class="form-control" placeholder="Digite o nome da ong">                  
                    </div><br><br>
                    <input type="button" class="btn btn-success btn-persona-reg-2" value="Buscar">
                </form>
            </div>
        </div>
        <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <div style="padding:3.5rem;" class="row" id="retornoAjaxBusca">
        <span id="naoEncontrado"></span>
            <?php
            foreach ($ResultabuscaOngs as $ong) {
                extract($ong);

            ?>

                <div class="col-sm-3 col-md-3">
                    <img style="border-radius:50%;" src="<?php
                                                            if ($imagem == null) {

                                                                echo URL . 'ong/assets/imagens/icone_usuario.png';
                                                            } else {
                                                                echo URL . 'ong/assets/imagens/img_ong_profile/' . $id . '/' . $imagem;
                                                            }
                                                            ?>" alt="" class="img-rounded img-responsive" width="180px" width="250px" />
                </div>
                <div style="padding-bottom:60px;" class="col-sm-3 col-md-3">
                    <br>
                    <p class="ong-desc">Nome: <?php echo $nome_fantasia; ?></p><br>
                    <p class="ong-desc">tel: <?php echo $telefone; ?></p><br>
                    <a type="button" class="btn btn-success btn-persona-reg-2" href="<?php echo URL . 'detalhe?id=' . $id ?>">Ver +</a>

                </div>
        <?php
            }
        } else {
            echo "<div style='background-color:white; height: 200px;' class='container'>";
            echo "<div style='margin-bottom: 0;' class='alert alert-warning text-center'>OBS: Ainda não temos nenhuma ong participante =( !</div>";
            echo "</div>";
        }
        ?>

        </div>
    </div>


    <?php
    include_once('include/rodape.php');
    ?>