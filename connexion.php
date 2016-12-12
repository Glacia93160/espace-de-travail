<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="utf-8">
		<title>Diplôme	Interuniversitaire</title>
		
	<!-- Bootstrap -->
	
		<link href="css/provisoire.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet" >
		<link rel="shortcut icon" href="image/Logo_IUT_Villetaneuse.png"/>

		<script src="js/bootstrap-dropdown.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap.js"></script>
	</head>
		
	<body>

		<nav id="navi" class="navbar navbar-default navbar-fixed-top"> 
				
			<div class="container-fluid"> 
				
				<ul class="nav navbar-nav">
					<li><a href="Accueil.html"><img id="logo" src="image/Logo_IUT_Villetaneuse.png" alt="Accueil"></a></li>
					<li class="dropdown navigation">
						<a href="Formation.html" class="dropdown-toogle">Formation</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="Formation/GEA.html">Formations en Gestion, Comptabilité, Ressources Humaines, Management</a></li>
							<li><a href="Formation/CJ.html">Formations en Juridique, Notariat, Finance</a></li>
							<li><a href="Formation/INFO.html">Formations en Informatique, Systèmes, Logiciels</a></li>
							<li><a href="Formation/RT.html">Formations en Réseaux, Télécommunications</a></li>
							<li><a href="Formation/GEII.html">Formations en Électronique, Électricité, Informatique Industrielle, Nanotechnologies</a></li>
						</ul>
					</li>			
					<li class="navigation"><a href="Ressource.html">Ressource</a></li>
					<li class="navigation"><a href="Travail.html">Espace de travail</a></li>
					<li class="navigation"><a href="Rendez-vous.html">Rendez-vous</a></li>
					<li class="navigation"><a href="Actualite.html">Actualites</a></li>
					<li class="navigation"><a href="Forum.html">Forum</a></li>   
					<li class="navigation"><a href="connexion.php"><span class="glyphicon glyphicon-user"></span> Connexion</a></li>
				</ul>
					
				<div id="recherche">
					<form class="navbar-form navbar-left" role="search">
							
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Rechercher">
						</div>
								
						<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
					</form>
				</div>
					
			</div>
					
		</nav>
		
		<div class="container">
    
			<div class="row ">
			
				<div class="col-xs-4 col-md-offset-4 ">

					<form id="connexion" class="form" method="POST" action="">
						<h2 class="form-signin-heading">Connectez-vous :</h2>
						<label for="Email" class="sr-only">Adresse mail</label> 
						<input type="text" id="Email" class="form-control" placeholder="Adresse mail" required="" autofocus=""> 
						<label for="mdp" class="sr-only">Mot de passe</label> 
						<input type="password" id="mdpconnex" class="form-control" placeholder="Mot de passe" required="" name="motdepasse">
						<!-- <div class="checkbox"><label> <input type="checkbox" value="remember-me"> Remember me </label>
						</div>-->
						<input class="btn btn-lg btn-primary btn-block" type="submit"name="connexion" value="Se Connecter">
					</br>
					</br>
					 <CENTER>
					 	<p> Vous n'êtes pas encore inscrit cliquez <a href="formulaire.php">ici</a> !</p>
					 </CENTER>
					</form>
					
				</div>
				
			</div>
			
		</div>
		
		<hr class="featurette-divider">
		
		<footer class="main-footer">
			
			<div class="red-text text-center">
				<p><a href="#">Contacts</a> · <a href="#">Mentions légales</a></p>
				
				<a rel="nofollow" target="_blank"  href="https://www.facebook.com"><img src= "image/facebook_circle.png" width="40" height= "40" alt="connexion facebook"/></a>
				<a rel="nofollow" target="_blank"  href="https://twitter.com"><img src= "image/twitter_circle.png" width="40" height= "40" alt="connexion twitter"></a>
				<a rel="nofollow" target="_blank" href="https://mail.google.com"><img src= "image/gmail_circle.png" width="40" height= "40" alt="connexion gmail"/></a>
				<a rel="nofollow" target="_blank"  href="https://www.instagram.com/"><img src= "image/instagram_circle.png" width="40" height= "40" alt="connexion instrgram"/></a>
			</div>

		</footer>
	
	</body>
	
</html>
<?php

require('co.php');
{
	if(isset($_POST["connexion"]))
	{
	
		$mailconx =htmlspecialchars($_POST['emailconnex']);
		$mdpconx = htmlspecialchars($_POST['motdepasse']);

		if(trim($_POST['emailconnex']) != "" and trim($_POST['motdepasse']) != "" )
		{
				$mdp = sha1($_POST['motdepasse']);
				$req = $bd->prepare("SELECT * FROM membres where mail = :mail and motdepasse = :mdp ");
				$req->bindValue(':mail',$_POST['emailconnex']);
				$req->bindValue(':mdp',$mdp);
				$req->execute();
				$res = $req->fetch();
				if( $res != false)
				{					
					session_start();
					$_SESSION['email'] = $res['mail'];
					echo'<p> Bonjour, vous êtes connecté avec l\'adresse mail :'.$_SESSION['email'].' ! </p>';
					header("Location: Accueil.html");
				}

						
					
		else
			{
				echo "<p>Mauvais mail ou mot de passe ! </p>";
			}
		}
	else
			echo "<p>Tout les champs doivent être renseignés ! </p>";
	}

}
?>