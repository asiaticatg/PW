<?php 
require_once "functions.php"; 
edit();
include (HEADER_TEMPLATE);

$fotoedit = !empty($usuario['foto']) ? $usuario['foto'] : "semimagem.jpg";
?>

<!-- ==================== CSS PERSONALIZADO ==================== -->
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

    .password-wrapper {
        position: relative;
    }

    .toggle-pass {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #666;
    }

    #foto-preview {
        max-width: 220px;
        border-radius: 6px;
        margin-top: 10px;
    }
</style>

<h2>Atualizando o Usuário <?php echo $usuario['id']; ?></h2>

<form action="edit.php?id=<?php echo $usuario['id']; ?>" method="post" enctype="multipart/form-data">
    <hr>

    <!-- Nome -->
    <div class="row">
        <div class="form-group col-md-6">
            <label for="nome">Nome</label>
            <input type="text" id="nome" class="form-control" name="usuario[nome]" 
                   maxlength="80" value="<?php echo $usuario['nome']; ?>" required>
        </div>
    </div>

    <!-- Login -->
    <div class="row mt-2">
        <div class="form-group col-md-4">
            <label for="usuario">Usuário (Login)</label>
            <input type="text" id="usuario" class="form-control" name="usuario[user]"
                   maxlength="80" value="<?php echo $usuario['user']; ?>" required>
        </div>
    </div>

    <!-- Senha + Toggle -->
    <div class="row mt-2">
        <div class="form-group col-md-4">
            <label for="senha">Senha</label>
            
            <div class="password-wrapper">
                <input type="password" id="senha" class="form-control" name="usuario[password]" maxlength="80">
                <i class="fa-solid fa-eye toggle-pass" onclick="toggleSenha('senha', this)"></i>
            </div>

            <small class="text-muted">* Deixe vazio para não alterar a senha</small>
        </div>
    </div>

    <!-- Foto -->
    <div class="row mt-3">
        <div class="form-group col-md-4">
            <label for="foto">Foto</label>
            <input type="file" id="foto" class="form-control" name="foto" accept="image/*">
        </div>
    </div>

    <!-- Preview -->
    <div class="row">
        <div class="form-group col-md-4 mt-3">
            <label>Pré-visualização:</label> <br>
            <img src="fotos/<?php echo $fotoedit ?>" id="foto-preview" class="img-thumbnail shadow" alt="Foto do usuário">
        </div>
    </div>

    <!-- Botões -->
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

<!-- ==================== SCRIPTS ==================== -->
<script>
/* Preview da foto */
document.querySelector('#foto').addEventListener('change', event => {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
        document.querySelector('#foto-preview').src = e.target.result;
    };

    if (file) {
        reader.readAsDataURL(file);
    }
});

/* Toggle de senha */
function toggleSenha(id, icon) {
    const input = document.getElementById(id);
    if (input.type === "password") {
        input.type = "text";
        icon.classList.replace("fa-eye", "fa-eye-slash");
    } else {
        input.type = "password";
        icon.classList.replace("fa-eye-slash", "fa-eye");
    }
}
</script>

<?php include(FOOTER_TEMPLATE); ?>
