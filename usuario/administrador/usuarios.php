<?php 
session_start();

require_once "../conexao.php";


if(!isset($_SESSION['logado'])){
  header("Location: ../index.php");
}


 $sql = "SELECT * FROM usuarios WHERE estado = '1' AND painel = 'user'";

 $result = $ligation->prepare($sql);
 $result->execute();     
 $data =  $result->fetchall(PDO::FETCH_ASSOC);
       
 ?>



<!DOCTYPE html>
<html lang="pt">
<head>
  <title>usuarios</title>
  <?php  require_once "../headADM.php"; ?>
</head>
<body>



  <header class="header">
    <h1>ADM</h1>

    <ul class="menu_link">
        <li id="usuarios" >
            <a href="usuarios.php" class="underline">usuarios</a>
        </li>
        <li id="noticias">
            <a href="noticias_usuario.php">Noticias</a>
        </li>
        <li id="exit">
            <a href="../encerro.php">Sair</a>
        </li>
    </ul>  


  </header> 

<!--Navebar-->
<div class="navigation">
<ul>
  <li class="list active">
    <a href="usuarios.php">
      <span class="icon"><img src="img/perm_identity_white_24dp.svg"></span>
      <span class="title">Usuarios</span>
    </a>
  </li>
  <li class="list">
     <a href="noticias_usuario.php">
      <span class="icon"><img src="img/gerenciar.png"></span>
      <span class="title">Noticias</span>
    </a>
  </li>
  <li class="list">
    <a href="../encerro.php">
      <span class="icon"><img src="img/logout_white_24dp.svg"></span>
      <span class="title">Sair</span>
    </a>
  </li>
</ul> 

</div>




<div id="container">

<div id="info">

<div id="buttons">
   <a href="cadastrar_usuario.php"  id="adicionar">
    <button>Adicionar</button>
   </a>
</div>

<table  id="table">

  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Sobrenome</th>
      <th scope="col">E-mail</th>
      <th scope="col">Genero</th>
      <th scope="col">painel</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>

  <tbody>
      <?php 

      if(count($data) > 0){

       for($l=0; $l<count($data); $l++){

        ?>
     <tr> 
      <td><?= $data[$l]['nome']; ?></td>
      <td><?= $data[$l]['sobrenome']; ?></td>
      <td><?= $data[$l]['email']; ?></td>
      <td><?= $data[$l]['genero']; ?></td>
      <td><?= $data[$l]['painel']; ?></td>
      <td id="edit">
         <form action="editar_usuario.php" method="post">
          <input type="hidden" name="id_usuario" value="<?= $data[$l]['id_usuario']; ?>">
          <button id="edit1" type="submit">
          <img src="img/edit.png">
        </button>
        </form>
         
       <form action="apagar_usuario.php" method="post">
        <input type="hidden" name="id_usuario" value="<?= $data[$l]['id_usuario']; ?>">
          <button id="edit2" type="submit">
            <img src="img/apagar.png">
          </button>
       </form>
      </td>  
    </tr>

  <?php } ?>
 
   </tbody>

  <?php }else{ ?> 
  
  <tfoot>
    <tr>    
      <td class="center" colspan="6">Nenhum dado encontrado</td>
    </tr>
  </tfoot>

<?php } ?>

</table> 
</div>

</div>



</body>
</html>