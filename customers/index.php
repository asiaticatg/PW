<?php
require_once('../customers/functions.php');
index();
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
  <div class="row">
    <div class="col-sm-6">
      <h2>Clientes</h2>
    </div>
    <div class="col-sm-6 text-right h2">

      <!-- BOTÃO NOVO CLIENTE -->
      <a class="btn btn-primary-custom" href="add.php">
        <i class="fa fa-plus"></i> Novo Cliente
      </a>

      <!-- BOTÃO ATUALIZAR -->
      <a class="btn btn-outline-primary-custom" href="index.php">
        <i class="fa fa-refresh"></i> Atualizar
      </a>

    </div>
  </div>
</header>

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

  .btn-view {
      background-color: #5f8bff !important;
      border-color: #5f8bff !important;
      color: #fff !important;
  }
  .btn-view:hover {
      background-color: #3a6df5 !important;
      border-color: #3a6df5 !important;
  }

  .btn-edit {
      background-color: #1a1766 !important;
      border-color: #1a1766 !important;
      color: #fff !important;
  }
  .btn-edit:hover {
      background-color: #0f0d40 !important;
      border-color: #0f0d40 !important;
  }
</style>

<?php if (!empty($_SESSION['message'])) : ?>
  <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible fade show" role="alert">
    <?php echo $_SESSION['message']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php clear_messages(); ?>
<?php endif; ?>

<hr>

<table class="table table-hover align-middle">
  <thead>
    <tr>
      <th>ID</th>
      <th width="30%">Nome</th>
      <th>CPF/CNPJ</th>
      <th>Telefone</th>
      <th>Atualizado em</th>
      <th>Opções</th>
    </tr>
  </thead>

  <tbody>
    <?php if (!empty($customers)) : ?>
      <?php foreach ($customers as $customer) : ?>
        <tr>
          <td><?php echo htmlspecialchars($customer['id']); ?></td>
          <td><?php echo htmlspecialchars($customer['name']); ?></td>
          <td><?php echo htmlspecialchars($customer['cpf_cnpj']); ?></td>
          <td><?php echo htmlspecialchars($customer['phone']); ?></td>
          <td><?php echo formatadata($customer['modified'], "d/m/Y - H:i:s"); ?></td>

          <td class="actions text-right">

            <!-- VISUALIZAR -->
            <a href="view.php?id=<?php echo urlencode($customer['id']); ?>" class="btn btn-sm btn-view">
              <i class="fa fa-eye"></i>
            </a>

            <?php if (isset($_SESSION["user"])) : ?>

              <!-- EDITAR -->
              <a href="edit.php?id=<?php echo urlencode($customer['id']); ?>" class="btn btn-sm btn-edit">
                <i class="fa fa-pencil"></i>
              </a>

              <!-- EXCLUIR -->
              <a href="#"
                class="btn btn-sm btn-outline-primary-custom"
                data-bs-toggle="modal"
                data-bs-target="#delete-modal"
                data-customer="<?php echo $customer['id']; ?>">
                <i class="fa-solid fa-trash-can"></i> Excluir
              </a>

            <?php endif; ?>

          </td>
        </tr>
      <?php endforeach; ?>
    <?php else : ?>
      <tr>
        <td colspan="6">Nenhum registro encontrado.</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>

<?php
include "modal.php";
include(FOOTER_TEMPLATE);
?>