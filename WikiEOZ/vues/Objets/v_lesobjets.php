<?php
foreach($lesobjets as $unobjet)
{
?>

  <div class="row">
    <div class="col s10 offset-s1 m8 offset-m2 l6 offset-l3">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title"><?php echo $unobjet[2] ?></span>
           <p><?php echo $unobjet["Description"]?>.</p>
          
          <p>Catégorie:  <a href="https://www.camillebalmer.fr/WikiEOZ/?uc=voircategorie&nom=<?php echo $unobjet["Type"] ?>"><?php echo $unobjet["Type"]?>.</a></p>
        </div>
        <div class="card-action">
          <a href="https://www.camillebalmer.fr/WikiEOZ/?uc=voirunobjet&id=<?php echo $unobjet["Id"]."&type=".$unobjet["Type"]; ?>">En savoir plus</a>
         <?php 
         if(estConnecte()){
         	?>
         <a href="https://www.camillebalmer.fr/WikiEOZ/?uc=modifierobjet&id=<?php echo $unobjet["Id"]."&type=".$unobjet["Type"]; ?>">Modifier</a>
        <a onclick="if(window.confirm('Voulez-vous vraiment supprimer ?')){supprimerObjets(this,<?php echo $unobjet["Id"]; ?>);}else{return false;}">Supprimer</a>
        <?php 
         }
        ?>
        </div>
      </div>
    </div>
  </div>

<?php
}
?>
<script>
function supprimerObjets(form,id)
 {
 	form.parentNode.parentNode.remove();
 	$.ajax({
	type:"GET",
	url: "https://www.camillebalmer.fr/WikiEOZ/?uc=supprimerobjet&delete="+id
	});
 }
	
</script>