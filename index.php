<?php
    require_once "config.php"; 
    require_once DBAPI; 
    include(HEADER_TEMPLATE); 
    $db = open_database();
?>

<style>
.btn-custom {
    background-color: #1a1766 !important;
    color: #fff !important;
    border-color: #1a1766 !important;
}
.btn-custom:hover {
    opacity: 0.9;
}
.btn-custom-light {
    background-color: #e5e5ff !important;
    color: #1a1766 !important;
    border-color: #1a1766 !important;
}
.btn-custom-light:hover {
    background-color: #c7c7ff !important;
    color: #1a1766 !important;
}
</style>

<h1>Dashboard</h1>
<hr>

<?php if ($db) : ?>

<!-- CLIENTES -->
<div class="row">
    <?php if (isset($_SESSION["user"])) : ?>
        <div class="col-xs-6 col-sm-3 col-md-2">
            <a href="customers/add.php" class="btn btn-custom">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <i class="fa-solid fa-user-plus fa-5x"></i>
                    </div>
                    <div class="col-xs-12 text-center">
                        <p>Novo Cliente</p>
                    </div>
                </div>
            </a>
        </div>
    <?php endif; ?>

    <div class="col-xs-6 col-sm-3 col-md-2">
        <a href="customers" class="btn btn-custom-light">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa-solid fa-users fa-5x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Clientes</p>
                </div>
            </div>
        </a>
    </div>
</div>

<br>

<!-- MOTOS -->
<div class="row mt-2">
    <?php if (isset($_SESSION["user"])) : ?>
        <div class="col-xs-6 col-sm-3 col-md-2">
            <a href="motos/add.php" class="btn btn-custom">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <i class="fa-solid fa-plus fa-5x"></i>
                    </div>
                    <div class="col-xs-12 text-center">
                        <p>Nova Moto</p>
                    </div>
                </div>
            </a>
        </div>
    <?php endif; ?>

    <div class="col-xs-6 col-sm-3 col-md-2">
        <a href="motos" class="btn btn-custom-light">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa-solid fa-motorcycle fa-5x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Motos</p>
                </div>
            </div>
        </a>
    </div>
</div>

<br>

<!-- USUÁRIOS (somente ADMIN) -->
<?php if (isset($_SESSION["user"]) && $_SESSION["user"] == "admin") : ?>
<div class="row mt-2">
    <div class="col-xs-6 col-sm-3 col-md-2">
        <a href="usuarios/add.php" class="btn btn-custom">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa-solid fa-user-gear fa-5x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Novo Usuário</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xs-6 col-sm-3 col-md-2">
        <a href="usuarios" class="btn btn-custom-light">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa-solid fa-users-gear fa-5x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Usuários</p>
                </div>
            </div>
        </a>
    </div>
</div>
<?php endif; ?>

<?php else : ?>
<div class="alert alert-danger" role="alert">
    <p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
</div>
<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>
