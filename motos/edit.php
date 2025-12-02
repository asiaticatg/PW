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

    label {
        font-weight: 600;
    }

    img.preview-img {
        max-width: 180px;
        max-height: 180px;
        border-radius: 6px;
        margin-top: 10px;
    }
</style>

<h2>Atualizar Moto <?php echo $moto['id']; ?></h2>

<form action="edit.php?id=<?php echo $moto['id']; ?>" method="post" enctype="multipart/form-data">
    <hr>

    <div class="row">
        <div class="form-group col-md-4">
            <label for="modelo">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="moto[modelo]"
                maxlength="50" value="<?php echo $moto['modelo']; ?>" required>
        </div>

        <div class="form-group col-md-3">
            <label for="marca">Marca</label>
            <input type="text" class="form-control" id="marca" name="moto[marca]"
                maxlength="30" value="<?php echo $moto['marca']; ?>" required>
        </div>

        <div class="form-group col-md-3">
            <label for="motor">Motor</label>
            <input type="text" class="form-control" id="motor" name="moto[motor]"
                maxlength="20" value="<?php echo $moto['motor']; ?>">
        </div>

        <div class="form-group col-md-2">
            <label for="datacad">Data de Cadastro</label>
            <input type="date" class="form-control" id="datacad" name="moto[datacad]"
                disabled value="<?php echo formataData($moto['datacad'], "Y-m-d"); ?>">
        </div>
    </div>

    <div class="row mt-3">
        <div class="form-group col-md-6">
            <label for="foto">Foto da moto</label>
            <input type="file" class="form-control" id="foto" name="foto" accept="image/*" onchange="previewMoto(event)">

            <?php if (!empty($moto['foto'])) : ?>
                <img src="uploads/<?php echo htmlspecialchars($moto['foto']); ?>" 
                     class="preview-img shadow-sm" id="previewAtual" alt="Foto atual">
            <?php endif; ?>

            <img id="previewNova" class="preview-img shadow-sm" style="display:none;">
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

<script>
function previewMoto(event) {
    const file = event.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('previewNova').src = e.target.result;
        document.getElementById('previewNova').style.display = 'block';
        
        const atual = document.getElementById('previewAtual');
        if (atual) atual.style.opacity = '0.4';
    }
    reader.readAsDataURL(file);
}
</script>
