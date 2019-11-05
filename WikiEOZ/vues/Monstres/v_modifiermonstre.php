<div class="row" style="color:white;">
    <div class="col s10 offset-s1 m8 offset-m2 l6 offset-l3">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title center">Objet</span>
              <form method="POST" action="https://www.camillebalmer.fr/?uc=modifiermonster">
                        <input  id="id" name="id" style="color:white;" min=0 value="<?php echo $unmonstre["id"] ?>" type="hidden" required class="validate">

           
            <div class="row">
    		<div class="input-field  s10 ">
          <input  id="name" name="name" style="color:white;" value="<?php echo $unmonstre["Nom"] ?>" type="text" required class="validate">
          <label  for="name">Nom du monstre</label>
          </div>
            </div>
                        <div class="row">
    		<div class="input-field  s10 ">
          <input  id="viemini" name="name" style="color:white;" value="<?php echo $unmonstre["vie_mini"] ?>" type="text" required class="validate">
          <label  for="viemini">Vie mini</label>
          </div>
            </div>
   
            <div class="row" >
        <div class="input-field s10">
          <input  id="Chance_emp" name="Chance_emp" type="number" step="0.01" required min="0" max="1"  style="color:white;" value="<?php echo $unmonstre["Chance_emp"] ?>" required class="validate">
          <label  for="Chance_emp">Chance empoisonné</label>
        </div>
      </div>
                  <div class="row" >
        <div class="input-field s10">
          <input  id="Zone_apparition" type="number" name="Zone_apparition" min="1" style="color:white;" value="<?php echo $unmonstre["Zone_apparition"] ?>"  required class="validate">
          <label  for="Zone_apparition">Zone apparition</label>
        </div>
      </div>
             <div class="row">
    		<div class="input-field  s10 ">
          <input  id="Type" name="Type"  style="color:white;" value="<?php echo $unmonstre["Type"] ?>" type="text"  class="validate" readonly>
          <label  for="Type">Type de monstre</label>
          </div>
            </div>
                       <div class="row">
        <div class="input-field  s10 ">  
  <button class="btn waves-effect waves-light" type="submit" name="action">Valider
    <i class="material-icons right">send</i>
  </button>
  </div>
   </div>

          </form>

          
          <div id="lesmonstrequidropentlobjet">
            <?php 
                 	if(sizeof($lesdrops)>0){
	          	foreach($lesdrops as $undrop)
	          	{
	          		?>
	          	<p><a href="http://gatitostudio.livehost.fr/?uc=voirunobjet&id=<?php echo $undrop["Id"]."&type=".$undrop["Type"]; ?>"><?php echo $undrop["Nom"] ?></a> <?php echo ($undrop["Porc_chance"]*100)."%";?>
	          		<a onclick="supprimerDrop(this,<?php echo $unmonstre["id"]?>,<?php echo $undrop["Id"]?>)">supprimer</a>
	          	</p>
	          	<?php
	          	}
          	}
          	else
          	{
          		echo "Ce monstre ne drop rien";
          	}
       
       ?>
       </div>
    <div class="row">
    <div class="input-field col s6">
    	
    <select style="color:white;" id="lesdrop" name="objets">
  <option value="" disabled selected>Choisir un objet</option>
<?php
$lesobjets=$pdo->Getlesobjets();
foreach($lesobjets as $unobjet)
	{
?>
  <option value="<?php echo $unobjet["Id"]?>"><?php echo $unobjet["Nom"]?></option>
<?php		
	}
	?>
    </select>
    <label>Objets</label>
  </div>
  
        <div class="input-field col s6">
          <input id="chancedrop"   type="text" class="validate">
          <label for="chancedrop">Pourcentage (entre 0 et 1)</label>
        </div>
        
        <button onclick="ajouterDrop(<?php echo $unmonstre["id"] ?>)" class="waves-effect waves-light btn">Ajouter un objet</button>
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
	url: "https://www.camillebalmer.fr/?uc=supprimerobjetrecette&idobjrecette="+idobjetrecette+"&idobj="+idobjet
	});
 }
 function supprimerDrop(form,idobjetmonstre,idobjet)
 {
 	alert(idobjetmonstre)
 	form.parentNode.remove();
 	$.ajax({
	type:"GET",
	url: "https://www.camillebalmer.fr/?uc=supprimerDrop&idobjetmonstre="+idobjetmonstre+"&idobjet="+idobjet
	});
 }
function ajouterobjetrecette(idobjet)
{
//	alert("https://www.camillebalmer.fr/?uc=ajouterobjetrecette&idobjrecette="+document.getElementById("lesobjets").value+"&idobj="+idobjet+"&quant="+document.getElementById("quantobjrecette").value)
	if(document.getElementById("lesobjets").value!="" && document.getElementById("quantobjrecette").value!="")
	{
		
	 	$.ajax({
		type:"GET",
		url: "https://www.camillebalmer.fr/?uc=ajouterobjetrecette&idobjrecette="+document.getElementById("lesobjets").value+"&idobj="+idobjet+"&quant="+document.getElementById("quantobjrecette").value
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
function ajouterDrop(idmonstre)
{
	if(document.getElementById("lesdrop").value!="" && document.getElementById("chancedrop").value!="")
	{
		
	 	$.ajax({
		type:"GET",
		url: "https://www.camillebalmer.fr/?uc=ajouterdrop&imonstre="+idmonstre+"&idobj="+document.getElementById("lesdrop").value+"&chance="+document.getElementById("chancedrop").value
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
  