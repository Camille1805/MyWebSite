<script>
	            $( document ).ready(function(){
	document.getElementById("titreOnglet").innerHTML="Portfolio";
      		coverTrigger : false
      	});
</script>
<style type="text/css">
	.skill
	{
		font-family: open-sans;
		font-size: 1.5em;
	}

	.skillTab
	{

	}

	.elementsTile .card-title
	{
		font-size: 1.8em;
	}

	.element
	{
		font-weight: bold;
		margin-top: 1em;
	}

	.subElement
	{
		font-style: italic;
	}
</style>

<div class="row">
	  <div class="card blue-grey darken col l3 offset-l1 s10 offset-s1" style="margin-right:10px;">
		    <div class="card-content white-text">
			    <div class="center " style="font-size: 3em;font-weight: 1;">Camille BALMER</div>
			    <p class="cardText"> 
			    	<br/>
				    	<div> 23 ans </div>
				    	<div> camilleb25@hotmail.fr </div>
				    	<div> Permis B </div>
			    	<br/>




			    	<div class="divider"></div>
			    	<br/>
			    		<div class="center " style="font-size: 1.2em;font-weight: bold;">Langages de programmation</div>
			    	<br/>
			    		<div>
			    			<table table="Tableau des skills" class="skillsTab">
			    				<?php 
			    				$leslanguagepgr=$pdo->GetlanguagesProgrammation();
								Add($leslanguagepgr);
			    				?>
			
			    			</table>
			    		</div>





			    	<div class="divider"></div>
			    	<br/>
			    		<div class="center " style="font-size: 1.2em;font-weight: bold;">Langues</div>
			    	<br/>
			    		<div>
			    			<table table="Tableau des langues" class="skillsTab">
			    					    				<?php 
								Add($pdo->Getlanguages());
			    				?>			    			

			    	

			    			</table>
			    		</div> 




			    	<div class="divider"></div>
			    	<br/>
			    		<div class="center " style="font-size: 1.2em;font-weight: bold;">Hobbies</div>
			    	<br/>
			 			<div>Lecture</div>
			 			<div>Cinéma</div>
			    		<div>Jeux vidéo</div>
			    		<div>Création de jeux vidéo</div> 

				</p>
		    </div>

	  </div>

	  <div class="card blue-grey darken col l7 s10 offset-s1 elementsTile">
		    <div class="card-content white-text">
			    <span class="card-title center">ÉTUDES</span>
			    <div class="divider"></div>
			    <p class="cardText">
			    	<?php 
					foreach($pdo->GetEtudes() as $etudes){
						if($etudes["current"]==1)
							echo '<div class="element">→'.$etudes["Annee"].': '.$etudes["Intitule"].'</div>';
						else
							echo '<div class="element">'.$etudes["Annee"].': '.$etudes["Intitule"].'</div>';
						echo '<div class="subElement">'.$etudes["Etablissement"].'</div>';
					}
				
				?>


				</p>
		    </div>
	  </div>

	  	  <div class="card blue-grey darken col l7 s10 offset-s1 elementsTile">
		    <div class="card-content white-text">
			    <span class="card-title center">PROJETS</span>
			    <div class="divider"></div>
			    <p class="cardText"> 
			    <?php 
					foreach($pdo->GetprojetCV() as $unprojet){
						echo '<div class="element">→'.$unprojet["Intitule"].'</div>';
					}
				
				?>

				</p>
		    </div>
	  </div>
	  	  	  <div class="card blue-grey darken col l7 s10 offset-s1 elementsTile">
		    <div class="card-content white-text">
			    <span class="card-title center">EXPERIENCES PROFESSIONNELS</span>
			    <div class="divider"></div>
			    <p class="cardText"> 
			    			    <?php 
					foreach($pdo->GetXpProCV() as $unxp){
						echo '<div class="element">→'.$unxp["Intitule"].'</div>';
					}
				
				?>

				</p>
		    </div>
	  </div>
<?php 
function Add($list){
				    				foreach($list as $unlanguagepgr){
				    					//ondblclick="alert(\''.$unlanguagepgr["Nom"].' '.$unlanguagepgr["Id"].'\')"
			    					echo'<tr ><td >'.$unlanguagepgr["Nom"].'</td><td class="skill">';
			    					$i=1;
			    					while($i<=$unlanguagepgr["skill"]){
			    						echo '●';
			    						$i++;
			    					}
			    					$nbptsvide=6-$unlanguagepgr["skill"];
			    					$i=1;
			    					while($i<=$nbptsvide){
			    						echo '○';
			    						$i++;
			    					}
			    					echo '</td></tr>';
			    				}
	
}
?>
