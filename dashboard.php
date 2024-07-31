<!-- Página restrita que só pode ser acessada por usuários logados. Exibe uma mensagem de boas-vindas e o email do usuário. -->

<?php 
  // Ao iniciar a sessão, devemos verificar o estado de login do usuário para captar as suas informações, para continuar a partir da sessão passada já existente. Para isso, utilizamos a função session_start()
  session_start();

  // Agora, vamos verificar se o usuário está logado por meio da função isset(), que analisará se a variável 'email' está com valor já definido - aquele que definimos na página anterior. Caso não esteja logado, ele será direcionado para a página 'login.php' por meio da função header(), que deve vir junto com a chamada de saída 'exit'
  if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit;
  }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
</head>

<body>
  <h2>Bem-vindo ao Sitema</h2>
  <p>Você está logado como
    <!-- Devo chamar o E-mail cadastrado pelo usuário para que ele seja exibido como conteúdo pelo HTML, por isso uso a função htmlspecialchars() -->
    <?php echo htmlspecialchars($_SESSION['email']); ?>
  </p>
  <a href="logout.php">Logout</a>
</body>

</html>