<!-- Página de erro exibida quando as credenciais de login estão incorretas. -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login-register-error.css">
  <title>Erro de Login</title>
</head>

<body>
  <main>
    <section class="parte1">
      <a href="index.php"><img src="imagens/Novo-LOGO-01.webp" alt="logo da Apple" width="80px"></a>
      <h1>Faça o Login</h1>
      <article class="texto">
        <p>Preencha os dados com atenção para que o seu login seja efetivado.</p>
        <p class="texto-erro">E-mail ou senha incorretos.</p>
      </article>
    </section>
    <section class="parte2">
      <form action="" method="POST">
        <p>
          <label for="idmail">Email:</label>
          <br>
          <input type="email" name="email" id="idmail" placeholder="Entre com o seu Email" required>
        </p>
        <p>
          <label for="idsenha">Senha:</label>
          <br>
          <input type="password" name="senha" id="idsenha" placeholder="Entre com a sua Senha" required>
        </p>
        <p>
          <input type="submit" value="Entrar" class="enviar">
        </p>
      </form>
      <p class="texto-referencia">Ainda não possui um Cadastro? Realize-o <a href="register.php">aqui</a>.</p>
    </section>
  </main>
  <footer>
    <p>&copy Criado por <a href="https://github.com/armandolustosa" target="_blank">Armando</a></p>
  </footer>
</body>

</html>