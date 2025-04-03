<?php
session_start();
require_once "conection.php";

if (isset($_POST['login'])) {
  global $passwordCripto;
  $errors = array();
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

  $consult = $conection->prepare("SELECT * FROM users WHERE u_email = :email");
  $consult->bindParam(":email", $email, PDO::PARAM_STR);
  $consult->execute();
  $user = $consult->fetchall(PDO::FETCH_ASSOC)[0];
  

  if (count($user) > 0) {
    $hash = $user['u_password'];
  
    if (password_verify($password, $hash))
      $passwordCripto = $hash;
  }

  $sql = "SELECT * FROM users WHERE u_email = :email AND 
    u_password = :_password";
  $consult = $conection->prepare($sql);
  $consult->bindParam(":email", $email, PDO::PARAM_STR);
  $consult->bindParam(":_password", $passwordCripto, PDO::PARAM_STR);
  $consult->execute();
  $data = $consult->fetchall(PDO::FETCH_ASSOC)[0];
  
  if (empty($email) || empty($password)) {
    $errors[] = "<span>O campo login e senha precisa ser preenchido</span>";
  } else {
    if (empty($data)) {
      $errors[] = "<span>Usuário enexistente</span>";
    } else {
      if ($data['u_password'] === $passwordCripto && $data['u_email'] === $email && $data['u_painel'] === 'admin') {
        $_SESSION['logged'] = true;
        $_SESSION['adm_id'] = $data['u_id'];
        header('Location: administrador/usuarios.php');

      } elseif ($data['u_password'] === $passwordCripto && $data['u_email'] === $email && $data['u_painel'] === 'user') {
        $_SESSION['logged'] = true;
        $_SESSION['user_id'] = $data['u_id'];
        header('Location: usuario/home.php');
      }
    }
  }
} 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link rel="stylesheet" type="text/css" href="css/media.css">
</head>
<body>
  <div id="formlog">
    <div class="logo">
      <span id="text1">news</span>
      <span id="text2">press</span>
    </div>
    <?php
    if (!empty($errors)) {
      foreach ($errors as $value)
        echo "<h3 style='margin-top:10px'> $value </h3><br>";
    }
    ?>
    <form id="formulario" action="index.php" method="post">
      <p>
        <label>E-mail</label><br>
        <input type="text" id="textemail" name="email" placeholder="informe o seu e-mail">
      </p>

      <p>
        <label>Password</label><br>
        <input type="password" id="textpassword" name="password" placeholder="Digite uma senha">
      </p>

      <p>
        <input type="submit" name="login" value="Entrar">
      </p>
    </form>
  </div>
</body>
</html>             