<?php
foreach($lesmonstres as $unmonstre)
{
?>

  <div class="row">
    <div class="col s10 offset-s1 m8 offset-m2 l6 offset-l3">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title"><?php echo $unmonstre[1] ?></span>
          <p>Catégorie: <a href="https://www.camillebalmer.fr//?uc=voircategorieMonstre&nom=<?php echo $unmonstre["Type"] ?>"><?php echo $unmonstre["Type"]?>.</a></p>
        </div>
        <div class="card-action">
          <a href="https://www.camillebalmer.fr//?uc=voirunmonstre&id=<?php echo $unmonstre["id"]; ?>">En savoir plus</a>
                   <?php 
         if(estConnecte()){
         	?>
         <a href="https://www.camillebalmer.fr//?uc=modifiermonstre&id=<?php echo $unmonstre["id"]; ?>">Modifier</a>
            <a href="#"onclick="if(window.confirm('Voulez-vous vraiment supprimer ?')){supprimerMonstre(this,<?php echo $unmonstre["id"]; ?>);}else{return false;}">Supprimer</a>
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
function supprimerMonstre(form,id)
 {
 	form.parentNode.parentNode.remove();
 	$.ajax({
	type:"GET",
	url: "https://www.camillebalmer.fr/WikiEOZ/?uc=supprimermonstre&delete="+id
	});
 }
	
</script>