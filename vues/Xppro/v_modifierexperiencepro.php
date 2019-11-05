<script>
	            $( document ).ready(function(){
	document.getElementById("titreOnglet").innerHTML="Modifier experience pro";
      		coverTrigger : false
      	});
</script>
 <div class="row">
    <div class="col s10 offset-s1 m8 offset-m2 l6 offset-l3 ">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title center">Modifier experience pro</span>
              <form method="POST" action="https://www.camillebalmer.fr/?uc=modifxppro">
            <input  id="id" name="id" type="hidden" value="<?php echo $lexperience["Id"] ?>" required class="validate">
            <div class="row">
    		<div class="input-field  s10 ">
          <input  id="title" name="title" value="<?php echo $lexperience["Nom"] ?>" type="text" required class="validate">
          <label for="title">Titre</label>
          </div>
            </div>
              
 
           <div class="row">
        <div class="input-field  s10 ">
          <textarea id="descr" name="descr" style="color:white;" class="materialize-textarea"><?php echo str_replace('<br />',"",$lexperience["Description"]); ?></textarea>
          <label for="descr">Description</label>
        </div>
        </div>
             <div class="row">
    		<div class="input-field  s10 ">
          <input  id="entreprise" name="entreprise" value="<?php echo $lexperience["Entreprise"] ?>" type="text" required class="validate">
          <label for="entreprise">Entreprise</label>
          </div>
            </div>
                          <div class="row">
    		<div class="input-field  s10 ">
          <input  id="ordre" name="ordre" type="number" value="<?php echo $lexperience["Ordre"] ?>" required class="validate">
          <label for="ordre">Ordre</label>
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