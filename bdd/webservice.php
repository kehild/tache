<?php
class Webservice{
  private $_db; // Instance de PDO

  public function __construct($db){
    $this->setDb($db);
  }
  
    public function setDb(PDO $db){
    $this->_db = $db;
  }
  
  public function listetache($db){
      
                        $stmt = $db->prepare("SELECT nom,COUNT(nom) FROM appli group by nom"); 
			$stmt->execute();
					
                        echo "<table id='dernier' align='center'>";
			
                            echo "<tr><th>"; echo "Nom Application"; echo "</th>";
                            echo "<th>"; echo "Nombre de tache"; echo "</th>";
                            echo "<th>"; echo "Voir le Détail"; echo "</th></tr>";
                        
			foreach(($stmt->fetchAll()) as $donnees){
							
                            echo "<tr><th>"; echo $donnees['nom']; echo "</th>";
                            echo "<th>"; echo $donnees['COUNT(nom)']; echo "</th>";
                            echo "<th>"; echo stripslashes('<a href="detail.php?nom='.$donnees['nom'].'"><img src="image/detail.png"></a>'); echo "</th>"; echo "</th></tr>";
                        
  }
  			echo "</table>";
}

  public function detail_tache_nouveau($db){
      
      		$stmt = $db->prepare("SELECT * FROM appli where nom='".$_GET['nom']."' and type='Nouveau'"); 
		$stmt->execute();
					
                echo "<table id='dernier' align='center'>";
               
		foreach(($stmt->fetchAll()) as $donnees){
                    		
			echo "<tr><th>"; echo $donnees['tache']; echo "</th>";
                        echo "<th>"; echo stripslashes('<a href="modif_tache.php?id5='.$donnees['id'].'&nom='.$_GET['nom'].'"><img src="image/modifier.png"></a>'); echo "</th>";
			echo "<th>"; echo '<a href="?id1='.$donnees['id'].'&nom='.$_GET['nom'].'"><img src="image/delete.png"></a>'; echo "</th></tr>";                        
                }
                
                echo "</table>";
  }
  
    public function detail_tache_amelioration($db){
      
      		$stmt = $db->prepare("SELECT * FROM appli where nom='".$_GET['nom']."' and type='Amelioration'"); 
		$stmt->execute();
		                    
                echo "<table id='dernier' align='center'>";
                        
		foreach(($stmt->fetchAll()) as $donnees){
			
			echo "<tr><th>"; echo $donnees['tache']; echo "</th>";
                        echo "<th>"; echo stripslashes('<a href="modif_tache.php?id5='.$donnees['id'].'&nom='.$_GET['nom'].'"><img src="image/modifier.png"></a>'); echo "</th>";
			echo "<th>"; echo '<a href="?id2='.$donnees['id'].'&nom='.$_GET['nom'].'"><img src="image/delete.png"></a>'; echo "</th></tr>";
                        
                }
  
            	echo "</table>";
    }
  
      public function detail_tache_correction($db){
      
      		$stmt = $db->prepare("SELECT * FROM appli where nom='".$_GET['nom']."' and type='Correction'"); 
		$stmt->execute();
					
                echo "<table id='dernier' align='center'>";
			                       
		foreach(($stmt->fetchAll()) as $donnees){
			
			echo "<tr><th>"; echo $donnees['tache']; echo "</th>";
                        echo "<th>"; echo stripslashes('<a href="modif_tache.php?id5='.$donnees['id'].'&nom='.$_GET['nom'].'"><img src="image/modifier.png"></a>'); echo "</th>";
			echo "<th>"; echo '<a href="?id3='.$donnees['id'].'&nom='.$_GET['nom'].'"><img src="image/delete.png"></a>'; echo "</th></tr>";
                        
                }
                echo "</table>";
  }
  
        public function detail_tache_supression($db){
      
      		$stmt = $db->prepare("SELECT * FROM appli where nom='".$_GET['nom']."' and type='Suppression'"); 
		$stmt->execute();
					
                echo "<table id='dernier' align='center'>";
			                       
		foreach(($stmt->fetchAll()) as $donnees){
			
			echo "<tr><th>"; echo $donnees['tache']; echo "</th>";
                        echo "<th>"; echo stripslashes('<a href="modif_tache.php?id5='.$donnees['id'].'&nom='.$_GET['nom'].'"><img src="image/modifier.png"></a>'); echo "</th>";
			echo "<th>"; echo '<a href="?id4='.$donnees['id'].'&nom='.$_GET['nom'].'"><img src="image/delete.png"></a>'; echo "</th></tr>";
               
                }
                echo "</table>";
  }
  
    public function SaisieTache($db,$nom,$type,$tache){
		
		try {	
			
                        $nom = $_POST['nom'];
                        $nom = str_replace("'", "\'", $nom);
			$nom = str_replace("’", " ", $nom);           
                        
			$tache = $_POST['tache'];
			$tache = str_replace("'", "\'", $tache);
			$tache = str_replace("’", " ", $tache);
			
			$sql = "Insert INTO appli (nom,tache,type) VALUES ('$nom','$tache','$type')";
			$db->exec($sql);
			echo "Insertion réussi";

			}
			catch(Exception $e){
				
				echo("<h1>Erreur : Base de données </h1>");
				die('Erreur : ' .$e->getMessage());
			
			}
  } 
  
      public function SaisieApplication($db,$nom,$description){
		
		try {	
			
                        $nom = $_POST['nom'];
                        $nom = str_replace("'", "\'", $nom);
			$nom = str_replace("’", " ", $nom);           
                        
			$description = $_POST['description'];
			$description = str_replace("'", "\'", $description);
			$description = str_replace("’", " ", $description);
			
			$sql = "Insert INTO liste_appli (nom,description) VALUES ('$nom','$description')";
			$db->exec($sql);
			echo "Insertion réussi";

			}
			catch(Exception $e){
				
				echo("<h1>Erreur : Base de données </h1>");
				die('Erreur : ' .$e->getMessage());
			
			}
  } 
  
    public function description_application($db){
      
      		$stmt = $db->prepare("SELECT * FROM liste_appli where nom='".$_GET['nom']."'"); 
		$stmt->execute();
					
                echo "<table id='dernier' align='center'>";
			               
		foreach(($stmt->fetchAll()) as $donnees){
			
			echo "<tr><th>"; echo $donnees['description']; echo "</th>";
                        echo "<th>"; echo stripslashes('<a href="modif_appli.php?nom='.$donnees['nom'].'"><img src="image/modifier.png"></a>'); echo "</th></tr>";
                }
                
                echo "</table>";
  }
  
  public function DeleteNouveau($db){

	try {
	
		$stm = $db->prepare("delete from appli where id='".$_GET['id1']."'"); 
		$stm->execute();
				
	}catch(Exception $e){
				
		echo("<h1>Erreur : Base de données </h1>");
		die('Erreur : ' .$e->getMessage());
		
	}
	echo '<meta http-equiv="refresh" content="0;URL=detail.php?nom='.$_GET['nom'].'">';
}

  public function DeleteAmelioration($db){

	try {
	
		$stm = $db->prepare("delete from appli where id='".$_GET['id2']."'"); 
		$stm->execute();
				
	}catch(Exception $e){
				
		echo("<h1>Erreur : Base de données </h1>");
		die('Erreur : ' .$e->getMessage());
		
	}
	echo '<meta http-equiv="refresh" content="0;URL=detail.php?nom='.$_GET['nom'].'">';
}
  
  public function DeleteCorrection($db){

	try {
	
		$stm = $db->prepare("delete from appli where id='".$_GET['id3']."'"); 
		$stm->execute();
				
	}catch(Exception $e){
				
		echo("<h1>Erreur : Base de données </h1>");
		die('Erreur : ' .$e->getMessage());
		
	}
	echo '<meta http-equiv="refresh" content="0;URL=detail.php?nom='.$_GET['nom'].'">';
}

  public function DeleteSuppression($db){

	try {
	
		$stm = $db->prepare("delete from appli where id='".$_GET['id4']."'"); 
		$stm->execute();
				
	}catch(Exception $e){
				
		echo("<h1>Erreur : Base de données </h1>");
		die('Erreur : ' .$e->getMessage());
		
	}
	echo '<meta http-equiv="refresh" content="0;URL=detail.php?nom='.$_GET['nom'].'">';
}
  
  public function modif_description($db){
      
      
                $stmt = $db->prepare("SELECT * FROM liste_appli where nom='".$_GET['nom']."'"); 
		$stmt->execute();
					
		foreach(($stmt->fetchAll()) as $toto){
		?>
		    <div id="saisie">
                        <form method="post" action="">
                              </br>
                              <label for="nom">Nom Application</label>
                              </br>
                              <input type="text" id="nom" name="nom" value="<?php echo $toto['nom']; ?>">
                              </br>
                              <label for="description">Description</label>
                               </br>
                              <textarea name="description" rows="6" cols="60"><?php echo $toto['description']; ?></textarea>
                              </br>
                              <input type="submit" id="Annuler" name="Annuler" value="Annuler">
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <input type="submit" id="Modifier" name="Modifier" value="Modifier"> 
                        </form>
                      </div> <?php				
                }		   
  }
  
  public function Update_description($db){
	
		try {
				
				$description = $_POST['description'];
                                $description = str_replace("'", "\'", $description);
                                $description = str_replace("’", " ", $description);
                                                     
				
				$sql = "UPDATE liste_appli SET description='".$_POST['description']."' WHERE nom='".$_GET['nom']."'";
			
				$db->exec($sql);
				
				echo "Modification réussi";
				echo '<meta http-equiv="refresh" content="0;URL=modif_appli.php?nom='.$_GET['nom'].'">';
			}
			catch(Exception $e){
				
				echo("<h1>Erreur : Base de données </h1>");
				die('Erreur : ' .$e->getMessage());
			
			}
}

public function modif_tache($db){
    
                $stmt = $db->prepare("SELECT * FROM appli where nom='".$_GET['nom']."' AND id='".$_GET['id5']."'"); 
		$stmt->execute();
                
                foreach(($stmt->fetchAll()) as $toto){
		?>
                
                <form method="post" action="">
                    </br>
                    <label for="nom">Nom Application</label>
                    </br>
                    <input type="text" id="nom" name="nom" value="<?php echo $toto['nom']; ?>">
                    </br>
                    <label for="type">Type de Tache</label>
                    </br>
                    <input type="text" id="nom" name="nom" value="<?php echo $toto['type']; ?>">
                     </br>
                     <label for="tache">Tache</label>
                     </br>
                    <textarea name="tache" rows="6" cols="60"><?php echo $toto['tache']; ?></textarea>
                    </br>
                    <input type="submit" id="Annuler" name="Annuler" value="Annuler">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" id="Modifier" name="Modifier" value="Modifier"> 
              </form>
                <?php				
            }		
    
}

public function Update_tache($db){
    
    		try {
				
			$tache = $_POST['tache'];
                        $tache = str_replace("'", "\'", $tache);
                        $tache = str_replace("’", " ", $tache);
                                                     				
			$sql = "UPDATE appli SET tache='".$_POST['tache']."' WHERE nom='".$_GET['nom']."' AND id='".$_GET['id5']."'";
			
			$db->exec($sql);
				
			echo "Modification réussi";
			echo '<meta http-equiv="refresh" content="0;URL=detail.php?nom='.$_GET['nom'].'">';
			}
			catch(Exception $e){
				
				echo("<h1>Erreur : Base de données </h1>");
				die('Erreur : ' .$e->getMessage());
			
			}
    
    
}
  
}