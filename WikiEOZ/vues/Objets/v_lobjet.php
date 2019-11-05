<div class="row">
    <div class="col s10 offset-s1 m8 offset-m2 l6 offset-l3">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title center"><?php echo $unobjet[2] ?></span>
           <p><?php echo $unobjet["Description"]?>.</p>
          <?php 
          if($unobjet["Type"]=="Arme"){
          	?>
          	<p>Type arme: <?php echo $unobjet["Type_Objets"];?>.</p>
          	<p><img class="" width="25" src="images/Sword_min.png">: <?php echo $unobjet["degats_min"];?>.</p>
          	<p><img class="" width="25" src="images/Sword_max.png">: <?php echo $unobjet["degats_max"];?>.</p>
          	<p><img class="" width="25" src="images/Speed.png">: <?php echo $unobjet["Vitesse"]."s";?></p>
          	 <p>Dégats moyen/s: <?php echo (($unobjet["degats_min"]+$unobjet["degats_max"])/2)/$unobjet["Vitesse"]; ?></p>
             <p> <?php echo "Recette: "; ?></p>

          	<?php

          }
          if($unobjet["Type"]=="Armure"){
          	?>
          	
          	<p>Type armure: <?php echo $unobjet["Type_Armure"];?>.</p>
          	<p><img class="" width="25" src="images/life.png">: <?php echo $unobjet["Pts_def"];?></p>
          	<p><img class="" width="25" src="images/shield.png">: <?php echo ($unobjet["Pourc_resistance"]*100)."%";?>.</p>
          <?php
          }
          	if(sizeof($larecette)>0){
	          	foreach($larecette as $unerecette)
	          	{
	          		?>
	          	<p><a href="https://www.camillebalmer.fr/WikiEOZ/?uc=voirunobjet&id=<?php echo $unerecette["Id_Objets"]."&type=".$unerecette["Type"]; ?>"><?php echo $unerecette["Nom"] ?></a> <?php echo "x".$unerecette["Quant"];?></p>
	          	<?php
	          	}
          	}
          	else
          	{
          		echo "Objet non craftable";
          	}
          
          ?>
       <p> <?php echo "Drop: "; ?></p>
       <?php 
                 	if(sizeof($lesdrops)>0){
	          	foreach($lesdrops as $undrop)
	          	{
	          		?>
	          	<p><a href="https://www.camillebalmer.fr/WikiEOZ/?uc=voirunmonstre&id=<?php echo $undrop["id"]; ?>"><?php echo $undrop["Nom"] ?></a> <?php echo ($undrop["Porc_chance"]*100)."%";?></p>
	          	<?php
	          	}
          	}
          	else
          	{
          		echo "Objet non dropable";
          	}
       
       ?>
       
      	<p> <a href="https://www.camillebalmer.fr/WikiEOZ/?uc=voircategorie&nom=<?php echo $unobjet["Type"] ?>"><?php echo $unobjet["Type"]?>.</a></p>

      
        </div>

      </div>
    </div>
  </div>