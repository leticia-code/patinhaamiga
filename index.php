<?php

include_once('classes/Config.php');

include_once('include/cabecalho.php');

include_once('include/menu.php');

include_once('classes/ReadIndex.php');

$buscaIMG = new ReadIndex();
$buscaIMG->fullRead("SELECT id, nome_fantasia, imagem FROM tbl_ongs");
$rebuscaIMG = $buscaIMG->getResultado();

$dadosINDEX = new ReadIndex();
$dadosINDEX->fullRead("SELECT * FROM tbl_index");
$redadosINDEX = $dadosINDEX->getResultado();


?>


<!-- VIDEO DIV -->
<div class="container">

    <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" src="<?php echo $redadosINDEX[0]['video_principal'] ?>" allowfullscreen></iframe>  
    </div>

</div>
<!-- VIDEO DIV -->

<!-- INTRO DIV -->
<div style="background-color:white;" class="text-center container">

    <h3 style="color: black; padding:2.5rem;"><?php echo $redadosINDEX[0]['titulo_missao'] ?></h3>

    <div class="row row-justify"> 
    <p><?php echo $redadosINDEX[0]['missao'] ?></p>
    </div>


    <div style="padding:3rem;" class="row ">
        <div class="card text-center card-persona col-sm-4">

            <div class="card-body">
                <h5 class="card-title"><img src="<?php echo URL . 'assets/img/icons/conforto.png' ?>" alt="Conforto"></h5>
                <p class="card-text"><strong>CONFORTO</strong></p>
            </div>

        </div>

        <div class="card text-center card-persona col-sm-4">

            <div class="card-body">
                <h5 class="card-title"><img src="<?php echo URL . 'assets/img/icons/amor.png' ?>" alt="Amor e carinho"></h5>
                <p class="card-text"><strong>AMOR E CARINHO</strong></p>
            </div>

        </div>

        <div class="card text-center card-persona col-sm-4">

            <div class="card-body">
                <h5 class="card-title"><img src="<?php echo URL . 'assets/img/icons/lar.png' ?>" alt="Lar"></h5>
                <p class="card-text"><strong>LAR</strong></p>
            </div>

        </div>
    </div>



</div>


<!-- INTRO DIV -->

<!-- PARCEIROS DIV -->
<div style="padding:3.5rem;" class="container parceiros-color">

    <div class="row">

        <div class="col-sm-6 text-center">


            <h3>NOSSAS PARCERIAS</h3><br><br>
            <p style="font-size:1.3rem;">Veja as ONG's que fazem parte deste<br>trabalho incrível!</p><br><br>

            <a class="btn btn-success btn-persona-reg btn-lg" type="button" href="ongs">Conhecer</a>


        </div> 
        <div class="col-sm-1">

        </div>

        <!-- CARROUEL -->
        <?php
        if (empty($rebuscaIMG)) {
        ?>
            <div id="carouselExampleIndicators" class="carousel slide col-sm-4" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">



                    <div class="carousel-item active">
                        <img class="d-block w-100" src="<?php echo URL . 'assets/img/carousel/con_animal.jpg' ?>" alt="First slide" height="280px">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?php echo URL . 'assets/img/carousel/ong_animal.jpeg' ?>" alt="Second slide" height="280px">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?php echo URL . 'assets/img/carousel/ong_auqmia.jpg' ?>" alt="Third slide" height="280px">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?php echo URL . 'assets/img/carousel/ong_cao.jpeg' ?>" alt="four slide" height="280px">
                    </div>





                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>


        <?php


        } else {

        ?>
            <div id="carouselExampleIndicators" class="carousel slide col-sm-4" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php
                    $cont_macador = 0;
                    foreach ($rebuscaIMG as $imgCar) {
                        echo "<li data-target='#carouselExampleIndicators' data-slide-to='$cont_macador'></li>";
                        $cont_macador++;
                    }
                    ?>
                </ol>


                <div class="carousel-inner">


                    <?php
                    $cont_slide = 0;
                    foreach ($rebuscaIMG as $imgCar) {
                        extract($imgCar);
                    ?>
                        <div class="carousel-item <?php if ($cont_slide == 0) {
                                                        echo 'active';
                                                    } ?>">
                            <img class="d-block w-100" src="<?php if (!empty($imagem)) {



                                                                echo URL . 'ong/assets/imagens/img_ong_profile/' . $id . '/' . $imagem;
                                                            } else {
                                                                echo URL . 'ong/assets/imagens/icone_usuario.png';
                                                            }
                                                            ?>" alt="<?php echo $nome_fantasia; ?>" height="280px">
                        </div>
                    <?php
                        $cont_slide++;
                    }
                    ?>





                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            <?php


        }
            ?>


            <!-- CARROUEL -->

            <div class="col-sm-1">

            </div>

            </div>

    </div>
</div>

<!-- PARCEIROS DIV -->

<!--
ENTRAR/REGISTRAR DIV 

<div style="padding:3.5rem; background-color:#f2f7f2;" class="container">

    <div class="row">

        <div class="col-sm-6 text-center">

            <h5>PRONTO PARA CONHECER SEU NOVO<br>MELHOR AMIGO?</h5>

        </div>

        <div class="col-sm-6 text-center">

            <a style="margin-right:0.3rem;" class="btn btn-success btn-persona-log" type="button" href="#">ENTRAR</a>
            <a style="margin-left:0.3rem;" class="btn btn-success btn-persona-reg-2" type="button" href="#">REGISTRE-SE</a>

        </div>

    </div>

</div>

ENTRAR/REGISTRAR DIV 
        -->

<!-- EXPLICATIVO DIV -->

<div style="padding:3.5rem;  background-color:white" class="container">

    <div class="row">

        <div class="col-sm-6 text-center"><br><br>


            <h5>GOSTARIA DE SABER COMO NOS AJUDAR?</h5><br><br>

            <p style="font-size:1.3rem;">Assista o vídeo ao lado e entenda como são feitas as doações.</p><br>


        </div>

        <div class="col-sm-6 text-center">

            <div class="embed-responsive embed-responsive-widht embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="<?php echo $redadosINDEX[0]['video_sec'] ?>" allowfullscreen></iframe>
            </div>
        </div>

    </div>

</div>
<!-- EXPLICATIVO DIV -->




<?php
include_once('include/rodape.php');
?>