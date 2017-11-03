<script type="text/javascript" src="./jquery.min.js"></script>
<script type="text/javascript" src="./jquery.autocomplete.min.js"></script>

<?php
include_once 'bdd/connexion.php';
include_once 'bdd/webservice.php';
include_once 'header.php';

if (isset($_POST['saisir'])) {
    
	$tache = new Webservice($db);
	$tache->SaisieTache($db,$_POST['nom'],$_POST['type'],$_POST['tache'],$_POST['statut']);	
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
                    <label for="type">Type de Tache</label>
                    </br>
                    <select name="type" id="type">
                            <option value="Nouveau">Nouveau</option>
                            <option value="Amelioration">Amélioration</option> 
                            <option value="Correction">Correction</option>
                            <option value="Suppression">Suppression</option>
                    </select>
                     </br>
                     <label for="tache">Tache</label>
                     </br>
                    <textarea name="tache" rows="6" cols="60"></textarea>
                    </br>
                    <label for="statut">Statut de la Tache</label>
                    </br>
                    <select name="statut" id="statut">
                            <option value="A Faire">A Faire</option>
                            <option value="En Cours">En Cours</option> 
                            <option value="Terminé">Terminé</option>
                    </select>
                    </br>
                    <input type="submit" id="Annuler" name="Annuler" value="Annuler">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" id="Valider" name="saisir" value="Valider"> 
              </form>
            </div>
            </div>
	</section>		
</body>

<script>
$(document).ready(function() {
    $('#nom').autocomplete({
        serviceUrl: 'auto.php',
        dataType: 'json'
    });
});
</script>
<?php
    include_once 'footer.php';
?>