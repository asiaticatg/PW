<?php 
    include "functions.php"; 
    view($_GET['id']);
    include(HEADER_TEMPLATE); 
?>

<style>
    .btn-primary-custom {
        background-color: #1a1766 !important;
        border-color: #1a1766 !important;
        color: #fff !important;
    }

    .btn-primary-custom:hover {
        background-color: #0f0d42 !important;
        border-color: #0f0d42 !important;
    }

    .btn-outline-primary-custom {
        color: #1a1766 !important;
        border-color: #1a1766 !important;
    }

    .btn-outline-primary-custom:hover {
        background-color: #1a1766 !important;
        color: #fff !important;
    }

    .info-box {
        background: #f8f9ff;
        border-left: 4px solid #1a1766;
        padding: 25px;
        border-radius: 6px;
    }

    dt {
        font-weight: bold;
        color: #1a1766;
    }
</style>

<h2 class="mb-4">Usuário <?php echo $usuario['id']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
    <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible fade show">
        <?php echo $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="info-box shadow-sm">

    <div class="row">

        <!-- Infos -->
        <div class="col-md-8">

            <dl class="dl-horizontal">
                <dt>Nome:</dt>
                <dd><?php echo $usuario['nome']; ?></dd>

                <dt>Login:</dt>
                <dd><?php echo $usuario['user']; ?></dd>

                <dt>Senha:</dt>
                <dd>Confidencial</dd>
            </dl>

        </div>

        <!-- Foto -->
        <div class="col-md-4 text-center">
            <?php $foto = !empty($usuario['foto']) ? $usuario['foto'] : "semimagem.png"; ?>

            <img src="fotos/<?php echo $foto; ?>" 
                 class="img-fluid rounded shadow-sm"
                 style="max-height: 220px; object-fit: cover;">
        </div>

    </div>

</div>

<!-- Botões -->
<div id="actions" class="row mt-4">
    <div class="col-md-12">

        <a href="edit.php?id=<?php echo $usuario['id']; ?>" class="btn btn-primary-custom">
            <i class="fa-solid fa-pencil"></i> Editar
        </a>

        <a href="index.php" class="btn btn-outline-primary-custom">
            <i class="fa-solid fa-rotate-left"></i> Voltar
        </a>

    </div>
</div>

<?php include(FOOTER_TEMPLATE); ?>
