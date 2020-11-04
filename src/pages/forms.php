<?php
ini_set('display_errors', 0);
error_reporting(0);

require_once '../controllers/ProdutosController.php';
require_once '../controllers/CategoriaController.php';

$produtos = new Produto();
$categorias = new Categoria();

if (isset($_POST['cadastrarCategoria'])) {
  $nome = $_POST['nomeCategoria'];

  $categorias->setNome($nome);

  if ($categorias->insert()) {
    echo '<script>alert("Cadastro feito com sucesso!"); window.location="mainControl.php"</script>';
  } else {
    echo '<script>alert("Aconteceu algo de errado!");</script>';
  }
}

if (isset($_POST['atualizarCategoria'])) {
  $id = $_POST['id'];
  $nome = $_POST['nomeCategoria'];

  $categorias->setNome($nome);

  if ($categorias->update($id)) {
    echo '<script>alert("Atualização feita com sucesso!"); window.location="mainControl.php"</script>';
  } else {
    echo '<script>alert("Aconteceu algo de errado!");</script>';
  }
}

if (isset($_POST['cadastrarProduto'])) {
  $nome = $_POST['nome'];
  $preco = $_POST['preco'];
  $idioma = $_POST['idioma'];
  $plataforma = $_POST['plataforma'];
  $multiplayer = $_POST['multiplayer'];
  $anoLancamento = $_POST['anoLancamento'];
  $desenvolvedor = $_POST['desenvolvedor'];
  $quantidade = $_POST['quantidade'];
  $categoriasValues = $_POST['categorias'];

  $multiplayer = ("true") ? true : false;

  $produtos->setNome($nome);
  $produtos->setPreco($preco);
  $produtos->setIdioma($idioma);
  $produtos->setPlataforma($plataforma);
  $produtos->setMultiplayer($multiplayer);
  $produtos->setAnoLancamento($anoLancamento);
  $produtos->setDesenvolvedor($desenvolvedor);
  $produtos->setQuantidade($quantidade);

  if ($produtos->insert()) {
    $produtos->insertProdutoCategoria($categoriasValues);
    echo '<script>alert("Cadastro feito com sucesso!"); window.location="mainControl.php"</script>';
  } else {
    echo '<script>alert("Aconteceu algo de errado!");</script>';
  }
}

if (isset($_POST['atualizarProduto'])) {
  $id = $_POST['id'];

  $nome = $_POST['nome'];
  $preco = $_POST['preco'];
  $idioma = $_POST['idioma'];
  $plataforma = $_POST['plataforma'];
  $multiplayer = $_POST['multiplayer'];
  $anoLancamento = $_POST['anoLancamento'];
  $desenvolvedor = $_POST['desenvolvedor'];
  $quantidade = $_POST['quantidade'];

  $multiplayer = ("true") ? true : false;

  $produtos->setNome($nome);
  $produtos->setPreco($preco);
  $produtos->setIdioma($idioma);
  $produtos->setPlataforma($plataforma);
  $produtos->setMultiplayer($multiplayer);
  $produtos->setAnoLancamento($anoLancamento);
  $produtos->setDesenvolvedor($desenvolvedor);
  $produtos->setQuantidade($quantidade);

  if ($produtos->update($id)) {
    echo '<script>alert("Atualização feita com sucesso!"); window.location="mainControl.php"</script>';
  } else {
    echo '<script>alert("Aconteceu algo de errado!");</script>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="../../vars.css" />
  <link rel="stylesheet" href="../styles/forms.css">

  <title>The Control</title>
</head>

<body>
  <header>
    <div class="back">
      <a onclick="goBack()">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
        </svg>
      </a>
    </div>
  </header>

  <div class="containerPage">

    <!-- Formulários de criação -->
    <?php if ((isset($_GET['create'])) && $_GET['create'] == "produto") : ?>
      <form method="post" class="mt-3">
        <div class="row">
          <div class="col-sm-6">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control form-control-lg">
          </div>
          <div class="col-sm-6 mt-3 mt-sm-0">
            <label for="preco">Preço</label>
            <input type="number" name="preco" class="form-control form-control-lg" step="0.01">
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6 mt-3">
            <label for="idioma">Idioma</label>
            <input type="text" name="idioma" class="form-control form-control-lg">
          </div>
          <div class="col-sm-6 mt-3">
            <label for="plataforma">Plataforma</label>
            <input type="text" name="plataforma" class="form-control form-control-lg">
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6 mt-3">
            <label for="multiplayer">Multiplayer</label>
            <select name="multiplayer" class="form-control form-control-lg">
              <option value="false" selected>Não</option>
              <option value="true">Sim</option>
            </select>
          </div>
          <div class="col-sm-5 mt-3">
            <label for="anoLancamento">Ano de Lançamento</label>
            <input type="number" min="1000" max="9999" name="anoLancamento" class="form-control form-control-lg">
          </div>
        </div>

        <div class="row">
          <div class="col-12 mt-4">
            <label for="categorias">Categorias:</label>

            <?php foreach ($categorias->findAll() as $key => $value) : ?>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="categorias[]" value="<?php echo $value['cd'] ?>">
                <label class="form-check-label" for="categoria">
                  <?php echo $value['nome'] ?>
                </label>
              </div>
            <?php endforeach ?>

          </div>
        </div>

        <div class="row">
          <div class="col-sm-6 mt-3">
            <label for="desenvolvedor">Desenvolvedor</label>
            <input type="text" name="desenvolvedor" class="form-control form-control-lg">
          </div>
          <div class="col-sm-5 mt-3">
            <label for="quantidade">Quantidade</label>
            <input type="number" name="quantidade" class="form-control form-control-lg">
          </div>
        </div>

        <div class="row">
          <div class="offset-sm-3 col-sm-6 mt-5">
            <button type="submit" name="cadastrarProduto">Cadastrar</button>
          </div>
      </form>

    <?php elseif ((isset($_GET['create'])) && $_GET['create'] == "categoria") : ?>
      <form method="post" class="mt-3">
        <div class="row">
          <div class="col-sm-12">
            <label for="nomeCategoria">Nome</label>
            <input type="text" name="nomeCategoria" class="form-control form-control-lg">
          </div>
        </div>

        <div class="row">
          <div class="offset-sm-3 col-sm-6 mt-5">
            <button type="submit" name="cadastrarCategoria">Cadastrar</button>
          </div>
      </form>

      <!-- Formulários de atualização -->
    <?php
    elseif ((isset($_GET['update'])) && (isset($_GET['id'])) && ($_GET['update'] == "produto")) :
      $value = $produtos->findOne($_GET['id']);
    ?>
      <form method="post" class="mt-3">
        <input type="hidden" name="id" value="<?php echo $value['cd'] ?>">
        <div class="row">
          <div class="col-sm-6">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control form-control-lg" value="<?php echo $value['nome'] ?>">
          </div>
          <div class="col-sm-6 mt-3 mt-sm-0">
            <label for="preco">Preço</label>
            <input type="number" name="preco" class="form-control form-control-lg" step="0.01" value="<?php echo $value['preco'] ?>">
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6 mt-3">
            <label for="idioma">Idioma</label>
            <input type="text" name="idioma" class="form-control form-control-lg" value="<?php echo $value['idioma'] ?>">
          </div>
          <div class="col-sm-6 mt-3">
            <label for="plataforma">Plataforma</label>
            <input type="text" name="plataforma" class="form-control form-control-lg" value="<?php echo $value['plataforma'] ?>">
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6 mt-3">
            <label for="multiplayer">Multiplayer</label>
            <select name="multiplayer" class="form-control form-control-lg">
              <option value="false" <?php if ($value['multiplayer'] = 0) : echo "selected";
                                    endif ?>>Não</option>
              <option value="true" <?php if ($value['multiplayer'] = 1) : echo "selected";
                                    endif ?>>Sim</option>
            </select>
          </div>
          <div class="col-sm-5 mt-3">
            <label for="anoLancamento">Ano de Lançamento</label>
            <input type="number" min="1000" max="9999" name="anoLancamento" class="form-control form-control-lg" value="<?php echo $value['ano_lancamento'] ?>">
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6 mt-3">
            <label for="desenvolvedor">Desenvolvedor</label>
            <input type="text" name="desenvolvedor" class="form-control form-control-lg" value="<?php echo $value['desenvolvedor'] ?>">
          </div>
          <div class="col-sm-5 mt-3">
            <label for="quantidade">Quantidade</label>
            <input type="number" name="quantidade" class="form-control form-control-lg" value="<?php echo $value['quantidade'] ?>">
          </div>
        </div>

        <div class="row">
          <div class="offset-sm-3 col-sm-6 mt-5">
            <button type="submit" name="atualizarProduto">Cadastrar</button>
          </div>
      </form>

    <?php
    elseif ((isset($_GET['update'])) && (isset($_GET['id'])) && ($_GET['update'] == "categoria")) :
      $value = $categorias->findOne($_GET['id']);
    ?>
      <form method="post" class="mt-3">
        <div class="row">
          <div class="col-sm-12">
            <label for="nomeCategoria">Nome</label>
            <input type="text" name="nomeCategoria" class="form-control form-control-lg" value="<?php echo $value['nome']; ?>">
            <input type="hidden" name="id" value="<?php echo $value['cd'] ?>">
          </div>
        </div>

        <div class="row">
          <div class="offset-sm-3 col-sm-6 mt-5">
            <button type="submit" name="atualizarCategoria">Cadastrar</button>
          </div>
      </form>
    <?php endif ?>

  </div>
</body>

<script>
  function goBack() {
    history.go(-1);
  }
</script>

</html>