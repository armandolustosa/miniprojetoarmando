<!-- Página para cadastro de novos usuários. Armazena os dados (email e senha) em um arquivo de texto após realizar o hash da senha. -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
</head>

<body>
  <h2>Cadastro do Usuário</h2>
  <form action="" method="post">
    <p>
      <label for="idemail">Email:</label>
      <input type="text" name="email" id="idemail" required>
    </p>
    <p>
      <label for="idsenha">Senha:</label>
      <input type="text" name="senha" id="idsenha" required>
    </p>
    <button type="submit">Cadastrar</button>
  </form>

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

    echo "<p>Cadastro Realizado com Sucesso!</p>";
  }
  ?>
</body>

</html>