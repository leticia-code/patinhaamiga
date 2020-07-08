<?php

if (!key_exists('adm', $_SESSION)) {

    header('location:../');
    die;
}

$primeiro_nome = explode(" ", $_SESSION['adm']['nome']); //PEGANDO PRIMEIRO NOME do nome fantasia



?>

<nav class="navbar navbar-expand navbar-dark bg-primary color-patinha">
    <a class="sidebar-toggle text-light mr-3">
        <span class="navbar-toggler-icon"></span>
    </a>
    <a class="navbar-brand" href="<?php echo URL . 'ong/dash' ?>"><?php echo $primeiro_nome[0]; ?></a>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle menu-header" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                    <img class="rounded-circle" src="<?php echo URL . 'adm/assets/img/logo.png' ?>" width="20" height="20"> &nbsp;<span class="d-none d-sm-inline"><?php echo $primeiro_nome[0]; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="<?php echo URL . 'adm/editarPerfil' ?>"><i class="fas fa-edit"></i> Perfil</a>
                    <a type="button" class="dropdown-item" href="<?php echo URL . 'ong/controller/Sair'; ?>" data-confirm-sair="Tem certeza de que deseja sair do sistema?"><i class="fas fa-sign-out-alt"></i> Sair</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="d-flex">
    <nav class="sidebar">
        <ul class="list-unstyled">
            <li><a href="<?php echo URL . 'adm/dash'; ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="<?php echo URL . 'adm/listarOngs' ?>"> <i class="fas fa-user"></i> ONG's</a></li>
            <li><a href="<?php echo URL . 'adm/editarPerfil' ?>"><i class="fas fa-edit"></i> Edição</a></li>
            <li><a type="button" href="<?php echo URL . 'ong/controller/Sair'; ?>" data-confirm-sair="Tem certeza de que deseja sair do sistema?"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
        </ul>
    </nav>