<?php require('head.php');?>
	<!-- Nom des onglets -->
		

<div class="container" style="margin : 100px">
    <h1>Formations en Électronique, Électricité, Informatique Industrielle, Nanotechnologies</h1>
    <?php			
	if(!isset($_SESSION['connexion']))
	{
		header("Location:./../Connexion.php");
		exit();
	}
	// Il y a que les professeurs peuvent d'acceder aux tous les ressources de touts les formations
	elseif ($_SESSION['type']=='Professeur' || $_SESSION['type']=='Administrateur' ) { 
	    echo '<div class="col-md-4 sidebar ">
            <ul class="nav nav-default nav-stacked">
              
               <li><a href="create.php">EEIIN</a></li>
              
                 </ul>	
          </div><br>';
        echo '</a><a href="Ressource.php">AJOUTER <span class="glyphicon glyphicon-plus"></span><br>'; 

	}elseif($_SESSION['type']=="etudiant" || $_SESSION['type']=="Ancien_Etudiant"){
	    echo "<script> {window.alert('L'accès à cette page vous est interdite! ');location.href='devoir.php'} </script>";
	    
	}
?>

          

  <ul style="list-style-type:none">
      
<div>
      
<?php

//afficher les fichiers 
$nom='rEEIIN.php';
if ($_SESSION['formation'='Electronique']){

$dir = '/upload/rEEIIN/Electronique/';
if(is_dir($dir)) {
        if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
                if($file!="." && $file!="..") {
                    if($_SESSION['type']=='Professeur' && $_SESSION['formation']=='EEIIN'){
                       echo "<li><a href='./supprimer.php?name={$file}&url={$dir}&formation={$nom}'><span class=\"glyphicon glyphicon-remove\"></span></a><a href='".$dir.$file."'>".$file."</a></li>"; 
                    }
                    else{
                    echo "<li><a href='".$dir.$file."'>".$file."</a></li>";
                    }
                }                                                                            
        }
        closedir($dh);
     }
}
}
if ($_SESSION['formation'='Electricite']){

$dir = '/upload/rEEIIN/Electricite/';
if(is_dir($dir)) {
        if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
                if($file!="." && $file!="..") {
                    if($_SESSION['type']=='Professeur' && $_SESSION['formation']=='EEIIN'){
                       echo "<li><a href='./supprimer.php?name={$file}&url={$dir}&formation={$nom}'><span class=\"glyphicon glyphicon-remove\"></span></a><a href='".$dir.$file."'>".$file."</a></li>"; 
                    }
                    else{
                    echo "<li><a href='".$dir.$file."'>".$file."</a></li>";
                    }
                }                                                                            
        }
        closedir($dh);
     }
}
}

if ($_SESSION['formation'='Informatique Industrielle']){

$dir = '/upload/rEEIIN/Informatique Industrielle/';
if(is_dir($dir)) {
        if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
                if($file!="." && $file!="..") {
                    if($_SESSION['type']=='Professeur' && $_SESSION['formation']=='EEIIN'){
                       echo "<li><a href='./supprimer.php?name={$file}&url={$dir}&formation={$nom}'><span class=\"glyphicon glyphicon-remove\"></span></a><a href='".$dir.$file."'>".$file."</a></li>"; 
                    }
                    else{
                    echo "<li><a href='".$dir.$file."'>".$file."</a></li>";
                    }
                }                                                                            
        }
        closedir($dh);
     }
}
}
if ($_SESSION['formation'='Nanotechnologie']){

$dir = '/upload/rEEIIN/Nanotechnologie/';
if(is_dir($dir)) {
        if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
                if($file!="." && $file!="..") {
                    if($_SESSION['type']=='Professeur' && $_SESSION['formation']=='EEIIN'){
                       echo "<li><a href='./supprimer.php?name={$file}&url={$dir}&formation={$nom}'><span class=\"glyphicon glyphicon-remove\"></span></a><a href='".$dir.$file."'>".$file."</a></li>"; 
                    }
                    else{
                    echo "<li><a href='".$dir.$file."'>".$file."</a></li>";
                    }
                }                                                                            
        }
        closedir($dh);
     }
}
}
?>
</ul>
</div>
 </div>
<?php require('body.php');?>
<?php require('footer.php');?>
