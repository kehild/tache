﻿
<?php
include_once "header.php";
include_once "bdd/connexion.php";
include_once "bdd/webservice.php";
?>
<body>
	<section>
	<div class="transbox">	
            <h3>Liste des Applications</h3> 
            <?php
            $tache = new Webservice($db);
            $tache->listetache($db);
            
            ?>
            </br></br></br></br>
            <form method="post" action="">
                <input type="submit" id="tache" name="tache" value="Nouvelle Tache">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" id="appli" name="appli" value="Nouvelle Application">
            </form>
            
            <?php
            
            if(isset($_POST['tache'])){
              echo '<meta http-equiv="refresh" content="0;URL=saisie.php">';  
            }
            if(isset($_POST['appli'])){
                echo '<meta http-equiv="refresh" content="0;URL=saisie_appli.php">';
            }
            
            ?>
            
            
        </div>
	</section>		
</body>

<?php
        include_once 'footer.php';
?>