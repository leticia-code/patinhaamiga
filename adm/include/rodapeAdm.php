<!-- FOOTER -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script language="javascript" src="<?php echo URL . 'assets/js/jquery.mask.min.js' ?>"></script>
<script src="<?php echo URL . 'ong/assets/js/dashboard.js' ?>"></script>
<script src="<?php echo URL . 'adm/assets/js/scriptAdm.js' ?>"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script><!-- LINK para CKeditor -->

<!-- Script's para ativar o CKeditor nos textareas -->
<script>
    ClassicEditor
        .create(document.querySelector('#editor-um'))

        .catch(error => {
            console.error(error);
        });


    ClassicEditor
        .create(document.querySelector('#editor-dois'))

        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#editor-tres'))

        .catch(error => {
            console.error(error);
        });
</script>


</body>

</html>