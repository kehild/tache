<?php
include_once 'bdd/connexion.php';
include_once 'bdd/webservice.php';
include_once 'header.php';

if (isset($_POST['saisir'])) {
    
	$tache = new Webservice($db);
	$tache->SaisieApplication($db,$_POST['nom'],$_POST['description']);	
}

if (isset($_POST['Annuler'])){   
    echo '<meta http-equiv="refresh" content="0;URL=index.php">';   
}

?>
<body>
	<section>
	<div class="transbox">	
            <div id="saisie">
              <form method="post" action="">
                    </br>
                    <label for="nom">Nom Application</label>
                    </br>
                    <input type="text" id="nom" name="nom">
                    </br>
                    <label for="description">Description</label>
                     </br>
                    <textarea name="description" rows="6" cols="60"></textarea>
                    </br>
                    <input type="submit" id="Annuler" name="Annuler" value="Annuler">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" id="Valider" name="saisir" value="Valider"> 
              </form>
            </div>
           </div>
	</section>		
</body>
<?php
    include_once 'footer.php';
?>

