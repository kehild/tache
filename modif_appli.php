<script type="text/javascript" src="./jquery.min.js"></script>
<?php
include_once "header.php";
include_once "bdd/webservice.php";
include_once "bdd/connexion.php";
?>
<body>
    <section>
	<div class="transbox">
            <p><?php 
                        $tache = new Webservice($db);
                        $tache->modif_description($db);

                        if (isset($_POST['Annuler'])) {
                                echo '<meta http-equiv="refresh" content="0;URL=detail.php?nom='.$_GET['nom'].'">';	
                        }
                        if (isset($_POST['Modifier'])) {
                                $tache->Update_description($db);
                        }
                    ?>
            </p>
        </div>
    </section>		
</body>
<?php
include_once "footer.php";
?>
