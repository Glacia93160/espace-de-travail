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
try
					{
					$req2 = $bd->prepare('SELECT DISTINCT devoir FROM devoir_create where type = :prof and groupe = :gro and formation = :formt');
					 $req2->bindValue(':prof',$_GET['Professeurs']);
				     $req2->bindValue(':gro',$_GET['groupe']);
				     $req2->bindValue(':format',$_SESSION['formation']);
				     $req2->execute();
					while($res2 = $req2->fetch(PDO::FETCH_NUM))
						echo '<option> '. $res2[0] . '</option>'."\n";
					}
					catch(PDOException $e)
				{
				// On termine le script en affichant le num de l'erreur ainsi que le message 
    			die('<p> Erreur PDO[' .$e->getCode().'] : ' .$e->getMessage() . '</p>');
				}
//afficher les fichiers 
$nom='liste.php';
if ($_SESSION['formation']='Electronique']){

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


?>
</ul>
</div>
 </div>
<?php require('body.php');?>
<?php require('footer.php');?>
