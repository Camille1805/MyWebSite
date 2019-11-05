<script>
	            $( document ).ready(function(){
	document.getElementById("titreOnglet").innerHTML="Créer un billet";
      		coverTrigger : false
      	});
</script>
 <div class="row">
    <div class="col s10 offset-s1 m8 offset-m2 l6 offset-l3 ">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title center">Créer un billet</span>
              <form method="POST" action="https://www.camillebalmer.fr/?uc=ajouterbillet">
           
            <div class="row">
    		<div class="input-field  s10 ">
          <input  id="title" name="title" type="text" required class="validate">
          <label for="title">Titre</label>
          </div>
            </div>
              
 
           <div class="row">
        <div class="input-field  s10 ">
          <textarea id="descr" name="descr" style="color:white;" class="materialize-textarea"></textarea>
          <label for="descr">Description</label>
        </div>
        </div>

    <div class="row">
    	    <div class="input-field ">
    	
    <select style="color:white;" id="lesprojet" name="projet">
  <option value="" disabled selected>Choisir un projet</option>
<?php
$lesprojets=$pdo->Getlesprojet();
	foreach($lesprojets as $unprojet)
	{
?>
  <option value="<?php echo $unprojet["Id"]?>"><?php echo $unprojet["NomComplet"]?></option>
<?php		
	}
	?>
    </select>
    <label>Objets</label>
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