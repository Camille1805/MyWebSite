<script>
	            $( document ).ready(function(){
	document.getElementById("titreOnglet").innerHTML="<?php  echo $lajam["Titre"] ?>";
      		coverTrigger : false
      	});
</script>
 <div class="row">
    <div class="col s10 offset-s1 m8 offset-m2 l6 offset-l3 ">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title center">Modifier une jam</span>
              <form method="POST" action="https://www.camillebalmer.fr/?uc=modifjam">
           <input  id="id" name="id" type="hidden" value="<?php echo $lajam["Id"] ?>"  required class="validate">
            <div class="row">
    		<div class="input-field  s10 ">
          <input  id="title" name="title" style="color:white;" type="text" value="<?php echo $lajam["Titre"] ?>" required class="validate">
          <label for="title">Titre de la jam</label>
          </div>
            </div>
              
            <div class="row">
    		<div class="input-field  s10 ">
          <input  id="theme" name="theme" style="color:white;" type="text" value="<?php echo $lajam["Theme"] ?>" required class="validate">
          <label for="theme">Thème</label>
          </div>
            </div>
           <div class="row">
        <div class="input-field  s10 ">
          <textarea id="descr" name="descr" style="color:white;"  class="materialize-textarea"><?php echo str_replace('<br />',"",$lajam["Description"]); ?></textarea>
          <label for="descr">Description</label>
        </div>
        </div>
             <div class="row">
    		<div class="input-field  s10 ">
          <input  id="lien" name="lien" style="color:white;" type="text" value="<?php echo $lajam["Lien"] ?>" required class="validate">
          <label for="lien">Lien</label>
          </div>
            </div>
                        <div class="row">
    		<div class="input-field  s10 ">
          <input  id="ordre" name="ordre" style="color:white;" type="number" value="<?php echo $lajam["Ordre"] ?>" required class="validate">
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