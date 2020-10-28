<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../vars.css" />
  <link rel="stylesheet" href="../styles/mainControl.css" />
  <title>The Control</title>
</head>

<body>
  <div id="menu" class="menu">
    <div class="menu-content">
      <ul>
        <li>
          <a href="#">
            Entradas desse mês
          </a>
        </li>
        <li>
          <a href="#">
            Saídas desse mês
          </a>
        </li>
        <li>
          <a href="#">
            Produtos mais vendidos
          </a>
        </li>
        <li>
          <a href="#">
            Produtos menos vendidos
          </a>
        </li>
        <li>
          <a href="#">
            Produtos com menos estoque
          </a>
        </li>
      </ul>
    </div>

    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg" id="close">
      <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
    </svg>
  </div>
  <header>
    <div class="report" id="openMenu">
      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-graph-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5z" />
      </svg>
      <b>Relatórios</b>
    </div>

    <img src="../assets/logoilustrativa.png" alt="The Control" />

    <div class="logout" title="Logout">
      <a href="http://localhost/ETEC/The-Control/">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-in-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
          <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
        </svg>
      </a>
    </div>
  </header>

  <div class="container">
    <div class="card">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <div class="content">
        <h2>01</h2>
        <h3>Administrar Produtos</h3>
        <p>Cadastrar, listar, atualizar e deletar: Produtos</p>
        <div class="button">
          <a href="management.php?admin=produtos">Visualizar</a>
        </div>
      </div>
    </div>
    <div class="card">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <div class="content">
        <h2>02</h2>
        <h3>Administrar Categorias</h3>
        <p>Cadastrar, listar, atualizar e deletar: Categorias</p>
        <div class="button">
          <a href="management.php?admin=categorias">Visualizar</a>
        </div>
      </div>
    </div>
    <div class="card">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <div class="content">
        <h2>03</h2>
        <h3>Administrar algo</h3>
        <p>Cadastrar, listar, atualizar e deletar: algo</p>
        <div class="button">
          <a href="#">Visualizar</a>
        </div>
      </div>
    </div>
    <div class="card">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <div class="content">
        <h2>04</h2>
        <h3>Administrar algo</h3>
        <p>Cadastrar, listar, atualizar e deletar: algo</p>
        <div class="button">
          <a href="#">Visualizar</a>
        </div>
      </div>
    </div>
    <div class="card">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <div class="content">
        <h2>05</h2>
        <h3>Administrar algo</h3>
        <p>Cadastrar, listar, atualizar e deletar: algo</p>
        <div class="button">
          <a href="#">Visualizar</a>
        </div>
      </div>
    </div>
    <div class="card">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <div class="content">
        <h2>06</h2>
        <h3>Administrar algo</h3>
        <p>Cadastrar, listar, atualizar e deletar: algo</p>
        <div class="button">
          <a href="#">Visualizar</a>
        </div>
      </div>
    </div>
  </div>

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

  <script>
    const menu = document.getElementById('menu');
    const activeMenu = document.getElementById('openMenu');
    const closeMenu = document.getElementById('close');

    activeMenu.addEventListener('click', () => {
      menu.classList.add('active');
    });
    closeMenu.addEventListener('click', () => {
      menu.classList.remove('active');
    });
  </script>
</body>

</html>