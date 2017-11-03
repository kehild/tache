<?php
include_once "header.php";
include_once "bdd/connexion.php";
include_once "bdd/webservice.php";
?>

<body>
    <section>
	<div class="transbox">
            
        <?php
        $tache = new Webservice($db);
        $tache->total_termine($db);
        
        $tache->liste_tache_terminer($db);
        
        $tache = new Webservice($db);
        $tache->total_tache($db);
        
        ?>
            
            
            
            </br></br></br></br>
            <form method="post" action="index.php">
                <input type="submit" id="Retour" name="Retour" value="Retour">    
            </form>
        </div>
</section>		
</body>