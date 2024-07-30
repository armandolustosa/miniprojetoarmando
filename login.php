<!-- Página para login de usuários registrados. Verifica as credenciais contra os dados armazenados e inicia uma sessão se o login for bem-sucedido. -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>
  <h2>Login</h2>
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
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $email = $_POST['email'];
      $senha = $_POST['senha'];

      // Devemos ler os dados da "Base de Dados", que estamos simulando por meio do arquivo 'users.txt', e armazená-los em um Array
      // O `FILE_IGNORE_NEW_LINES` faz com que a leitura ignore as linhas em branco
      $usuarios = file('users.txt', FILE_IGNORE_NEW_LINES);

      $loginBemSucessido = false;

      // Vamos acessar cada item da lista, ou seja, cada usuário do Array $usuarios, e separar o E-mail e o Hash da Senha, que antes estavam juntos e armazená-los em duas variáveis diferentes
      foreach ($usuarios as $usuario) {
        list($emailArmazenado, $senhaHashArmazenada) = explode(',', $usuario);


        // Verifamos se o E-mail e a Senha estão de acordo com os valores digitados pelo usuário
        if ($email == $emailArmazenado && password_verify($senha, $senhaHashArmazenada)) {
          $_SESSION['email'] = $email;
        }
      }
    }
  ?>
</body>

</html>