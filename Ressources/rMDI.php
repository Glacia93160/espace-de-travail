
<?php require('head.php');?>
	<!-- Nom des onglets -->
		

<div class="container" style="margin : 100px">
    <h1>Formation Modulaire et Diplômante Interuniversitaire </h1>
	 <?php require('enseignant.php');?>

  <ul style="list-style-type:none">
      
<?php
//la liste des fichiers
$nom='rMDI.php';
$dir = 'upload/rMDI/';
if(is_dir($dir)) {
        if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
                if($file!="." && $file!="..") {
                echo "<li><a href='".$dir.$file."'>".$file."</a><a href='./supprimer.php?name={$file}&url={$dir}&formation={$nom}'><span class=\"glyphicon glyphicon-remove\"></span></a></li>";
            }                                                                            
        }
        closedir($dh);
     }
}
?>
</ul>
 </div>
<?php require('body.php');?>
<?php require('footer.php');?>
