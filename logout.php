<!-- Script para finalizar a sessão do usuário, efetivando o logout e redirecionando-o para a página de login. -->

<?php 
  // Ao iniciar a sessão, devemos verificar o estado de login do usuário para captar as suas informações, para continuar a partir da sessão passada já existente. Para isso, utilizamos a função session_start()
  session_start();

  // Como o usuário encerrará a sua sessão, devemos remover os seus dados da memória da sessão por meio da função session_unset()
  session_unset();

  // Também é importante, após a exclusão dos dados, destruir a sessão por meio da função session_destroy()
  session_destroy();

  // Por fim, direcionaremos o usuário para a página 'login.php' através da função header(), que deve vir junto com a chamada de saída 'exit'
  header('Location: login.php');
  exit;
?>