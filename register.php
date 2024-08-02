<!-- Página para cadastro de novos usuários. Armazena os dados (email e senha) em um arquivo de texto após realizar o hash da senha. -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="favicon.ico" type="imagens/Novo-LOGO-01.ico">
  <link rel="stylesheet" href="css/login-register-error.css">
  <title>Cadastro</title>
</head>

<body>
  <main>
    <section class="parte1">
      <a href="index.php"><img src="imagens/Novo-LOGO-01.webp" alt="logo da Apple" width="80px"></a>
      <h1>Cadastro do Usuário</h1>
      <article class="texto">
        <p>Cadastre-se em nossa página preenchendo os campos abaixo com atenção.</p>
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
          <input type="submit" value="Cadastrar" class="enviar">
        </p>
      </form>
      <p class="texto-referencia">Já possui um Cadastro? Realize o Login <a href="login.php">aqui</a>.</p>
    </section>
    <br>

    <?php
  //  Página de Cadastro

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Criamos um hash (método de segurança criptografado) para proteger a senha, por meio da função password_hash(), que recebe como parâmetros a variável com a senha e o algoritmo que faz o hash
    $senhaHash = password_hash($senha, PASSWORD_BCRYPT);

    // Concatenamos o E-mail e o Hash da Senha em uma única variável
    // O `PHP_EOL` funciona como um <br>, ou seja, indica que ali é o final da linha
    $userData = $email . "," . $senhaHash . PHP_EOL;

    // Agora, armazenamos essa variável em uma "Base de Dados", que estamos simulando por meio do arquivo 'users.txt'. Para isso, utilizamos a função file_put_contents()
    // O `FILE_APPEND` verifica se o arquivo informado existe, caso não exista o arquivo é criado. Do contrário, o arquivo existente é sobrescrito normalmente
    file_put_contents('users.txt', $userData, FILE_APPEND);

    echo "<p>Cadastro Realizado com Sucesso! Agora, realize o Login <a href='login.php'>aqui</a>.</p>";
  }
  ?>

  </main>
  <footer>
    <p>&copy Criado por <a href="https://github.com/armandolustosa" target="_blank">Armando</a></p>
  </footer>
</body>

</html>