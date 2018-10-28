<header>
	<title>Tache</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<link rel="icon" type="image/png" href="image/afaire.png"/>
    <table>	
         <tr>
			<td><img src="image/afaire.png" onclick="Compte()"></td>
			<td><h1 id="test">Tache à Faire</h1></td> 
		</tr>
	</table>
</header>

<nav>
	<ul id="menu-deroulant">
		<li style="float: left"><a href="index.php">Home</a></li>
		<li style="float: left"><a href="saisie.php">Nouvelle Tache</a></li>
		<li style="float: left"><a href="saisie_appli.php">Nouvelle Application</a></li>
		<li style="float: left"><a href="total_tache.php">Total Tache Effecter</a></li>    
	</ul>
</nav>

<script>
    
    	function Compte(){
	var url = "index.php";			  
	 document.location.href = url;
	}
    
</script>
