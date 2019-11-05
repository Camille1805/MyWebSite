<div class="row" style="color:white;">
    <div class="col s10 offset-s1 m8 offset-m2 l6 offset-l3">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title center">Objet</span>
              <form method="POST" action="https://www.camillebalmer.fr/?uc=modifierobj">
                        <input  id="id" name="id" style="color:white;" min=0 value="<?php echo $unobjet["Id"] ?>" type="hidden" required class="validate">
                       <div class="row">
    		<div class="input-field  s10 ">
          <input  id="idenjeu" name="idenjeu" style="color:white;" min=0 value="<?php echo $unobjet["Id_en_jeu"] ?>" type="number" required class="validate">
          <label  for="idenjeu">Id</label>
          </div>
            </div>
            <div class="row">
    		<div class="input-field  s10 ">
          <input  id="name" name="name" style="color:white;" value="<?php echo $unobjet["Nom"] ?>" type="text" required class="validate">
          <label  for="name">Nom de la ressource</label>
          </div>
            </div>
   
            <div class="row" >
        <div class="input-field s10">
          <textarea id="descr" name="descr" style="color:white;" class="materialize-textarea"><?php echo $unobjet["Description"] ?></textarea>
          <label  for="descr">Description</label>
        </div>
      </div>
             <div class="row">
    		<div class="input-field  s10 ">
          <input  id="typeobj" name="typeobj"  style="color:white;" value="<?php echo $unobjet["Type"] ?>" type="text" required class="validate" readonly>
          <label  for="typeobj">Type de la ressource</label>
          </div>
            </div>
      <?php 
      if($unobjet["Type"]=="Arme")
      {
      ?>
      <div id="Arme">
      
                <span class="card-title center">Arme</span>

                   <div class="row">
        <div class="input-field  s10 ">
          <input style="color:white;" id="degatsmin" onchange="calculerdegats()" type="number" value="<?php echo $unobjet["degats_min"] ?>" min="1"  name="degatsmin" class="validate">
          <label for="degatsmin">Dégats minimum</label>
        </div>
        </div>
                   <div class="row">
        <div class="input-field  s10 ">
          <input id="degatsmax" style="color:white;" onchange="calculerdegats()" type="number" value="<?php echo $unobjet["degats_max"] ?>"   min="1"  name="degatsmax" class="validate">
          <label for="degatsmax">Dégats Max</label>
        </div>
        </div>
          <div class="row">
        <div class="input-field  s10 ">
          <input id="vitesse" style="color:white;" onchange="calculerdegats()" step="0.01" max="1" type="number"  min="0" value="<?php echo $unobjet["Vitesse"] ?>"  name="vitesse" class="validate">
          <label for="vitesse">Vitesse</label>
        </div>
        </div>
           <div class="row">
        <div class="input-field  s10 ">
          <input id="degatsmoyen" style="color:white;" type="number" required min="1" value="<?php echo (($unobjet["degats_min"]+$unobjet["degats_max"])/2)/$unobjet["Vitesse"]; ?>" disabled  name="chance" class="validate">
          <label for="degatsmoyen">Dégats moyen/s</label>
        </div>
        </div>
        
   <div class="row">
 <div class="input-field s10">
    <select style="color:white;" id="Armeselect" name="typearme">
  <option value="<?php echo $unobjet["Type_Objets"] ?>"><?php echo $unobjet["Type_Objets"] ?></option>
      <option style="color:white;" value="Epée">Epée</option>
      <option style="color:white;" value="Hache">Hache</option>
    </select>
    <label>Type d'arme</label>
  </div>
        </div>
        </div>
        <?php 
      }elseif($unobjet["Type"]=="Armure")
      {
        ?>

              <div id="Armure">
      
                <span class="card-title center">Armure</span>

                        <div class="row">
        <div class="input-field  s10 ">
          <input style="color:white;" id="res" type="number" step="0.01"  min="0" max="1" value="<?php echo $unobjet["Pourc_resistance"] ?>"     name="res" class="validate">
          <label for="res">Résistance empoisonement</label>
        </div>
        </div>
          <div class="row">
        <div class="input-field  s10 ">
          <input style="color:white;" id="ptsvieenplus"  type="number"  min="1" value="<?php echo $unobjet["Pts_def"] ?>"  name="ptsvieenplus" class="validate">
          <label for="ptsvieenplus">Point de vie en plus</label>
        </div>
        </div>
  
      
        
   <div class="row">
 <div class="input-field s10">
    <select style="color:white;" id="Armureselect"   name="typearmure">
    <option value="<?php echo $unobjet["Type_Armure"] ?>"><?php echo $unobjet["Type_Armure"] ?></option>
      <option value="Casque">Casque</option>
      <option value="Buste">Buste</option>
      <option value="Botte">Buste</option>
    </select>
    <label>Type d'armure</label>
  </div>
        </div>
        </div>
          <?php
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
           <div class="row" id="larecette">

            <?php
          
          	if(sizeof($larecette)>0){
	          	foreach($larecette as $unerecette)
	          	{
	          		?>
	          	<p><a href="https://www.camillebalmer.fr/WikiEOZ/?uc=voirunobjet&id=<?php echo $unerecette["Id_Objets"]."&type=".$unerecette["Type"]; ?>"><?php echo $unerecette["Nom"] ?></a> <?php echo "x".$unerecette["Quant"];?>
	          	<a onclick="supprimerObjetsrecette(this,<?php echo $unerecette["Id"]?>,<?php echo $unobjet["Id"]?>)">supprimer</a>
	          	</p>
	          	<?php
	          	}
          	}
          	else
          	{
          		echo "Objet non craftable";
          	}
         	$lesobjets=$pdo->Getlesobjets();
          ?>
          </div>
          
    <div class="row">
    	    <div class="input-field col s6">
    	
    <select style="color:white;" id="lesobjets" name="objets">
  <option value="" disabled selected>Choisir un objet</option>
<?php
	foreach($lesobjets as $unobjets)
	{
?>
  <option value="<?php echo $unobjets["Id"]?>"><?php echo $unobjets["Nom"]?></option>
<?php		
	}
	?>
    </select>
    <label>Objets</label>
  </div>
          <div class="input-field col s6">
          <input id="quantobjrecette"   type="text" class="validate">
          <label for="quantobjrecette">Quantitée</label>
        </div>
                <button onclick="ajouterobjetrecette(<?php echo $unobjet["Id"] ?>)" class="waves-effect waves-light btn">Ajouter un objet</button>

          </div>
          <div id="lesmonstrequidropentlobjet">
                      <?php 
                 	if(sizeof($lesdrops)>0){
	          	foreach($lesdrops as $undrop)
	          	{
	          		?>
	          	<p><a href="https://www.camillebalmer.fr/WikiEOZ/?uc=voirunobjet&id=<?php echo $undrop["Id"]."&type=".$undrop["Type"]; ?>"><?php echo $undrop["Nom"] ?></a> <?php echo ($undrop["Porc_chance"]*100)."%";?>
	       		<a onclick="supprimerDrop(this,<?php echo $undrop["id"]?>,<?php echo $unobjet["Id"]?>)">supprimer</a>

	          	</p>
	          	<?php
	          	}
          	}
          	else
          	{
          		echo "Cette objet n'est pas dropable";
          	}
       
       ?>
       </div>
    <div class="row">
    <div class="input-field col s6">
    	
    <select style="color:white;" id="lesdrop" name="objets">
  <option value="" disabled selected>Choisir un monstre</option>
<?php
	$lesmonstres=$pdo->GetlesMonstres($_GET["id"]);
	foreach($lesmonstres as $unmonstre)
	{
?>
  <option value="<?php echo $unmonstre["id"]?>"><?php echo $unmonstre["Nom"]?></option>
<?php		
	}
	?>
    </select>
    <label>Objets</label>
  </div>
  
        <div class="input-field col s6">
          <input id="chancedrop"   type="text" class="validate">
          <label for="chancedrop">Pourcentage</label>
        </div>
        
        <button onclick="ajouterDrop(<?php echo $unobjet["Id"] ?>)" class="waves-effect waves-light btn">Ajouter un objet</button>
      </div>
        
        </div>
  
      </div>
      
    </div>
  </div>

  <script>
    function calculerdegats()
    {
    	
    	document.getElementById("degatsmoyen").value=(((parseFloat(document.getElementById("degatsmin").value)+parseFloat(document.getElementById("degatsmax").value)))/2)/document.getElementById("vitesse").value
    }
  </script>
  <script>
function supprimerObjetsrecette(form,idobjetrecette,idobjet)
 {
 	form.parentNode.remove();
 	$.ajax({
	type:"GET",
	url: "https://www.camillebalmer.fr/WikiEOZ/?uc=supprimerobjetrecette&idobjrecette="+idobjetrecette+"&idobj="+idobjet
	});
 }
 function supprimerDrop(form,idobjetmonstre,idobjet)
 {
 	form.parentNode.remove();
 	$.ajax({
	type:"GET",
	url: "https://www.camillebalmer.fr/WikiEOZ/?uc=supprimerDrop&idobjetmonstre="+idobjetmonstre+"&idobjet="+idobjet
	});
 }
function ajouterobjetrecette(idobjet)
{
//	alert("https://www.camillebalmer.fr/?uc=ajouterobjetrecette&idobjrecette="+document.getElementById("lesobjets").value+"&idobj="+idobjet+"&quant="+document.getElementById("quantobjrecette").value)
	if(document.getElementById("lesobjets").value!="" && document.getElementById("quantobjrecette").value!="")
	{
		
	 	$.ajax({
		type:"GET",
		url: "https://www.camillebalmer.fr/WikiEOZ/?uc=ajouterobjetrecette&idobjrecette="+document.getElementById("lesobjets").value+"&idobj="+idobjet+"&quant="+document.getElementById("quantobjrecette").value
		});
		document.getElementById("quantobjrecette").value=""
				var para = document.createElement("p");
		var node = document.createTextNode("Rafraichir pour voir");
		para.appendChild(node)
		document.getElementById("larecette").appendChild(para)
		
	}
	else
	{
		alert("Erreur champ(s) invalide ");
	}
}
function ajouterDrop(idobjet)
{
	if(document.getElementById("lesdrop").value!="" && document.getElementById("chancedrop").value!="")
	{
		
	 	$.ajax({
		type:"GET",
		url: "https://www.camillebalmer.fr/WikiEOZ/?uc=ajouterdrop&imonstre="+document.getElementById("lesdrop").value+"&idobj="+idobjet+"&chance="+document.getElementById("chancedrop").value
		});
		document.getElementById("chancedrop").value=""
		var para = document.createElement("p");
		var node = document.createTextNode("Rafraichir pour voir");
		para.appendChild(node)
		document.getElementById("lesmonstrequidropentlobjet").appendChild(para)

	}
	else
	{
		alert("Erreur champ(s) invalide ");
	}
}
</script>
  