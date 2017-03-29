


<?php require('head.php');?>
	<!-- Nom des onglets -->
		<title>Devoir</title>
		
<div class="container" style="margin : 100px">
		
<?php			
   /* if(!isset($_SESSION['connexion']))
	{
		header("Location:./../Connexion.php");
		exit();
	}
	//droit d'acces pour les stagiaires selon leur formation
	elseif ($_SESSION['categorie']=='stagiaire'  ) {
	    if($_SESSION['formation']=='MDI'){
	       header("Location:rMDI.php"); 
	    }
	    
	    elseif ($_SESSION['formation']=='GCRHM') {
	        header("Location:rGCRHM.php");
	    }
	    
	    elseif ($_SESSION['formation']=='JHF') {
	        header("Location:rJHF.php");
	    }
	    
	    elseif ($_SESSION['formation']=='ISL') {
	        header("Location:rISL.php");
	    }
	    
	    elseif ($_SESSION['formation']=='RT') {
	        header("Location:rRT.php");
	    }
	    
	    elseif ($_SESSION['formation']=='EEIIN') {
	        header("Location:rEEIIN.php");
	    }
	    
	}
	
	elseif ($_SESSION['categorie']=='Professeur') {
	    echo'<p>Vous êtes sur la formation '.$_SESSION['formation'].'. </p>';
	}
	
	*/
?>

<!--nav pour que les Professeurs peuvent regarder les fichiers de touts les formations-->
          <div class="col-md-4 sidebar ">
            <ul class="nav nav-default nav-stacked">
               <li><a href="rMDI.php">MDI</a></li>
               <li><a href="rGCRHM.php">GCRHM</a></li>
               <li><a href="rJHF.php">JNF</a></li>
               <li><a href="rISL.php">ISL</a></li>
               <li><a href="rRT.php">RT</a></li>
               <li><a href="rEEIIN.php">EEIIN</a></li>
                
                </ul>	
          </div>


      	 <div>
      	 	<h2>Bonjour! Vous pourriez importer votre fichier sur cette page. </h2>
      	 	
      	 	<p>Votre extension du fichier est obligatoirement à partir des extensions suivant : pdf, docx, odt, zip, doc.</p>
      	 	<p>La taille maximale de votre fichier est de 250M.</p>
           <!--la formulaire qui permet de deposer un fichier(value est la taille maxinum du fichier, on peut changer en fonction de la demande du client)-->
    		<form  action="upload_file.php" method="post" enctype="multipart/form-data">
     			<input type="hidden" name="MAX_FILE_SIZE" value="100000000000" />
				<br>
			<!-- choisir son Professeur-->	
				<p>  Les Professeurs : </p>
			<select name="Professeurs">
			<option value="tous" selected="selected"> --- </option>
			<?php try
					{
					$req = $bd->prepare('SELECT DISTINCT nom FROM user where categorie = "enseignat" and formation = :formt');
				     $req->bindValue(':format',$_SESSION['formation']);
				     $req->execute();
					while($res = $req->fetch(PDO::FETCH_NUM))
						echo '<option> '. $res[0] . '</option>'."\n";
					}
					catch(PDOException $e)
				{
				// On termine le script en affichant le num de l'erreur ainsi que le message 
    			die('<p> Erreur PDO[' .$e->getCode().'] : ' .$e->getMessage() . '</p>');
				}
	?>
	
		</select> 
				<!-- choisir son groupe -->	
				<p>  Les casses de depot des differents devoirs : </p>
			<select name="groupe">
			<option value="tous" selected="selected"> --- </option>
			<?php try
					{
					$req1 = $bd->prepare('SELECT DISTINCT groupe FROM user where formation = :formt');
				     $req1->bindValue(':format',$_SESSION['formation']);
				     $req1->execute();
					while($res1 = $req1->fetch(PDO::FETCH_NUM))
						echo '<option> '. $res1[0] . '</option>'."\n";
					}
					catch(PDOException $e)
				{
				// On termine le script en affichant le num de l'erreur ainsi que le message 
    			die('<p> Erreur PDO[' .$e->getCode().'] : ' .$e->getMessage() . '</p>');
				}
	?>
			</select> 
	
			</select> 
				<!-- choisir son depot de devoir -->	
				<p>  Les casses de depot des differents devoirs : </p>
			<select name="Professeurs">
			<option value="tous" selected="selected"> --- </option>
			<?php try
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
	?>
		

				<br>
     			<input type="file" name="file" class="btn btn-default btn btn-info"/>
      		 	<br>
      			<input type="submit" class="btn btn-info"/>
   			 </form>
  
    	 </div>
 </div>
<?php require('body.php');?>
<?php require('footer.php');?>



