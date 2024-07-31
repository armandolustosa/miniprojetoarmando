<!-- Página para login de usuários registrados. Verifica as credenciais contra os dados armazenados e inicia uma sessão se o login for bem-sucedido. -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="favicon.ico" type="imagens/Novo-LOGO-01.ico">
  <link rel="stylesheet" href="css/login.css">
  <title>Login</title>
</head>

<body>
  <main>
    <section class="parte1">
      <img src="imagens/Novo-LOGO-01.webp" alt="logo da Apple" width="80px">
      <h1>Faça o Login</h1>
      <article class="texto">
        <p>Preencha os dados com atenção para que o seu login seja efetivado.</p>
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
          <input type="text" name="senha" id="idsenha" placeholder="Entre com a sua Senha" required>
        </p>
        <p>
          <input type="submit" value="Entrar" class="enviar">
        </p>
      </form>
    </section>
    <br>
    <p>Ainda não possui um Cadastro? Realize-o <a href="register.php">aqui</a>.</p>

    <?php 
    // Ao iniciar a sessão, devemos gerenciar o estado de login do usuário para captar as suas informações, para disponibilizá-las na próxima sessão. Para isso, utilizamos a função session_start()
    session_start();
    
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


        // Verifamos se o E-mail e a Senha digitados pelo usuário estão de acordo com os valores cadastrados
        if ($email == $emailArmazenado && password_verify($senha, $senhaHashArmazenada)) {

          // Caso esteja tudo certo, o valor da variável do 'email', que antes era o digitado pelo usuário, é confirmado e reatribuído
          // O '$_SESSION[]' é uma Variável do tipo Array, a qual guarda todas as variáveis da sessão, que estão disponívies para o script atual
          $_SESSION['email'] = $email;

          $loginBemSucessido = true;

          // Por fim, o usuário será direcionado para a página 'dashboard.php' por meio da função header(), que deve vir junto com a chamada de saída 'exit', visto que abrirá uma nova página no lugar da anterior
          header('Location: dashboard.php');
          exit;
        }

        // Caso o login falhe, o usuário será direcionado para a página 'erro.php' por meio da função header(), que deve vir junto com a chamada de saída 'exit'
        if (!$loginBemSucessido) {
          header('Location: error.php');
          exit;
        }
      }
    }
  ?>

  </main>
  <footer>
    <p>&copy Criado por <a href="https://github.com/armandolustosa" target="_blank">Armando</a></p>
  </footer>
</body>

</html>