<?php 
require_once "functions.php"; 
add();
include(HEADER_TEMPLATE);
?>

<!-- ===== CSS EMBUTIDO ===== -->
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
        color: white !important;
    }

    .toggle-pass {
        cursor: pointer;
        padding: 8px;
        background: #eee;
        border: 1px solid #ccc;
        border-left: none;
        border-radius: 0 5px 5px 0;
    }

    .input-group input {
        border-right: none;
    }
</style>

<h2>Novo Usuário</h2>

<form action="add.php" method="post" enctype="multipart/form-data">
    <hr>

    <div class="row">
        <div class="form-group col-md-7">
            <label for="nome">Nome</label>
            <input type="text" id="nome" class="form-control" name="usuario[nome]" maxlength="50" required>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-5">
            <label for="user">Login</label>
            <input type="text" id="user" class="form-control" name="usuario[user]" maxlength="50" required>
        </div>
    </div>

    <!-- SENHA -->
    <div class="row">
        <div class="form-group col-md-4">
            <label for="pass">Senha</label>
            <div class="input-group">
                <input type="password" id="pass" class="form-control" name="usuario[password]" maxlength="100" required>
                <span class="toggle-pass" onclick="togglePassword('pass', this)">
                    <i class="fa-solid fa-eye"></i>
                </span>
            </div>
        </div>
    </div>

    <!-- CONFIRMAR SENHA -->
    <div class="row">
        <div class="form-group col-md-4">
            <label for="pass2">Confirmar Senha</label>
            <div class="input-group">
                <input type="password" id="pass2" class="form-control" name="password2" maxlength="100" required>
                <span class="toggle-pass" onclick="togglePassword('pass2', this)">
                    <i class="fa-solid fa-eye"></i>
                </span>
            </div>
        </div>
    </div>

    <!-- FOTO -->
    <div class="row mt-3">
        <div class="form-group col-md-4">
            <label for="foto">Foto</label>
            <input type="file" id="foto" class="form-control" name="foto" accept="image/*">
        </div>
    </div>

    <!-- PREVIEW -->
    <div class="row mt-2">
        <div class="form-group col-md-4">
            <label>Pré-visualização</label>
            <img src="fotos/semimagem.png" id="imagem" class="img-thumbnail shadow" width="150px">
        </div>
    </div>

    <!-- BOTÕES -->
    <div id="actions" class="row mt-3">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-sd-card"></i> Salvar
            </button>
            <a href="index.php" class="btn btn-outline-danger">
                <i class="fa-solid fa-rotate-left"></i> Cancelar
            </a>
        </div>
    </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>

<!-- ===== SCRIPT DE PREVIEW E TOGGLE ===== -->
<script>
    // Preview da foto
    $(document).ready(function() {
        $('#foto').on('change', function(event) {
            const file = event.target.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagem').attr('src', e.target.result).show();
                };
                reader.readAsDataURL(file);
            } else {
                $('#imagem').attr('src', 'fotos/semimagem.png');
            }
        });
    });

    // Mostrar/ocultar senha
    function togglePassword(id, el) {
        const input = document.getElementById(id);
        const icon = el.querySelector("i");

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>
