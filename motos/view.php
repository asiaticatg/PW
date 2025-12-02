<?php 
    include "functions.php"; 
    view($_GET['id']);
    include(HEADER_TEMPLATE); 
?>

<style>
    :root {
        --azul: #1a1766;
    }

    h2, h5, dt {
        color: var(--azul) !important;
        font-weight: 600;
    }

    .view-card {
        border-left: 4px solid var(--azul) !important;
    }

    dd {
        margin-bottom: 10px;
        font-size: 1.05rem;
    }

    /* Botões */
    .btn-primary {
        background-color: var(--azul) !important;
        border-color: var(--azul) !important;
    }
    .btn-primary:hover {
        background-color: #110f4d !important;
        border-color: #110f4d !important;
    }

    .btn-outline-primary {
        color: var(--azul) !important;
        border-color: var(--azul) !important;
    }
    .btn-outline-primary:hover {
        background-color: var(--azul) !important;
        color: #fff !important;
    }

    .foto-box {
        text-align: right;
    }

    .foto-box img {
        max-width: 260px;
        border-radius: 6px;
        box-shadow: 0 3px 6px rgba(0,0,0,0.25);
    }
</style>

<h2 class="mb-3">
    <i class="fa-solid fa-motorcycle"></i> Moto <?php echo $moto['id']; ?>
</h2>

<?php if (!empty($_SESSION['message'])) : ?>
    <div class="alert alert-<?php echo $_SESSION['type']; ?>">
        <?php echo $_SESSION['message']; ?>
    </div>
<?php endif; ?>

<div class="card shadow-sm view-card mb-4">
    <div class="card-body">
        <div class="row">

            <!-- Infos da moto -->
            <div class="col-md-7">
                <h5 class="mb-3"><i class="fa-solid fa-circle-info"></i> Informações da Moto</h5>

                <dl class="row mb-0">
                    <dt class="col-sm-4">Modelo:</dt>
                    <dd class="col-sm-8"><?php echo $moto['modelo']; ?></dd>

                    <dt class="col-sm-4">Marca:</dt>
                    <dd class="col-sm-8"><?php echo $moto['marca']; ?></dd>

                    <dt class="col-sm-4">Motor:</dt>
                    <dd class="col-sm-8"><?php echo $moto['motor']; ?></dd>

                    <dt class="col-sm-4">Data Cadastro:</dt>
                    <dd class="col-sm-8">
                        <?php echo formataData($moto['datacad'], "d/m/Y H:i:s"); ?>
                    </dd>
                </dl>
            </div>

            <!-- Foto à direita -->
            <div class="col-md-5 foto-box">
                <h5 class="mb-3"><i class="fa-solid fa-image"></i> Foto</h5>

                <?php if (!empty($moto['foto'])) : ?>
                    <img src="uploads/<?php echo htmlspecialchars($moto['foto']); ?>" alt="Foto da moto">
                <?php else : ?>
                    <p><strong style="color: darkred;">Sem imagem disponível</strong></p>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>

<div id="actions" class="row mb-4">
    <div class="col-md-12">

        <?php if (isset($_SESSION["user"])) : ?>
            <a href="edit.php?id=<?php echo $moto['id']; ?>" class="btn btn-primary me-2">
                <i class="fa-solid fa-pencil"></i> Editar
            </a>
        <?php endif; ?>

        <a href="index.php" class="btn btn-outline-primary">
            <i class="fa-solid fa-rotate-left"></i> Voltar
        </a>
    </div>
</div>

<?php include(FOOTER_TEMPLATE); ?>
