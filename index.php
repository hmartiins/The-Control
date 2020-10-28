<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>The Control</title>
  <link rel="stylesheet" href="vars.css">
  <link rel="stylesheet" href="index.css">
</head>

<body>
  <div class="container">
    <div class="headerImage">
      <img src="src/assets/logoilustrativa.png" alt="logo">
    </div>
    <div class="content">
      <h1>Login</h1>
      <div class="input-group">
        <label class="input-underlined">
          <input required id="username">
          <span class="input-label">Usuário</span>
        </label>
      </div>
      <div class="input-group">
        <label class="input-underlined">
          <input type="password" required id="password">
          <span class="input-label">Senha</span>
        </label>
      </div>
      <div class="button-group">
        <button onclick="handleLogin()">
          Entrar
        </button>
      </div>
    </div>
  </div>
  <script>
    function redirectPage() {
      window.location = 'src/pages/mainControl.php';
    }

    function handleLogin() {
      const username = document.getElementById('username');
      const password = document.getElementById('password');

      if (username.value === 'admin' && password.value === 'admin') {
        redirectPage();
      } else {
        alert('Credenciais erradas, tente novamente');
      }
    }
  </script>
</body>

</html>