<div class="row" style="color:white;">
    <div class="col s10 offset-s1 m8 offset-m2 l6 offset-l3  ">
    	
      <div class="card blue-grey darken-1 ">
        <div class="card-content white-text">
          <span class="card-title center">Objet</span>
              <form method="POST" action="https://www.camillebalmer.fr/WikiEOZ/?uc=createobjet">
             <div class="row">
    		<div class="input-field">
          <input  id="id" name="id" style="color:white;" min=0 value="" type="number" required class="validate">
          <label  for="id">Id</label>
          </div>
            </div>
            <div class="row">
    		<div class="input-field">
          <input  id="name" name="name" style="color:white;" value="" type="text" required class="validate">
          <label  for="name">Nom de la ressource</label>
          </div>
            </div>
   
            <div class="row" >
        <div class="input-field">
          <textarea id="descr" name="descr" style="color:white;" class="materialize-textarea"></textarea>
          <label  for="descr">Description</label>
        </div>
      </div>

    <p>
      <label>
        <input  value="Ressource" name="typeobj" onclick="cacherDiv('Ressource')" checked type="radio" />
        <span style="color:white;">Ressource</span>
      </label>
    </p>
    <p>
      <label>
        <input value="Arme"  class="group1" onclick="cacherDiv('Arme')" name="typeobj" type="radio"  />
        <span style="color:white;">Arme</span>
      </label>
    </p>
    <p>
      <label>
        <input value="Armure" name="typeobj" onclick="cacherDiv('Armure')" type="radio" />
        <span style="color:white;">Armure</span>
      </label>
    </p>
      <div id="Arme">
      
                <span class="card-title center">Arme</span>

                   <div class="row">
        <div class="input-field">
          <input style="color:white;" id="degatsmin" onchange="calculerdegats()" type="number" value="1" min="1"  name="degatsmin" class="validate">
          <label for="degatsmin">Dégats minimum</label>
        </div>
        </div>
                   <div class="row">
        <div class="input-field">
          <input id="degatsmax" style="color:white;" onchange="calculerdegats()" type="number" value="1"   min="1"  name="degatsmax" class="validate">
          <label for="degatsmax">Dégats Max</label>
        </div>
        </div>
          <div class="row">
        <div class="input-field">
          <input id="vitesse" style="color:white;" onchange="calculerdegats()" type="number"  min="1" value="1"  name="vitesse" class="validate">
          <label for="vitesse">Vitesse</label>
        </div>
        </div>
           <div class="row">
        <div class="input-field">
          <input id="degatsmoyen" style="color:white;" type="number" required min="1" value="1" disabled  name="chance" class="validate">
          <label for="degatsmoyen">Dégats moyen/s</label>
        </div>
        </div>
        
   <div class="row">
 <div class="input-field s10">
    <select style="color:white;" id="Armeselect" name="typearme">
  <option value="" disabled selected>Choisir un type d'arme</option>
      <option style="color:white;" value="Epée">Epée</option>
      <option style="color:white;" value="Hache">Hache</option>
    </select>
    <label>Type d'arme</label>
  </div>
        </div>
        </div>
        

              <div id="Armure">
      
                <span class="card-title center">Armure</span>

                        <div class="row">
        <div class="input-field  s10 ">
          <input style="color:white;" id="res" type="number" step="0.01"  min="0" max="1" value="0"     name="res" class="validate">
          <label for="res">Résistance empoisonement</label>
        </div>
        </div>
          <div class="row">
        <div class="input-field  s10 ">
          <input style="color:white;" id="vitesse"  type="number"  min="1" value="1"  name="ptsvieenplus" class="validate">
          <label for="vitesse">Point de vie en plus</label>
        </div>
        </div>
  
      
        
   <div class="row">
 <div class="input-field s10">
    <select style="color:white;" id="Armureselect"   name="typearmure">
  <option value="" disabled selected>Choisir un type d'armure</option>
      <option value="Casque">Casque</option>
      <option value="Buste">Buste</option>
      <option value="Botte">Buste</option>
    </select>
    <label>Type d'armure</label>
  </div>
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
      
        
        </div>
  
      </div>
    </div>
  </div>
  
  <script>
  	
  	  var div = document.getElementById("Arme");

    div.style.display = "none";
    document.getElementById("Armure").style.display = "none";
    		 document.getElementById("Armeselect").required=false
    		 document.getElementById("Armureselect").required=false
    function cacherDiv(name)
    {
    	if(name=="Ressource")
    	{
    		 var div = document.getElementById("Arme");
    		div.style.display = "none";
    		document.getElementById("Armure").style.display = "none";
    		 var All = div.getElementsByTagName("input");
		  for (var i=0; i<All.length; i++) {
					    
			All[i].required=false;
					     
		 }
			for (var i=0; i<document.getElementById("Arme").getElementsByTagName("input").length; i++) {
					    
			document.getElementById("Arme").getElementsByTagName("input")[i].required=false;
					     
		 }
		 document.getElementById("Armeselect").required=false
    		 document.getElementById("Armureselect").required=false

    	}
    	else
    	{
    		document.getElementById("Armure").style.display = "none";
    		document.getElementById("Arme").style.display = "none";
    		 var div = document.getElementById(name);
    		div.style.display = "Block";
    					for (var i=0; i<document.getElementById("Arme").getElementsByTagName("input").length; i++) {
					    
			document.getElementById("Arme").getElementsByTagName("input")[i].required=false;
					     
		 }
		 					for (var i=0; i<document.getElementById("Armure").getElementsByTagName("input").length; i++) {
					    
			document.getElementById("Armure").getElementsByTagName("input")[i].required=false;
					     
		 }
		 		 					for (var i=0; i<document.getElementById(name).getElementsByTagName("input").length; i++) {
					    
			document.getElementById(name).getElementsByTagName("input")[i].required=true;
					     
		 }
		 document.getElementById("Armeselect").required=false
    		 document.getElementById("Armureselect").required=false
    		 document.getElementById(name+"select").required=true

    		 
    	}
    }
    function calculerdegats()
    {
    	document.getElementById("degatsmoyen").value=(((parseFloat(document.getElementById("degatsmin").value)+parseFloat(document.getElementById("degatsmax").value)))/2)/document.getElementById("vitesse").value
    }
  </script>
  