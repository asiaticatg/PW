<?php 
    include ("../config.php");
    include (HEADER_TEMPLATE);
?>

<!-- Login Container -->
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow p-4" style="max-width: 420px; width: 100%; border-radius: 1rem;">
        <h3 class="text-center mb-4 text-custom"><i class="fa-solid fa-right-to-bracket"></i> Login</h3>

        <form action="valida.php" method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="log" name="login" placeholder="Usuário" required>
                <label for="log">Usuário</label>
            </div>

            <div class="form-floating mb-3 position-relative">
                <input type="password" class="form-control" id="pass" name="senha" placeholder="Senha" required>
                <label for="pass">Senha</label>

                <!-- Toggle da senha -->
                <span class="position-absolute top-50 end-0 translate-middle-y me-3" style="cursor: pointer;" onclick="toggleSenha()">
                    <i class="fa-solid fa-eye" id="toggleIcon"></i>
                </span>
            </div>

            <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn text-white custom-bg">
                    <i class="fa-solid fa-user"></i> Entrar
                </button>
                <a href="<?php echo BASEURL;?>" class="btn custom-border text-custom">
                    <i class="fa-solid fa-x"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

<script>
function toggleSenha() {
    const pass = document.getElementById('pass');
    const icon = document.getElementById('toggleIcon');

    if (pass.type === "password") {
        pass.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        pass.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
</script>

<style>
    .text-custom { color: #1a1766 !important; }
    .custom-border { border: 1px solid #1a1766 !important; }
    .custom-bg { background-color: #1a1766 !important; }
    .custom-bg:hover { opacity: 0.9; }
    .custom-border:hover { background-color: #1a1766 !important; color: #fff !important; }
</style>

<?php include (FOOTER_TEMPLATE); ?>
