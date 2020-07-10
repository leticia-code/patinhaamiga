<!-- FIQUE POR DENTRO DIV -->

<div style="padding:3.5rem;  background-color:#191b47" class="container text-center">

    <h3 style="color:white; font-weight:300;">QUER FICAR POR DENTRO DAS NOVAS<br>PATINHAS?</h3>

</div>

<!-- FIQUE POR DENTRO DIV -->
<div style="background-color:white" class="container">
    <div class="float-por-dentro">
        <span class="FiquePorDentro" data-enderecocad="<?php echo URL . 'controller/FiqueDentroMsg'; ?>"></span>
        <form method="POST" id="formNovidades">
            <div class="input-group input-por-dentro">
                <input type="email" class="form-control" name="news_email">
                <div style="border:1px solid white" class="input-group-append">

                    <input type="submit" class="btn btn-persona-reg-2" value="Enviar">

                </div>
            </div>
        </form>

    </div>
</div>

<!-- FIQUE POR DENTRO DIV -->

<!-- FOOTER -->

<div style="padding:3rem;  background-color:white" class="container">
<span id="MsgFiquePorDentro"></span>
    <div class="row">
        <div class="col-sm-5 text-center">

            <div style="justify-content:center;" class="row text-center">
                <a class="a-img-footer" href=""><img class="social-footer-img" src="<?php echo URL . 'assets/img/social/fb_borda.jpg' ?>" alt="FB social" width="65px" height="65px"></a>
                <a class="a-img-footer" href=""><img class="social-footer-img" src="<?php echo URL . 'assets/img/social/insta_borda.jpeg' ?>" alt="FB social" width="65px" height="65px"></a>
                <a class="a-img-footer" href=""><img class="social-footer-img" src="<?php echo URL . 'assets/img/social/twitter_borda.jpeg' ?>" alt="FB social" width="65px" height="65px"></a>
                <a class="a-img-footer" href=""><img class="social-footer-img" src="<?php echo URL . 'assets/img/social/youtube_borda.jpeg' ?>" alt="FB social" width="65px" height="65px"></a>

            </div><br>
            <p>@Copyright 2020 - Patinha Amiga</p>
        </div>


        <div class="col-sm-7 text-center">
            <p style="font-size:1.5rem;">Contate o patinha</p>

            <div class="d-flex">
                <div style="width:33,3%; padding:5px;" class="text-center">
                    <p>Endereço</p>
                    <p>Rua das Esmeraldas, n° 45 <br> Jardim Santa Luzia CEP 13158-520</p>
                </div>

                <div style="width:33,3%; padding:5px;" class="text-center">
                    <p>Telefone</p>
                    <p>(19) 3852-2025</p>
                </div>

                <div style="width:33,3%; padding:5px;" class="text-center">
                    <p>E-mail</p>
                    <p>patinhaamiga@hotmail.com</p>
                </div>


            </div>
        </div>
    </div>

</div>

<!-- FOOTER -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script language="javascript" src="<?php echo URL . 'assets/js/jquery.mask.min.js' ?>"></script>
<script language="javascript" src="<?php echo URL . 'assets/js/script.js' ?>"></script>

</body>

</html>