
  <div class="row">
    <div class="col s10 offset-s1 m8 offset-m2 l6 offset-l3">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title center"><?php echo $unmonstre[1] ?></span>
          <p><img class="" width="25" src="images/life.png"> minimum: <?php echo $unmonstre["vie_mini"] ?></p>
         <p><img class="" width="25" src="images/emp.png">: <?php echo ($unmonstre["Chance_emp"]*100)."%" ?></p>
     <p><img class="" width="25" src="images/area.png">: <?php echo $unmonstre["Zone_apparition"] ?></p>
     <p>Drop:</p>
            <?php 
                 	if(sizeof($lesdrops)>0){
	          	foreach($lesdrops as $undrop)
	          	{
	          		?>
	          	<p><a href="http://gatitostudio.livehost.fr/?uc=voirunobjet&id=<?php echo $undrop["Id"]."&type=".$undrop["Type"]; ?>"><?php echo $undrop["Nom"] ?></a> <?php echo ($undrop["Porc_chance"]*100)."%";?></p>
	          	<?php
	          	}
          	}
          	else
          	{
          		echo "Ce monstre ne drop rien";
          	}
       
       ?>
          <p> <a href="http://gatitostudio.livehost.fr/?uc=voircategorieMonstre&nom=<?php echo $unmonstre["Type"] ?>"><?php echo $unmonstre["Type"]?>.</a></p>
        </div>
  
      </div>
    </div>
  </div>