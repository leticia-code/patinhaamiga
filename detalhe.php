<?php

session_start();

include_once('Config.php');

include_once('include/cabecalho.php');

include_once('include/menu.php');

include_once('classes/Read.php');

$id_ong = $_GET['id'];

//BUSCANDO ID DA ONG PARA VER SE É IGUAL O QUE VEM NA URL
$buscaID = new Read();
$buscaID->fullRead("SELECT * FROM tbl_ongs WHERE id = $id_ong");
$ResultabuscaID = $buscaID->getResultado();

//BUSCANDO DADOS PARA INFORMAÇÕES DA PAGINA
$buscaPetsOng = new Read();
$buscaPetsOng->fullRead("SELECT pet.*, pet.imagem img, 
tbl_ongs.descricao, tbl_ongs.endereco, tbl_ongs.cidade, tbl_ongs.estado, tbl_ongs.telefone, tbl_ongs.instagram, tbl_ongs.facebook, tbl_ongs.numero, tbl_ongs.cnpj, tbl_ongs.banco, tbl_ongs.agencia, tbl_ongs.conta, tbl_ongs.razao_social,
tbl_ongs.imagem, tbl_porte.nome_porte 
FROM tbl_pets pet
INNER JOIN tbl_ongs ON pet.id_ong = tbl_ongs.id 
INNER JOIN tbl_porte ON tbl_porte.id_porte_id = pet.id_porte
WHERE pet.id_ong = $id_ong
");
$ResultabuscaPetsOng = $buscaPetsOng->getResultado();


if ($id_ong == $ResultabuscaID[0]['id']) { //VERIFICANDO SE O ID VINDO NA URL EXISTE



    //BUSCAR IMAGEM, E INDICADOES DA ONG
    $buscaImgOng = new Read();
    $buscaImgOng->fullRead("SELECT imagem, alimentacao, medicacao, higiene  FROM tbl_ongs WHERE id = $id_ong");
    $resultaImgOng = $buscaImgOng->getResultado();


?>
    <!--DIV SOBRE A ONG-->
    <div style="padding:3.5rem; background-color:white;" class="container">

        <div class="row">
            <div style="background-color:white; margin-top:5%;" class="col-md-4 text-center">
                <img style="border-radius:50%;" src="<?php
                                                        if (empty($resultaImgOng[0]['imagem'])) {

                                                            echo URL . 'ong/assets/imagens/icone_usuario.png';
                                                        } else {
                                                            echo URL . 'ong/assets/imagens/img_ong_profile/' . $id_ong . '/' . $resultaImgOng[0]['imagem'];
                                                        }
                                                        ?>" class="img-fluid" alt="Foto ong" width="220px" width="250px">
            </div>

            <div style="background-color:white;" class="col-md-8 text-center">
                <p class="p-sobre-ong">Um pouquinho da <br>nossa história</p>
                <div class="row row-justify-ong">
                    <?php if ($ResultabuscaID[0]['descricao'] == null) {

                        echo "Sem descrição no momento";
                    } else {
                        echo $ResultabuscaID[0]['descricao'];
                    }

                    ?>
                </div>
                <div style="justify-content: center;" class="row">
                    <p class="p-img-social">
                        <img src="<?php echo URL . 'assets/img/icons/insta.png' ?>" class="img-fluid" alt="Insta" width="35px" width="35px">
                        @<?php
                            if ($ResultabuscaID[0]['instagram'] == null) {

                                echo "Instagram indefinido";
                            } else {
                                echo $ResultabuscaID[0]['instagram'];
                            }
                            ?></p>
                    <p class="p-img-social">
                        <img src="<?php echo URL . 'assets/img/icons/face.png' ?>" class="img-fluid" alt="Insta" width="35px" width="35px">
                        @<?php
                            if ($ResultabuscaID[0]['facebook'] == null) {

                                echo "Facebook indefinido";
                            } else {
                                echo $ResultabuscaID[0]['facebook'];
                            }
                            ?></p>

                </div><br>

                <div style="justify-content: center;" class="row">
                    <p class="p-img-social">
                        <img src="<?php echo URL . 'assets/img/icons/tel.png' ?>" class="img-fluid" alt="Insta" width="35px" width="35px">
                        <?php
                        if ($ResultabuscaID[0]['telefone'] == null) {

                            echo "Telefone indefinido";
                        } else {
                            echo $ResultabuscaID[0]['telefone'];
                        }
                        ?></p>
                    <p class="p-img-social">
                        <img src="<?php echo URL . 'assets/img/icons/loca.png' ?>" class="img-fluid" alt="Insta" width="35px" width="35px">
                        <?php
                        if ($ResultabuscaID[0]['endereco'] == null) {
                            echo "Sem endereço definido";
                        } else {
                            echo $ResultabuscaID[0]['endereco'] . ', ' . $ResultabuscaID[0]['numero'] .  $ResultabuscaID[0]['cidade'] . '/' . $ResultabuscaID[0]['estado'];
                        }
                        ?></p>

                </div>

            </div>

        </div>

    </div>
    <!--DIV SOBRE A ONG-->


    <!--DIV INDICADORES-->
    <div style="padding:2rem;" class="container parceiros-color" id="indicador">
        <div class="row row-progres">
            <h3 style="padding:10px; margin-bottom:30px;">Nossos indicadores</h3>
        </div>
        <div class="row row-progres">
            <p>Alimentação</p>
            <div class="progress progress-estilo">

                <div class="progress-bar" role="progressbar" style="width: <?php if (empty($resultaImgOng)) {
                                                                                echo "0%";
                                                                            } else {
                                                                                echo $resultaImgOng[0]['alimentacao'];
                                                                            }

                                                                            ?>;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php if (empty($resultaImgOng)) {
                                                                                                                                                echo "0%";
                                                                                                                                            } else {
                                                                                                                                                echo $resultaImgOng[0]['alimentacao'];
                                                                                                                                            }

                                                                                                                                            ?></div>
            </div>
        </div>

        <div class="row row-progres">
            <p>Medicação</p>
            <div class="progress progress-estilo">

                <div class="progress-bar" role="progressbar" style="width: <?php if (empty($resultaImgOng)) {
                                                                                echo "0%";
                                                                            } else {
                                                                                echo $resultaImgOng[0]['medicacao'];
                                                                            }

                                                                            ?>;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php if (empty($resultaImgOng)) {
                                                                                                                                                echo "0%";
                                                                                                                                            } else {
                                                                                                                                                echo $resultaImgOng[0]['medicacao'];
                                                                                                                                            }

                                                                                                                                            ?></div>
            </div>
        </div>

        <div class="row row-progres">
            <p>Higiene</p>
            <div class="progress progress-estilo">

                <div class="progress-bar" role="progressbar" style="width: <?php if (empty($resultaImgOng)) {
                                                                                echo "0%";
                                                                            } else {
                                                                                echo $resultaImgOng[0]['higiene'];
                                                                            }

                                                                            ?>;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php if (empty($resultaImgOng)) {
                                                                                                                                                echo "0%";
                                                                                                                                            } else {
                                                                                                                                                echo $resultaImgOng[0]['higiene'];
                                                                                                                                            }

                                                                                                                                            ?></div>
            </div>
        </div>

        <div style="justify-content:center;" class="row">
            <a class="a-ajudar" data-toggle="modal" data-target="#AjudarOng">Quer ajudar-nos? Confira as opções</a>
        </div>
    </div>
    <!--DIV INDICADORES-->

    <!--DIV PETS-->
    <div style="padding:3.5rem; background-color:white;" class="container">
        <div style="justify-content:center;" class="row">

            <h4>Eles estão esperando por você</h4>
        </div>

        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        if ($ResultabuscaPetsOng) {
        ?>

            <div style="padding:80px;" class="row">
                <?php
                foreach ($ResultabuscaPetsOng as $pet) {
                    extract($pet);

                ?>
                    <div class="col-sm-3 col-md-3">
                        <img src="<?php echo URL . 'ong/assets/imagens/img_pet/' . $id . '/' . $img  ?>" alt="" class="img-rounded img-responsive" width="200px" height="200px" />
                    </div>
                    <div style="padding-bottom:60px;" class="col-sm-3 col-md-3">

                        <h5>Nome: <?php echo $nome_pet; ?></h5><br>
                        <h5>Sexo: <?php echo $sexo; ?></h5><br>
                        <h5>Porte: <?php echo $nome_porte; ?></h5><br>
                        <a type="button" class="btn btn-success btn-persona-reg-2" data-toggle="modal" data-target="<?php echo '#adotarModal' . $id ?>">Adote</a>


                    </div>



                    <!--MODAL ADOTAR -->
                    <div class="modal" tabindex="-1" role="dialog" id="<?php echo 'adotarModal' . $id ?>">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header ">
                                    <h5 class="modal-title">Informações do bichinho</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div><br>


                                <div style="justify-content:center; padding:10px;" class="row">
                                    <div class="col-sm-5 col-md-5">
                                        <img src="<?php echo URL . 'ong/assets/imagens/img_pet/' . $id . '/' . $img  ?>" alt="" class="img-rounded img-responsive" width="230px" height="150px" />
                                    </div>
                                    <div class="col-sm-5 col-md-5">

                                        <h5>Nome: <?php echo $nome_pet; ?></h5><br>
                                        <h5>Sexo: <?php echo $sexo; ?></h5><br>
                                        <h5>Porte: <?php echo $nome_porte; ?></h5><br>


                                    </div>
                                </div>
                                <div style="text-align:center;" class="container">
                                    <p class="p-adotar">Você irá me adotar?Ebaaa! Mais antes, preencha seus<br>dados abaixo para que a ONG possa entrar em contato com você.</p>
                                </div>


                                <div class="modal-body">
                                    <form method="POST" action="<?php echo URL . 'controller/adotar' ?>">
                                        <input type="hidden" name="id_ong" value="<?php echo $id_ong ?>">
                                        <input type="hidden" name="id_pet" value="<?php echo $id ?>">
                                        <input type="hidden" name="nome_pet" value="<?php echo $nome_pet ?>">

                                        <div class="form-group">
                                            <label>Seu nome:</label>
                                            <input type="text" name="cliente_nome" class="form-control input-border" placeholder="Digite o seu nome" maxlength="100" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Seu E-mail:</label>
                                            <input type="email" name="cliente_email" class="form-control input-border" placeholder="Digite o seu melhor Email" maxlength="100" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Seu telefone:</label>
                                            <input type="text" name="cliente_telefone" class="form-control input-border telefone_adote" placeholder="Digite um telefone para contato" maxlength="20" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Mensagem:</label>
                                            <input type="text" name="cliente_mensagem" class="form-control input-border" style="height:100px;" placeholder="Digite uma mensagem" maxlength="500" required="">
                                        </div>
                                        <div style="justify-content:center;" class="modal-footer text-center">
                                            <input name="adotar" type="submit" class="btn btn-persona-reg-2 input-border" value="Enviar" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php
                }
            } else {
                echo "<br><br>";
                echo "<div class='alert alert-warning text-center'>OBS: não foi encontrado nenhum pet =( !</div>";
            }
            ?>
            </div>



    </div>
    <!--DIV PETS-->

    <!--MODAL AJUDAR ONG-->
    <div class="modal" tabindex="-1" role="dialog" id="AjudarOng">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title">Quer nos ajudar? Saiba como abaixo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div><br>


                <div style="justify-content:center; padding:10px;" class="row">

                    <img src="<?php
                                if (empty($resultaImgOng[0]['imagem'])) {

                                    echo URL . 'ong/assets/imagens/icone_usuario.png';
                                } else {
                                    echo URL . 'ong/assets/imagens/img_ong_profile/' . $id_ong . '/' . $resultaImgOng[0]['imagem'];
                                }
                                ?>" alt="Logo" class=" img-rounded img-responsive" width="250px " height="150px" />

                </div>
                <div style="text-align:center;" class="container">
                    <p class="p-doacao">Quer ajudar a mudar o mundo junto com a gente?<br>Você pode fazer isso de várias formas:<br>1. Doando Alimento,<br>2. Doando medicamentos,<br>3. Doando itens de higiene,<br>4. Doações em dinheiro.</p>
                    <p>Abaixo, segue como pode realizar as doações</p>
                    <hr>
                </div>


                <div class="modal-body">
                    <span class="doacaoOngEndereco" data-enderecocad="<?php echo URL . 'ong/controller/NovaDoacao'; ?>"></span>
                    <form method="POST" id="doacaoOng">
                        <input type="hidden" name="id_ong" value="<?php echo $id_ong ?>">

                        <div class="form-check">
                            <input class="form-check-input position-static" name="doa_alimento" type="checkbox" value="doa_alimento" aria-label="...">
                            <label class="form-check-label">Irei ajudar com alimento</label>
                            <br><br>
                            <input class="form-check-input position-static" name="doa_medicamento" type="checkbox" value="doa_medicamento" aria-label="...">
                            <label class="form-check-label">Irei ajudar com Medicamentos</label>
                            <br><br>
                            <input class="form-check-input position-static" name="doa_higiene" type="checkbox" value="doa_higiene" aria-label="...">
                            <label class="form-check-label">Irei ajudar com itens de higiene</label>
                            <br><br>
                            <p>(Você pode ajudar com mais de um item se possível)</p>
                        </div>
                        <hr>
                        <div class="row">
                            <p>Ajudando com os itens acima, será necessário enviar os itens para o endereço da ONG abaixo:</p><br>
                            <div class="container">
                                <p>
                                    <?php
                                    if ($ResultabuscaID[0]['endereco'] == null) {
                                        echo "<strong>Sem endereço definido</strong>";
                                    } else {
                                        echo $ResultabuscaID[0]['endereco'] . ', N ' . $ResultabuscaID[0]['numero'] . '<br>' . $ResultabuscaID[0]['cidade'] . '/' . $ResultabuscaID[0]['estado'];
                                    } ?></p>
                            </div>

                        </div>
                        <hr>
                        <div style="text-align:center;" class="container">
                            <p>Ajudar com doação em dinheiro<br>Para doações em dinheiro, abaixo contem a conta da ONG para depósito ou transferências<br>Assim que recebermos sua doação, entraremos em contato para agradecer.</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="p-doacao-conta">CNPJ</p>
                                    <p>
                                        <?php
                                        if ($ResultabuscaID[0]['cnpj'] == null) {
                                            echo "Sem CNPJ definido";
                                        } else {
                                            echo $ResultabuscaID[0]['cnpj'];
                                        } ?></p>
                                    <p class="p-doacao-conta">RAZÃO SOCIAL</p>
                                    <p>
                                        <?php
                                        if ($ResultabuscaID[0]['razao_social'] == null) {
                                            echo "Sem Razão social definido";
                                        } else {
                                            echo $ResultabuscaID[0]['razao_social'];
                                        } ?></p>
                                </div>
                                <div class="col-md-6">

                                    <p class="p-doacao-conta">CONTA CORRENTE</p>
                                    <p>
                                        <?php
                                        if ($ResultabuscaID[0]['conta'] == null) {
                                            echo "Sem CNPJ definido";
                                        } else {
                                            echo $ResultabuscaID[0]['conta'];
                                        } ?></p>
                                    <p class="p-doacao-conta">AGÊNCIA</p>
                                    <p>
                                        <?php
                                        if ($ResultabuscaID[0]['agencia'] == null) {
                                            echo "Sem CNPJ definido";
                                        } else {
                                            echo $ResultabuscaID[0]['agencia'];
                                        } ?></p>
                                </div>
                            </div>
                            <p class="p-doacao-conta">BANCO</p>
                            <p>
                                <?php
                                if ($ResultabuscaID[0]['banco'] == null) {
                                    echo "Sem CNPJ definido";
                                } else {
                                    echo $ResultabuscaID[0]['banco'];
                                } ?></p>


                        </div>
                        <hr>
                        <div style="text-align:center;" class="container">
                            <p>Deixe alguns dados para podermos te identificar.</p>
                        </div>

                        <div class="form-group">
                            <label>Seu nome:</label>
                            <input type="text" name="doa_nome" class="form-control input-border" placeholder="Digite o seu nome" maxlength="100" required="">
                        </div>
                        <div class="form-group">
                            <label>Seu E-mail:</label>
                            <input type="email" name="doa_email" class="form-control input-border" placeholder="Digite o seu melhor Email" maxlength="100" required="">
                        </div>
                        <div class="form-group">
                            <label>Seu telefone:</label>
                            <input type="text" name="doa_telefone" class="form-control input-border telefone_adote" placeholder="Digite um telefone para contato" maxlength="20" required="">
                        </div>
                        <div class="form-group">
                            <label>Mensagem:</label>
                            <input type="text" name="doa_mensagem" class="form-control input-border" style="height:100px;" placeholder="Digite uma mensagem" maxlength="500">
                        </div>
                        <span id="msgDoacaoOng"></span>
                        <div style="justify-content:center;" class="modal-footer text-center">
                            <input name="doar" type="submit" class="btn btn-persona-reg-2 input-border" value="Doar" />
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>


<?php
} else {

    header('location:' . URL);
    exit();
}
include_once('include/rodape.php');
?>