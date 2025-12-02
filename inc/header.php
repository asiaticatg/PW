<?php 
if (!isset($_SESSION)) session_start(); 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Casa das Motos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/awesome/all.min.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap/bootstrap.min.css">        
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/style.css">

    <style>
        .navbar-brand, .nav-link {
          color: #ffffffff;
        }

        .navbar-brand:hover, .nav-link:hover {
          color: #ffffffd6;
        }

        .btn-light {
          background-color: #afafafff;
          color: #ffffffff;
          border-color: #afafafff;
        }

        .btn-light:hover {
          background-color: #636363ff;
          color: #ffffffff;
          border-color: #afafafff;
        }

        /* NAVBAR AZUL */
        .navbar-custom {
            background-color: #1a1766 !important;
        }
    </style>

</head>

<body>

<nav class="navbar navbar-expand-md navbar-custom fixed-top" data-bs-theme="dark">
    <div class="container">

        <a class="navbar-brand" href="<?php echo BASEURL; ?>">
            <i class="fa-solid fa-house-chimney"></i> Casa das Motos
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-users"></i> Clientes
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo BASEURL; ?>customers">
                            <i class="fa-solid fa-users"></i> Gerenciar Clientes
                        </a></li>

                        <?php if (isset($_SESSION["user"])) : ?>
                            <li><a class="dropdown-item" href="<?php echo BASEURL; ?>customers/add.php">
                                <i class="fa-solid fa-user-plus"></i> Novo Cliente
                            </a></li>
                        <?php endif; ?>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-motorcycle"></i> Motos
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo BASEURL; ?>motos">
                            <i class="fa-solid fa-motorcycle"></i> Gerenciar Motos
                        </a></li>

                        <?php if (isset($_SESSION["user"])) : ?>
                            <li><a class="dropdown-item" href="<?php echo BASEURL; ?>motos/add.php">
                                <i class="fa-solid fa-plus"></i> Nova Moto
                            </a></li>
                        <?php endif; ?>
                    </ul>
                </li>

                <?php if (isset($_SESSION["role"]) && $_SESSION["role"] === "admin") : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-users-gear"></i> Usuários
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo BASEURL; ?>usuarios">
                                <i class="fa-solid fa-users-gear"></i> Gerenciar Usuários
                            </a></li>

                            <?php if (isset($_SESSION["user"])) : ?>
                                <li><a class="dropdown-item" href="<?php echo BASEURL; ?>usuarios/add.php">
                                    <i class="fa-solid fa-user-plus"></i> Novo Usuário
                                </a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

            </ul>

            <ul class="navbar-nav">
                <?php if (isset($_SESSION["user"])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASEURL; ?>inc/logout.php">
                            Bem vindo, <?php echo $_SESSION["user"]; ?>!
                            <i class="fa-solid fa-person-walking-arrow-right"></i> Sair
                        </a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASEURL; ?>inc/login.php">
                            <i class="fa-solid fa-user"></i> Login
                        </a>
                    </li>
                <?php endif; ?>

            </ul>

        </div>
    </div>
</nav>

<main class="container mt-5 pt-4">
