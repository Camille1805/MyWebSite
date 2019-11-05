<script>
	            $( document ).ready(function(){
	document.getElementById("titreOnglet").innerHTML="<?php echo $lajam["Titre"] ?>";
      		coverTrigger : false
      	});
</script>
  <div class="row">
    <div class="col s10 offset-s1 m8 offset-m2 l10 offset-l1">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title center"><?php echo $lajam["Titre"]; ?></span>
           <p><span style="text-decoration: underline;">Theme</span>: <?php echo $lajam["Theme"]; ?></p>
          <p><span style="text-decoration: underline;">Description of game: </span>: <?php echo $lajam["Description"]; ?></p>
           <p><span style="text-decoration: underline;">Link: </span>:<a href="<?php echo $lajam["Lien"]; ?>">PLAY</a></p>
                <?php 
           foreach($lesimages as $uneimage){
           	if($uneimage["Video"]==0){
           		$size=getimagesize($uneimage["chemin"]);
           		 
           		$hauteur=$size[0];
           		$largeur=$size[1];
           		while($largeur>200){
           			$hauteur=$hauteur*0.9;
           			$largeur=$largeur*0.9;
           		}
           		$hauteurdeux=$size[0];
           		$largeurdeux=$size[1];
           		while($largeurdeux>540){
           			$hauteurdeux=$hauteurdeux*0.9;
           			$largeurdeux=$largeurdeux*0.9;
           		}
           
           ?>
           	<img alt="uneimage"class="hide-on-med-and-down"  width="<?php $hauteurdeux; ?>" height="<?php echo $largeurdeux; ?>" src="<?php echo $uneimage["chemin"]; ?>">
          	<img alt="uneimagelarge" class="hide-on-large-only"   width="<?php echo $hauteur; ?>" height="<?php echo $largeur; ?>" src="<?php echo $uneimage["chemin"]; ?>">
       <?php
           	}
           	else { ?>
		    <div class="video-container">
        <iframe title="video" width="560" height="315" src="<?php echo $uneimage["chemin"]; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
      </div>
           	<?php
           	}
           }
       ?>


        </div>
                 <?php 
         if(estConnecte()){
         	?>
        <div class="card-action">

         <a href="https://www.camillebalmer.fr/?uc=modifierjam&id=<?php echo $lajam["Id"]?>">Modifier</a>
        <a onclick="if(window.confirm('Voulez-vous vraiment supprimer ?')){supprimerObjets(this,<?php echo $lajam["Id"]; ?>);}else{return false;}">Supprimer</a>
        <?php 
         }
        ?>
        </div>
      </div>
    </div>
  </div>
  <script>
function supprimerObjets(form,id)
 {
 	//alert("https://www.camillebalmer.fr/?uc=supprimerjam&delete="+id)
 	form.parentNode.parentNode.remove();
 	$.ajax({
	type:"GET",
	url: "https://www.camillebalmer.fr/?uc=supprimerjam&delete="+id
	});
	reload('https://www.camillebalmer.fr',100)
 }
	
</script>