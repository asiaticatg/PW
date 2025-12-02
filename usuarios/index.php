<?php
require_once('../usuarios/functions.php');
index();
?>

<?php include(HEADER_TEMPLATE); ?>

<style>
  /* Azul escuro padrão */
  .btn-primary-custom {
      background-color: #1a1766 !important;
      border-color: #1a1766 !important;
      color: #fff !important;
  }

  .btn-primary-custom:hover {
      background-color: #0f0d40 !important;
      border-color: #0f0d40 !important;
  }

  /* Contorno azul escuro */
  .btn-outline-primary-custom {
      color: #1a1766 !important;
      border-color: #1a1766 !important;
  }

  .btn-outline-primary-custom:hover {
      background-color: #1a1766 !important;
      color: #fff !important;
  }

  /* Botão visualizar (azul bebê) */
  .btn-view-light {
      background-color: #7aa7ff !important;
      border-color: #7aa7ff !important;
      color: #fff !important;
  }

  .btn-view-light:hover {
      background-color: #5c8cf0 !important;
      border-color: #5c8cf0 !important;
  }

  /* Botão editar (azul escuro) */
  .btn-edit-dark {
      background-color: #1a1766 !important;
      border-color: #1a1766 !important;
      color: #fff !important;
  }

  .btn-edit-dark:hover {
      background-color: #0f0d40 !important;
      border-color: #0f0d40 !important;
  }
</style>

<header>
  <div class="row">
    <div class="col-sm-6">
      <h2>Usuários</h2>
    </div>

    <div class="col-sm-6 text-right h2">

      <a class="btn btn-primary-custom" href="add.php">
        <i class="fa-solid fa-user-gear"></i> Novo Usuário
      </a>

      <a class="btn btn-outline-primary-custom" href="index.php">
        <i class="fa fa-refresh"></i> Atualizar
      </a>

    </div>
  </div>

  <div class="row">
    <form name="filtro" action="index.php" method="post">
      <div class="row">
        <div class="form-group col-md-4">
          <div class="input-group mb-3">

            <input type="search" class="form-control" name="users" maxlength="50" required>

            <button type="submit" class="btn btn-primary-custom">
              <i class="fa-solid fa-magnifying-glass"></i> Pesquisar
            </button>

          </div>
        </div>
      </div>
    </form>
  </div>
</header>

<?php if (!empty($_SESSION['message'])) : ?>
  <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible fade show">
    <?php echo $_SESSION['message']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
  <?php clear_messages(); ?>
<?php endif; ?>

<hr>

<table class="table table-hover align-middle">
  <thead>
    <tr>
      <th>ID</th>
      <th width="30%">Nome</th>
      <th>Login</th>
      <th>Foto</th>
      <th>Opções</th>
    </tr>
  </thead>

  <tbody>
    <?php if (!empty($usuarios)) : ?>
      <?php foreach ($usuarios as $usuario) : ?>
        <tr>

          <td><?php echo htmlspecialchars($usuario['id']); ?></td>
          <td><?php echo htmlspecialchars($usuario['nome']); ?></td>
          <td><?php echo htmlspecialchars($usuario['user']); ?></td>

          <td>
            <?php 
              $foto = !empty($usuario['foto']) ? $usuario['foto'] : "semimagem.png";
            ?>
            <img src="fotos/<?php echo htmlspecialchars($foto); ?>" 
                 width="60" class="img-thumbnail shadow-sm rounded">
          </td>

          <td class="actions text-right">

            <!-- VER — azul bebê -->
            <a href="view.php?id=<?php echo urlencode($usuario['id']); ?>" 
               class="btn btn-sm btn-view-light">
              <i class="fa fa-eye"></i>
            </a>

            <!-- EDITAR — azul escuro -->
            <a href="edit.php?id=<?php echo urlencode($usuario['id']); ?>" 
               class="btn btn-sm btn-edit-dark">
              <i class="fa fa-pencil"></i>
            </a>

            <!-- EXCLUIR — outline azul escuro -->
            <a href="#"
               class="btn btn-sm btn-outline-primary-custom"
               data-bs-toggle="modal"
               data-bs-target="#delete-usuario"
               data-usuario="<?php echo $usuario['id']; ?>">
              <i class="fa-solid fa-trash-can"></i> Excluir
            </a>

          </td>
        </tr>
      <?php endforeach; ?>
    <?php else : ?>
      <tr>
        <td colspan="5">Nenhum registro encontrado.</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>


<?php 
include "modal.php";
include(FOOTER_TEMPLATE);
?>

<script>
var deleteModal = document.getElementById('delete-usuario');

if (deleteModal) {
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var id = button.getAttribute('data-usuario');

        deleteModal.querySelector('#confirm').href = 'delete.php?id=' + id;
        deleteModal.querySelector('.modal-title').textContent = "Excluir Usuário #" + id;
        deleteModal.querySelector('.modal-body').textContent =
            "Tem certeza que deseja excluir o usuário de ID " + id + "?";
    });
}
</script>
