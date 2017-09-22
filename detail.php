<?php
include_once 'bdd/connexion.php';
include_once 'bdd/webservice.php';
include_once 'header.php';
?>

<body>
    <section>
	<div class="transbox">
            <h3>Nom de l'application : <?php echo $_GET['nom']; ?></h3>
            </br>
            <h3>Description de l'application</h3>
            <?php
            $tache = new Webservice($db);
            $tache->description_application($db);         
            ?>
            <h3>Nouveau</h3>
            <?php
            $tache = new Webservice($db);
            $tache->detail_tache_nouveau($db);
            ?>
            </br>
            <h3>Amélioration</h3>
            <?php
            $tache->detail_tache_amelioration($db);
            ?>
            </br>
            <h3>Correction</h3>
            <?php
            $tache->detail_tache_correction($db);
            ?>
            </br>
            <h3>Supression</h3>
            <?php
            $tache->detail_tache_supression($db);
            ?>
            
            <?php
                /* Nouveau */
            
            	if (isset($_GET['id1'])){
                    $tache->DeleteNouveau($db);
		}
                
                /* Amélioration */
                
                if (isset($_GET['id2'])){
                    $tache->DeleteAmelioration($db);
		} 
                
                /* Correction */
                
                if (isset($_GET['id3'])){
                    $tache->DeleteCorrection($db);
		} 
                
                /* Suppresssion */
                
                if (isset($_GET['id4'])){
                    $tache->DeleteSuppression($db);
		}           
            
            ?>
            
            </br></br></br></br>
            <form method="post" action="index.php">
                <input type="submit" id="Retour" name="Retour" value="Retour">    
            </form>
        </div>
</section>		
</body>
<?php
    include_once 'footer.php';
?>