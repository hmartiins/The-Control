<?php

if (isset($_GET['admin'])) :
  require_once '../controllers/ProdutosController.php';
  require_once '../controllers/CategoriaController.php';

  $produtos = new Produto();
  $categorias = new Categoria();

  if ((isset($_GET['delete'])) && (isset($_GET['id']))) {
    if ($_GET['delete'] == "produto") {
      $produtos->deleteProdutoCategoria($_GET['id']);
      $produtos->delete($_GET['id']);
    } elseif ($_GET['delete'] == "categoria") {
      $response = $categorias->delete($_GET['id']);
      if ($response != true) {
        echo '<script>
          alert("Aconteceu algo de errado! Você deve estar tentando excluír uma categoria vinculada a outros registros!");
          window.location="management.php?admin=categorias";
        </script>';
      }
    }
  }
?>

  <!DOCTYPE html>
  <html lang="pt-br">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../vars.css" />
    <link rel="stylesheet" href="../styles/management.css" />

    <title>The Control</title>
  </head>

  <body>
    <?php if ($_GET['admin'] == "produtos") : ?>

      <header>
        <div class="back">
          <a href="mainControl.php">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
            </svg>
          </a>
        </div>

        <img src="../assets/logoilustrativa.png" alt="The Control" />

        <div class="plus" title="Criar novo">
          <a href="forms.php?create=produto">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
              <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg>
          </a>
        </div>
      </header>

      <div class="container">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Preço</th>
              <th scope="col">Qtd.</th>
              <th scope="col">#</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ($produtos->findAll() as $key => $value) : ?>
              <tr>
                <th scope="row">
                  <?php echo $value['nome'] ?>
                </th>
                <td>
                  R$<?php echo $value['preco'] ?>
                </td>
                <td>
                  <?php echo $value['quantidade'] ?>
                </td>
                <td class="actions">
                  <a href="forms.php?update=produto&id=<?php echo $value['cd'] ?>" title="Editar">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                  </a>
                  <a href="?admin=produtos&delete=produto&id=<?php echo $value['cd'] ?>" onclick="return confirm('Tem certeza que deseja deletar este registro?')" title="Deletar">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                    </svg>
                  </a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>

    <?php endif;
    if ($_GET['admin'] == "categorias") : ?>

      <header>
        <div class="back">
          <a href="mainControl.php">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
            </svg>
          </a>
        </div>

        <img src="../assets/logoilustrativa.png" alt="The Control" />

        <div class="plus" title="Criar novo">
          <a href="forms.php?create=categoria">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
              <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg>
          </a>
        </div>
      </header>

      <div class="container">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Categoria</th>
              <th scope="col">#</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ($categorias->findAll() as $key => $value) : ?>
              <tr>
                <th scope="row">
                  <?php echo $value['nome'] ?>
                </th>
                <td class="actions">
                  <a href="forms.php?update=categoria&id=<?php echo $value['cd'] ?>" title="Editar">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                  </a>
                  <a href="?admin=categorias&delete=categoria&id=<?php echo $value['cd'] ?>" onclick="return confirm('Tem certeza que deseja deletar este registro?')" title="Deletar">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                    </svg>
                  </a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>

    <?php endif; ?>

    <footer>
      <img src="../assets/logoilustrativa.png" alt="The Control" />

      <p>
        <b>Feito por:</b>
        <a href="https://github.com/joaovds">
          João Victor
        </a>
        e
        <a href="https://github.com/hmartiins">
          Henrique Martins
        </a>
      </p>

      <a href="https://github.com/hmartiins/The-Control">
        <img src="../assets/githubLogo.svg" alt="github logo">
      </a>
    </footer>
  </body>

  </html>

<?php endif; ?>