	<div class="center " style="font-size: 2.2em;font-weight: bold;">My Projects</div>
﻿<div class="row">
﻿<?php
foreach($lesprojets as $unprojet)
{
?>

	<div class="col s10 offset-s1 m3 l2 ">
<a aria-label="ddd" href="https://www.camillebalmer.fr/?uc=voirprojet&id=<?php echo $unprojet["Id"]; ?>"><img  alt="" class="responsive-img "   src="<?php echo $unprojet["PhotoCouverture"]?>"></a></br>
  </div>
  
<?php
}
?>
</div>
	<div class="center " style="font-size: 2.2em;font-weight: bold;">My Game jam</div>
<div class="row">
﻿<?php
foreach($lesjam as $unejam)
{
?>
	<div class="col s10 offset-s1 m3 l2">
<a aria-label="ddd"  href="https://www.camillebalmer.fr/?uc=voirjam&id=<?php echo $unejam["Id"]; ?>"><img alt="" class="responsive-img"  src="<?php echo $unejam["PhotoCouverture"]?>"></a></br>
  </div>
<?php
}
?>
</div>

﻿<?php
foreach($lesbillets as $unbillet)
{
?>

  <div class="row">
    <div class="col s10 offset-s1 m8 offset-m2 l10 offset-l1">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title"><?php echo "[".$unbillet["NomComplet"]."] ".$unbillet["Titre"]; ?></span>
           <p><?php $boutdetext = explode(".", $unbillet["Contenu"]); echo $boutdetext[0].".."?>.</p>
          <p>Create : <?php echo date_format(date_create($unbillet["Date"]),"m/d/Y");?></p>
        </div>
        <div class="card-action">
          <a href="https://www.camillebalmer.fr/?uc=voirbillett&id=<?php echo $unbillet["Idbillet"] ?>">see next</a>
         <?php 
         if(estConnecte()){
         	?>
         <a href="https://www.camillebalmer.fr/?uc=modifierbillet&id=<?php echo $unbillet["Idbillet"]?>">Modifier</a>
        <a onclick="if(window.confirm('Voulez-vous vraiment supprimer ?')){supprimerObjets(this,<?php echo $unbillet["Idbillet"]; ?>);}else{return false;}">Supprimer</a>
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
	url: "https://www.camillebalmer.fr/?uc=supprimerbillet&delete="+id
	});
 }
	
</script>