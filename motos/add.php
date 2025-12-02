<?php 
  include('functions.php'); 
  add();
  include(HEADER_TEMPLATE); 
?>

<style>
/* === BOTÕES PERSONALIZADOS (#1a1766) === */

.btn-primary-custom {
    background-color: #1a1766 !important;
    border-color: #1a1766 !important;
    color: #fff !important;
}

.btn-primary-custom:hover {
    background-color: #0f0d3a !important;
    border-color: #0f0d3a !important;
    color: #fff !important;
}

.btn-outline-primary-custom {
    color: #1a1766 !important;
    border-color: #1a1766 !important;
}

.btn-outline-primary-custom:hover {
    background-color: #1a1766 !important;
    color: #fff !important;
}
</style>

<h2>Nova Moto</h2>

<form action="add.php" method="post" enctype="multipart/form-data">
    <hr>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="modelo">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="moto[modelo]" maxlength="50" required>
        </div>

        <div class="form-group col-md-3">
            <label for="marca">Marca</label>
            <input type="text" class="form-control" id="marca" name="moto[marca]" maxlength="30" required>
        </div>

        <div class="form-group col-md-3">
            <label for="motor">Motor</label>
            <input type="text" class="form-control" id="motor" name="moto[motor]" maxlength="20">
        </div>

        <div class="form-group col-md-2">
            <label for="datacad">Data de Cadastro</label>
            <input type="date" class="form-control" id="datacad" name="moto[datacad]" value="<?php echo date('Y-m-d'); ?>" disabled>
        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-md-6">
            <label for="foto">Foto (URL ou upload)</label>
            <input type="file" class="form-control" id="foto" name="foto" onchange="previewImage(event)">
            <br>
            <img id="preview" src="" alt="Prévia da imagem" style="max-width: 100%; max-height: 200px; display: none;">
        </div>
    </div>
    
    <div id="actions" class="row mt-2">
        <div class="col-md-12">

            <button type="submit" class="btn btn-primary-custom">
                <i class="fa-solid fa-sd-card"></i> Salvar
            </button>

            <a href="index.php" class="btn btn-outline-primary-custom">
                <i class="fa-solid fa-rotate-left"></i> Cancelar
            </a>

        </div>
    </div>
</form>

<script>
function previewImage(event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    
    reader.onload = function() {
        const preview = document.getElementById('preview');
        preview.src = reader.result;
        preview.style.display = 'block';
    };
    
    if (file) {
        reader.readAsDataURL(file);
    }
}
</script>

<?php include(FOOTER_TEMPLATE); ?>
