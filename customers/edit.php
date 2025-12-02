<?php 
include('functions.php'); 
edit();
include(HEADER_TEMPLATE); 
?>

<!-- ====== CSS AZUL (#1a1766) EMBUTIDO ====== -->
<style>
    .btn-primary, .btn-danger {
        background-color: #1a1766 !important;
        border-color: #1a1766 !important;
    }

    .btn-outline-danger {
        color: #1a1766 !important;
        border-color: #1a1766 !important;
    }

    .btn-outline-danger:hover {
        background-color: #1a1766 !important;
        color: #fff !important;
    }
</style>

<h2>Atualizar Cliente <?php echo $customer['id']; ?></h2>

<form action="edit.php?id=<?php echo $customer['id']; ?>" method="post">
    <hr>

    <div class="row">
        <div class="form-group col-md-7">
            <label for="nome">Nome / Razão Social</label>
            <input type="text" class="form-control" id="nome" name="customer[name]" maxlength="80" value="<?php echo $customer['name']; ?>">
        </div>

        <div class="form-group col-md-3">
            <label for="cpf">CNPJ / CPF</label>
            <input type="text" class="form-control" id="cpf" name="customer[cpf_cnpj]" maxlength="15" value="<?php echo $customer['cpf_cnpj']; ?>">
        </div>

        <div class="form-group col-md-2">
            <label for="birth">Data de Nascimento</label>
            <input type="date" class="form-control" id="birth" name="customer[birthdate]" value="<?php echo formataData($customer['birthdate'], "Y-m-d"); ?>">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-5">
            <label for="end">Endereço</label>
            <input type="text" class="form-control" id="end" name="customer[address]" maxlength="80" value="<?php echo $customer['address']; ?>">
        </div>

        <div class="form-group col-md-3">
            <label for="bairro">Bairro</label>
            <input type="text" class="form-control" id="bairro" name="customer[hood]" maxlength="80" value="<?php echo $customer['hood']; ?>">
        </div>

        <div class="form-group col-md-2">
            <label for="cep">CEP</label>
            <input type="text" class="form-control" id="cep" name="customer[zip_code]" maxlength="8" value="<?php echo $customer['zip_code']; ?>">
        </div>

        <div class="form-group col-md-2">
            <label for="cad">Data de Cadastro</label>
            <input type="date" class="form-control" id="cad" name="customer[created]" disabled value="<?php echo formataData($customer['created'], "Y-m-d"); ?>">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-5">
            <label for="cidade">Município</label>
            <input type="text" class="form-control" id="cidade" name="customer[city]" maxlength="80" value="<?php echo $customer['city']; ?>">
        </div>

        <div class="form-group col-md-2">
            <label for="telefone">Telefone</label>
            <input type="tel" class="form-control" id="telefone" name="customer[phone]" maxlength="11" value="<?php echo $customer['phone']; ?>">
        </div>

        <div class="form-group col-md-2">
            <label for="cel">Celular</label>
            <input type="tel" class="form-control" id="cel" name="customer[mobile]" maxlength="11" value="<?php echo $customer['mobile']; ?>">
        </div>

        <div class="form-group col-md-1">
            <label for="estado">UF</label>
            <input type="text" class="form-control" id="estado" name="customer[state]" maxlength="2" value="<?php echo $customer['state']; ?>">
        </div>

        <div class="form-group col-md-2">
            <label for="ie">Inscrição Estadual</label>
            <input type="text" class="form-control" id="ie" name="customer[ie]" maxlength="15" value="<?php echo $customer['ie']; ?>">
        </div>
    </div>

    <div id="actions" class="row mt-3">
        <div class="col-md-12">
            <button type="submit" class="btn btn-danger">
                <i class="fa-solid fa-sd-card"></i> Salvar
            </button>

            <a href="index.php" class="btn btn-outline-danger">
                <i class="fa-solid fa-rotate-left"></i> Cancelar
            </a>
        </div>
    </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>
