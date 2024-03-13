<?php


require_once "conexao.php";


session_start();
   

   if(isset($_POST['enviar-dados']) ){
      
      global $passwordCripto;
      $erros = array();
       
      $email = filter_input(INPUT_POST,'txtemail',FILTER_SANITIZE_EMAIL);

      $password = filter_input(INPUT_POST,'txtpassword',FILTER_SANITIZE_SPECIAL_CHARS); 
       

       $conection = $ligation->prepare("SELECT * FROM usuarios WHERE email = '$email'");
       $conection->execute();
       $array_usuario = $conection->fetchall(PDO::FETCH_ASSOC);
 

      if (count($array_usuario)  > 0){
          $array_usuario = $array_usuario[0];
           $estado = $array_usuario['senha']; 
          
      if(password_verify($password,$estado)){
           $passwordCripto = $estado;
       }
 

      }
     
     
      $sql = "SELECT * FROM usuarios WHERE email LIKE '$email' AND 
       senha LIKE '$passwordCripto'";
      $res = $ligation->prepare($sql);
      $res->execute();     
      $dados =  $res->fetchall(PDO::FETCH_ASSOC);


      if(empty($email) || empty($password)){
        $erros[] = "<span>O campo login e senha preecisa ser preenchido</span>";
      }else{
    
       if(empty($dados)){
            $erros[] = "<span>Usuário enexistente</span>";
        }else {
               
               $dados = $dados[0];

                if($dados['senha'] === $passwordCripto && $dados['email'] === $email && $dados['painel'] === 'admin'){
                        $_SESSION['logado'] = true;
                        $_SESSION['id_adm'] = $dados['id_usuario'];  
                  header('Location: administrador/usuarios.php');

                }elseif($dados['senha'] === $passwordCripto && $dados['email'] === $email && $dados['painel'] === 'user'){
                        $_SESSION['logado'] = true;
                        $_SESSION['id_usuario'] = $dados['id_usuario'];
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
        if(!empty($erros)){
          foreach($erros as $value){
            echo "<h3 style='margin-top:10px'> $value </h3><br>";
          }
        } 
        ?>
      <form id="formulario" action="index.php" method="post">
         <p>
           <label>E-mail</label><br>
           <input type="text" id="textemail" name="txtemail" placeholder="informe o seu e-mail">
         </p>

         <p>
          <label>Password</label><br>
          <input type="password" id="textpassword"
        name="txtpassword" placeholder="Digite uma senha">
         </p> 

         <p>
          <input type="submit" name="enviar-dados" value="Entrar">
         </p>
      </form>
   </div>
</body>
</html>