
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
			   
			<?php
				$tache->tache_importante($db);
			?>
            
            
        </div>
	</section>		
</body>

<?php
        include_once 'footer.php';
?>