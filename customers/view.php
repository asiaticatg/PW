<?php 
    include "functions.php"; 
    view($_GET['id']);
    include(HEADER_TEMPLATE); 
?>

<style>
    :root {
        --azul: #1a1766;
    }

    .view-card {
        border-left: 4px solid var(--azul) !important;
    }

    h2, h5, dt {
        color: var(--azul) !important;
        font-weight: 600;
    }

    dd {
        margin-bottom: 10px;
        padding-left: 5px;
        font-size: 1.05rem;
    }

    /* BOTÕES */
    .btn-primary {
        background-color: var(--azul) !important;
        border-color: var(--azul) !important;
    }
    .btn-primary:hover {
        background-color: #100f45 !important; /* mesma cor, só um pouquinho mais escuro pro hover */
        border-color: #100f45 !important;
    }

    .btn-outline-primary {
        color: var(--azul) !important;
        border-color: var(--azul) !important;
    }
    .btn-outline-primary:hover {
        background-color: var(--azul) !important;
        color: #fff !important;
    }
</style>

<h2 class="mb-3">
    <i class="fa-solid fa-user"></i> Cliente <?php echo $customer['id']; ?>
</h2>

<?php if (!empty($_SESSION['message'])) : ?>
    <div class="alert alert-<?php echo $_SESSION['type']; ?>">
        <?php echo $_SESSION['message']; ?>
    </div>
<?php endif; ?>

<div class="card shadow-sm mb-4 view-card">
    <div class="card-body">
        <h5 class="mb-3"><i class="fa-solid fa-id-badge"></i> Informações Pessoais</h5>

        <dl class="row mb-0">
            <dt class="col-sm-4">Nome / Razão Social:</dt>
            <dd class="col-sm-8"><?php echo $customer['name']; ?></dd>

            <dt class="col-sm-4">CPF / CNPJ:</dt>
            <dd class="col-sm-8"><?php echo $customer['cpf_cnpj']; ?></dd>

            <dt class="col-sm-4">Data de Nascimento:</dt>
            <dd class="col-sm-8"><?php echo formataData($customer['birthdate'], "d/m/Y"); ?></dd>
        </dl>
    </div>
</div>

<div class="card shadow-sm mb-4 view-card">
    <div class="card-body">
        <h5 class="mb-3"><i class="fa-solid fa-map-location-dot"></i> Endereço</h5>

        <dl class="row mb-0">
            <dt class="col-sm-4">Endereço:</dt>
            <dd class="col-sm-8"><?php echo $customer['address']; ?></dd>

            <dt class="col-sm-4">Bairro:</dt>
            <dd class="col-sm-8"><?php echo $customer['hood']; ?></dd>

            <dt class="col-sm-4">CEP:</dt>
            <dd class="col-sm-8"><?php echo $customer['zip_code']; ?></dd>

            <dt class="col-sm-4">Cidade:</dt>
            <dd class="col-sm-8"><?php echo $customer['city']; ?></dd>

            <dt class="col-sm-4">UF:</dt>
            <dd class="col-sm-8"><?php echo $customer['state']; ?></dd>
        </dl>
    </div>
</div>

<div class="card shadow-sm mb-4 view-card">
    <div class="card-body">
        <h5 class="mb-3"><i class="fa-solid fa-phone"></i> Contato</h5>

        <dl class="row mb-0">
            <dt class="col-sm-4">Telefone:</dt>
            <dd class="col-sm-8"><?php echo formataTel($customer['phone']); ?></dd>

            <dt class="col-sm-4">Celular:</dt>
            <dd class="col-sm-8"><?php echo formataTel($customer['mobile']); ?></dd>

            <dt class="col-sm-4">Inscrição Estadual:</dt>
            <dd class="col-sm-8"><?php echo $customer['ie']; ?></dd>
        </dl>
    </div>
</div>

<div class="card shadow-sm mb-4 view-card">
    <div class="card-body">
        <h5 class="mb-3"><i class="fa-solid fa-calendar-days"></i> Datas</h5>

        <dl class="row mb-0">
            <dt class="col-sm-4">Data de Cadastro:</dt>
            <dd class="col-sm-8"><?php echo formataData($customer['created'], "d/m/Y H:i:s"); ?></dd>

            <dt class="col-sm-4">Última Atualização:</dt>
            <dd class="col-sm-8"><?php echo formataData($customer['modified'], "d/m/Y H:i:s"); ?></dd>
        </dl>
    </div>
</div>

<div id="actions" class="row mb-5">
    <div class="col-md-12">
        <?php if (isset($_SESSION["user"])) : ?>
            <a href="edit.php?id=<?php echo $customer['id']; ?>" 
               class="btn btn-primary me-2">
                <i class="fa-solid fa-pencil"></i> Editar
            </a>
        <?php endif; ?>
        
        <a href="index.php" class="btn btn-outline-primary">
            <i class="fa-solid fa-rotate-left"></i> Voltar
        </a>
    </div>
</div>

<?php include(FOOTER_TEMPLATE); ?>
