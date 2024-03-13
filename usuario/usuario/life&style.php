<?php 
session_start();

require_once "../conexao.php";

if(!isset($_SESSION['logado'])){
  header("Location: ../index.php");
}


  $id = $_SESSION['id_usuario'];

 
       $sql = "SELECT * FROM noticias AS n INNER JOIN categorias AS c ON n.id_categoria = c.id_categoria  WHERE estado = '1' AND id_usuario = '$id'";
		   $result = $ligation->prepare($sql);
		   $result->execute();     
		   $data =  $result->fetchall(PDO::FETCH_ASSOC);

         $culture = false;
         $sports = false; 
         $entertainment = false;
         $life_style = false;
         $business= false;
         $political = false;   

        $array = array(); 

          if(count($data) > 0){
         


          for($l=0; $l<count($data); $l++){




             if($data[$l]['nome_categoria'] === 'culture'){
                if($culture === false){
                  $array[] = 'culture';
                  $culture = true;
             	} 
             }elseif($data[$l]['nome_categoria'] === 'sports'){
             	if($sports === false){
                  $array[] = 'sports';
                  $sports = true;
             	}     
             }elseif($data[$l]['nome_categoria'] === 'business'){
             	if($business === false){
                  $array[] = 'business';
                  $business = true;
             	}     
             }elseif($data[$l]['nome_categoria'] === 'entertainment'){
             	if($entertainment === false){
                  $array[] = 'entertainment';
                  $entertainment = true;
             	}     
             }elseif($data[$l]['nome_categoria'] === 'life & style'){
             	if($life_style === false){
                  $array[] = 'life & style';
                  $life_style = true;
             	}     
             }elseif($data[$l]['nome_categoria'] === 'political'){
             	if($political === false){
                  $array[] = 'political';
                  $political = true;
             	}     
             }

         }
     }


 ?>


<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>life&style</title>
    <?php require_once "../head.php";  ?>
</head>
<body>

<header>

<div class="navigation">
 	<div class="border-left"></div>
	 <div class="logo">
	 	<span id="text1">news</span>
	 	<span id="text2">press</span>
	 </div>

	 <nav>
       <ul class="menu">
	       <li><a href="home.php">Home</a></li>		
		       
          <?php foreach($array as $value){

             if($value === 'life & style'){
           ?>
            
	 	   <li>
	 	   	<a href="life&style.php" class="underline">
	 	   		<?= $value; ?> 	   			
	 	   	 </a>
	 	   </li>

      <?php }else{ ?> 
	 	 
	 	   <li>
	 	   	<a href="<?= $value.'.php';  ?>">
	 	   		<?= $value; ?>
	 	   			
	 	   	 </a>
	 	   </li>

       <?php } } ?>

          <li id="exit">
            <a href="../encerro.php">Sair</a>
          </li>
          
	 	</ul>

     <div class="mobile">
        <span></span>
        <span></span>
        <span></span>
     </div>

	 </nav>

	 <a href="../encerro.php">
	 	<button>Deseja sair</button>
	 </a>
	 	
 </div>

</header>

<section class="title">
    <h1>Life & Style</h1>
</section>

<div class="barra_bottom">
	<div class="barra_red">
		<div id="text1">Life & Style</div>
		<div id="icon">></div>
		<p id="text2">Estilo e vida cotidiana</p>
	</div>
</div>

<section class="category">

<?php 

       $sql = "SELECT * FROM noticias AS n INNER JOIN categorias AS c ON n.id_categoria = c.id_categoria  WHERE estado = '1' AND id_usuario = '$id' AND nome_categoria = 'life & style'";
		   $result = $ligation->prepare($sql);
		   $result->execute();     
		   $data =  $result->fetchall(PDO::FETCH_ASSOC);

     if(count($data) > 0){

    for($l=0; $l<count($data); $l++){

 ?>

  <div id="<?= $data[$l]['id_noticia'];  ?>" class="notice">
     <img id="img_notice" src="<?= $data[$l]['imagem']; ?>" alt="imagemNotice">
     <h1><?= $data[$l]['titulo_noticia']; ?></h1>
     <p><?= $data[$l]['texto_noticia']; ?></p>
  </div>

<?php } }  ?>

</section>


<?php require_once "../footer.php";  ?>

</body>
</html>