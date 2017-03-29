<?php require('head.php');?>
<?php require('body.php');?>
<?php
try{
  if ($_FILES["file"]["error"] > 0)//verifier l'utilisateur avait choisi un fichier
  {
     echo "<script> {window.alert('Aucun fichier choisi');location.href='Ressource.php'} </script>"; 
  
  }
  else
  {
  $nomOrigine = $_FILES['file']['name'];
  $elementsChemin = pathinfo($nomOrigine);
  $extensionFichier = $elementsChemin['extension'];
  $extensionsAutorisees = array("pdf", "docx","odt", "zip","doc"); //possibilite de rajouter des autres extensions 
     //interdit les extensions non accordes
     if (!(in_array($extensionFichier, $extensionsAutorisees))) { 
            
        echo "<script> {window.alert('Le fichier n\'a pas l\'extension attendue');location.href='Ressource.php'} </script>"; 
           
      } else {    
          
          
          //verifier que le dossier existe, sinon on cree un
	       	if (!file_exists('devoir/'.$_GET['formation'].'/')
                {
               		mkdir('devoir/'.$_GET['formation'].'/');   
               		if (!file_exists('devoir/'.$_GET['formation'].'/'.$_GET['title_devoir'].'/')
                {
               		    mkdir('devoir/'.$_GET['formation'].'/'.$_GET['title_devoir'].'/');  
               		    if (!file_exists('devoir/'.$_GET['formation'].'/'.$_GET['title_devoir'].'/'.$_GET['groupe'].'/')
                     {
               		        mkdir('devoir/'.$_GET['formation'].'/'.$_GET['title_devoir'].'/'.$_GET['groupe'].'/');   
  		                  }
  		             }
  		     }
               //verifier que l'existence du fichier
         if (file_exists('devoir/'.$_GET['formation'].'/'.$_GET['title_devoir'].'/'.$_GET['groupe'].'/' . $_FILES['file']['name']))
                {
                 	echo "<script> {window.alert('Un fichier du même nom existe déjà');location.href='Ressource.php'} </script>";    
  
                }
           	 else
                 {
                  //enregistre les fichiers avec leur dossier correspendant
                 	move_devoired_file($_FILES["file"]["tmp_name"],'devoir/'.$_GET['formation'].'/'.$_GET['title_devoir'].'/'.$_GET['groupe'].'/'. $_FILES["file"]["name"]);
                   	 echo "Stored in: " . 'devoir/'.$_GET['formation'].'/'.$_GET['title_devoir'].'/'.$_GET['groupe'].'/' . $_FILES["file"]["name"];
 
                 }
            }
  
         
		//annonce + retour à la page 
		echo "<script> {window.alert('Votre fichier est enregistré ');location.href='Ressource.php'} </script>";
  /*echo"<br />";
            echo "devoir: " . $_FILES["file"]["name"] . "<br />";
            echo "Type: " . $_FILES["file"]["type"] . "<br />";
            echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
            echo "<center> <a href=Ressource.php>continue</a></center>";*/
  	}         
}
 
			catch(PDOException $e)
			{
				die('<div> Erreur : ' . $e->getMessage() . '</div></body></html>');
			}
 
?>

<?php require('footer.php');?>