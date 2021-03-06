<script type="text/javascript" src="./jquery.min.js"></script>
<script type="text/javascript" src="./jquery.autocomplete.min.js"></script>
<script src="ckeditor/ckeditor.js"></script>

<?php
include_once 'bdd/connexion.php';
include_once 'bdd/webservice.php';
include_once 'header.php';

if (isset($_POST['saisir'])) {
    
	$tache = new Webservice($db);
	$tache->SaisieTache($db,$_POST['nom'],$_POST['type'],$_POST['tache'],$_POST['statut'],$_POST['niveau']);	
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
                    </br></br>
                    <textarea name="tache" rows="6" cols="60" id="editor1"></textarea>
                    </br>
                    <label for="statut">Statut de la Tache</label>
                    </br>
                    <select name="statut" id="statut">
                            <option value="A Faire">A Faire</option>
                            <option value="En Cours">En Cours</option> 
                            <option value="Terminé">Terminé</option>
                    </select>
                    </br>
					 <label for="niveau">Niveau de Priorité</label>
                    </br>
                    <select name="niveau" id="niveau">
                            <option value="1">1</option>
                            <option value="2">2</option> 
                            <option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
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
 CKEDITOR.replace( 'editor1' );
</script>
<?php
    include_once 'footer.php';
?>