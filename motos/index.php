<?php
require_once('../motos/functions.php');
index();
?>

<?php include(HEADER_TEMPLATE); ?>

<style>
  .btn-primary-custom {
      background-color: #1a1766 !important;
      border-color: #1a1766 !important;
      color: #fff !important;
  }

  .btn-primary-custom:hover {
      background-color: #0f0d40 !important;
      border-color: #0f0d40 !important;
  }

  .btn-outline-primary-custom {
      color: #1a1766 !important;
      border-color: #1a1766 !important;
  }

  .btn-outline-primary-custom:hover {
      background-color: #1a1766 !important;
      color: #fff !important;
  }

  .btn-view-light {
      background-color: #7aa7ff !important;
      border-color: #7aa7ff !important;
      color: #fff !important;
  }

  .btn-view-light:hover {
      background-color: #5c8cf0 !important;
      border-color: #5c8cf0 !important;
      color: #fff !important;
  }

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
      <h2>Motos</h2>
    </div>
    <div class="col-sm-6 text-right h2">

      <!-- NOVA MOTO -->
      <a class="btn btn-primary-custom" href="add.php">
        <i class="fa fa-plus"></i> Nova Moto
      </a>

      <!-- ATUALIZAR -->
      <a class="btn btn-outline-primary-custom" href="index.php">
        <i class="fa fa-refresh"></i> Atualizar
      </a>

    </div>
  </div>
</header>

<?php if (!empty($_SESSION['message'])) : ?>
  <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible fade show" role="alert">
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
      <th>Modelo</th>
      <th>Marca</th>
      <th>Motor</th>
      <th>Data Cadastro</th>
      <th>Foto</th>
      <th>Opções</th>
    </tr>
  </thead>

  <tbody>
    <?php if (!empty($motos)) : ?>
      <?php foreach ($motos as $moto) : ?>
        <tr>

          <td><?php echo htmlspecialchars($moto['id']); ?></td>
          <td><?php echo htmlspecialchars($moto['modelo']); ?></td>
          <td><?php echo htmlspecialchars($moto['marca']); ?></td>
          <td><?php echo htmlspecialchars($moto['motor']); ?></td>
          <td><?php echo formataData($moto['datacad'], "d/m/Y H:i"); ?></td>

          <td>
            <?php if (!empty($moto['foto'])) : ?>
              <img src="uploads/<?php echo htmlspecialchars($moto['foto']); ?>" 
                   width="80" class="img-thumbnail shadow-sm">
            <?php else : ?>
              -
            <?php endif; ?>
          </td>

          <td class="actions text-right">

            <!-- VER — AZUL BEBÊ -->
            <a href="view.php?id=<?php echo urlencode($moto['id']); ?>" 
               class="btn btn-sm btn-view-light">
              <i class="fa fa-eye"></i>
            </a>

            <?php if (isset($_SESSION["user"])) : ?>

              <!-- EDITAR — AZUL ESCURO -->
              <a href="edit.php?id=<?php echo urlencode($moto['id']); ?>" 
                 class="btn btn-sm btn-edit-dark">
                <i class="fa fa-pencil"></i>
              </a>

              <!-- EXCLUIR — CONTORNO AZUL ESCURO -->
              <a href="#"
                 class="btn btn-sm btn-outline-primary-custom"
                 data-bs-toggle="modal"
                 data-bs-target="#delete-modal"
                 data-customer="<?php echo $moto['id']; ?>">
                <i class="fa-solid fa-trash-can"></i>
                Excluir
              </a>

            <?php endif; ?>

          </td>
        </tr>
      <?php endforeach; ?>
    <?php else : ?>
      <tr>
        <td colspan="7">Nenhuma moto encontrada.</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>

<?php
  include "modal.php";
  include(FOOTER_TEMPLATE);
?>
