<script>
	            $( document ).ready(function(){
	document.getElementById("titreOnglet").innerHTML="<?php echo $lexperience["Nom"] ?>";
      		coverTrigger : false
      	});
</script>
     <div class="row">
    <div class="col s10 offset-s1">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title center"><span style="text-decoration: underline;"><?php echo $lexperience["Nom"] ?></span></span>
         <p> <span style="text-decoration: underline;">Description</span>:</br><strong> <?php echo str_replace('<br />',"</br>",$lexperience["Description"]); ?></strong></p></br>
     <p><span style="text-decoration: underline;">Entreprise</span>: <?php echo $lexperience["Entreprise"] ?>
         
         	

                <?php 
           foreach($lesimages as $uneimage){
           	if($uneimage["Video"]==0){
           ?>
           	<img alt="uneimage" class="hide-on-med-and-down" width="65%"  src="<?php echo $uneimage["chemin"]; ?>">
          	<img alt="uneimagelarge" class="hide-on-large-only"   width="50%" src="<?php echo $uneimage["chemin"]; ?>">
       <?php
           	}
           	else { ?>
		    <div class="video-container">
        <iframe  title="video" width="560" height="315" src="<?php echo $uneimage["chemin"]; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
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

         <a href="https://www.camillebalmer.fr/?uc=modifierxp&id=<?php echo $lexperience["Id"]?>">Modifier</a>
        <a onclick="if(window.confirm('Voulez-vous vraiment supprimer ?')){supprimerObjets(this,<?php echo $lexperience["Id"]; ?>);}else{return false;}">Supprimer</a>
        <?php 
         }
        ?>
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
	url: "https://www.camillebalmer.fr/?uc=supprimerxp&delete="+id
	});
	reload('https://www.camillebalmer.fr',100)
 }
	
</script>