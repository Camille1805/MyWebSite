<script>
<?php $namecomplet=$leprojet["NomComplet"];?>
	            $( document ).ready(function(){
	document.getElementById("titreOnglet").innerHTML="<?php echo $namecomplet; ?>";
      		coverTrigger : false
      	});
</script>
  
   <div class="row">
    <div class="col s10 offset-s1">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title center"><span style="text-decoration: underline;"><?php echo $namecomplet; ?></span></span>
 <?php 
	
   	if(!estConnecte()){
   ?>
</br>
         <p> <span style="text-decoration: underline;">Description du projet</span>:</br><strong> <?php echo str_replace('<br />',"</br>",$leprojet["Description"]); ?></strong></p>

<p><span style="text-decoration: underline;">Date de début</span>: <?php echo $leprojet["AnneeDebut"] ?></p></br>
     <p><span style="text-decoration: underline;">Date de fin</span>: <?php echo $leprojet["AnneeFin"] ?></p></br>
      <p><span style="text-decoration: underline;">Etat de création</span>: </br><?php echo $leprojet["Etat"]; ?></p></br>

<?php
   	}
   	else{
       ?>
                     <form method="POST" action="https://www.camillebalmer.fr/?uc=modifierprojet">
           <input  id="name" name="id" value="<?php echo $leprojet["Id"] ?>" type="hidden" required class="validate">
            <div class="row">
    		<div class="input-field  s10 ">
          <input  id="name" name="name" value="<?php echo $namecomplet; ?>" type="text" required class="validate">
          <label for="name">Nom du Projet</label>
          </div>
            </div>
              
            <div class="row">
    		<div class="input-field  s10 ">
          <input  id="namenav" name="namenav" value="<?php echo $leprojet["NomNav"] ?>" type="text" required class="validate">
          <label for="namenav">Nom nav</label>
          </div>
            </div>
           <div class="row">
        <div class="input-field  s10 ">
          <textarea id="descr" name="descr" style="color:white;" class="materialize-textarea"><?php echo str_replace('<br />',"",$leprojet["Description"]); ?></textarea>
        </div>
        </div>

                    <div class="row">
    		<div class="input-field  s10 ">
          <input  id="debut" name="debut" value="<?php echo $leprojet["AnneeDebut"] ?>" type="text" required class="validate">
          <label for="debut">Début du Projet</label>
          </div>
            </div>
              
            <div class="row">
    		<div class="input-field  s10 ">
          <input  id="fin" name="fin" type="text" value="<?php echo $leprojet["AnneeFin"] ?>"  class="validate">
          <label for="fin">Fin du projet</label>
          </div>
            </div>
   <div class="row">
 <div class="input-field s10">
    <select required name="etat">
      <option value="<?php echo $leprojet["Etat"] ?>"><?php echo $leprojet["Etat"] ?></option>
      <option value="In progress">In progress</option>
      <option value="Completed">Completed</option>
    </select>
    <label>Type monstre</label>
  </div>
        </div>
        
  
            <?php 

   	}
       ?>
                      <?php 
           foreach($lesimages as $uneimage){
           	$chemin=$uneimage["chemin"];
           	if($uneimage["Video"]==0){
           		$size=getimagesize($chemin);
           		 
           		$hauteur=$size[0];
           		$largeur=$size[1];
             		if($largeur>$hauteur){
           		while($largeur>200){
           			$hauteur=$hauteur*0.9;
           			$largeur=$largeur*0.9;
           		}
           		}
           		else{
           			while($largeur>110){
           			$hauteur=$hauteur*0.9;
           			$largeur=$largeur*0.9;
           		}
           		}
           		$hauteurdeux=$size[0];
           		$largeurdeux=$size[1];
           		while($largeurdeux>540){
           			$hauteurdeux=$hauteurdeux*0.9;
           			$largeurdeux=$largeurdeux*0.9;
           		}
           
           ?>
           	<img alt="uneimage" class="hide-on-med-and-down"  width="<?php $hauteurdeux; ?>" height="<?php echo $largeurdeux; ?>" src="<?php echo $chemin; ?>">
          	<img alt="uneimagelarge" class="hide-on-large-only"   width="<?php echo $hauteur; ?>" height="<?php echo $largeur; ?>" src="<?php echo $chemin; ?>">
       <?php
           	}
           	else { ?>
		    <div class="video-container">
        <iframe title="video" width="560" height="315" src="<?php echo $chemin; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
      </div>
           	<?php
           	}
           }
       ?>
	           <p><span style="text-decoration: underline;">Liens</span>:</p>

            <?php 
                 	if(sizeof($lesliens)>0){
	          	foreach($lesliens as $unlien)
	          	{
	          		?>
	          	<p><a href="<?php echo $unlien["lien"]?>"><?php echo $unlien["Nom"] ?></a></p>
	          	<?php
	          	}
          	}
          	else
          	{
          		echo "Ce projet ne possede pas de lien";
          	}
          	?>
          <div class="row">
        <div class="input-field  s10 ">  
  <button class="btn waves-effect waves-light" type="submit" name="action">Valider
    <i class="material-icons right">send</i>
  </button>
                
                </div>
        </div>
    
          </form>
      
        
        </div>
  
      </div>
    </div>
  </div>
  

    
 


