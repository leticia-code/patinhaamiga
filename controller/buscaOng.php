<?php

// Verficando se a solicitação de acesso veio do servidor e não da URL
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location:../');
    exit;
}

session_start();


//Recebendo os dados do FORM via POST do ajax
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);



if (isset($dados)) {

    $ValorPesquisa = $dados['palavraPesq'];
    include_once('../classes/Read.php');
    $buscaOng = new Read();
    $buscaOng->fullRead("SELECT id, telefone, imagem, nome_fantasia FROM tbl_ongs WHERE nome_fantasia LIKE '%$ValorPesquisa%'
    ORDER BY id DESC");
    $rebuscaOng = $buscaOng->getResultado();





    if ($rebuscaOng) {

        foreach ($rebuscaOng as $resultado) {
            extract($resultado);
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

      echo "<div class='alert alert-warning'>Desculpe, não foi encontrada nenhuma ONG !</div>";
    }
} else {

    header('location:../');
    exit();
}
