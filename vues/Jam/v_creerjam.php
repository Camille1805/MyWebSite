<script>
	            $( document ).ready(function(){
	document.getElementById("titreOnglet").innerHTML="Créer une jam";
      		coverTrigger : false
      	});
</script>
 <div class="row">
    <div class="col s10 offset-s1 m8 offset-m2 l6 offset-l3 ">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title center">Créer une jam</span>
              <form method="POST"  action="https://www.camillebalmer.fr/?uc=ajouterjam" enctype="multipart/form-data">
           
            <div class="row">
    		<div class="input-field  s10 ">
          <input  id="title" name="title" type="text" required class="validate">
          <label for="title">Titre de la jam</label>
          </div>
            </div>
              
            <div class="row">
    		<div class="input-field  s10 ">
          <input  id="theme" name="theme" type="text" required class="validate">
          <label for="theme">Thème</label>
          </div>
            </div>
           <div class="row">
        <div class="input-field  s10 ">
          <textarea id="descr" name="descr" style="color:white;" class="materialize-textarea"></textarea>
          <label for="descr">Description</label>
        </div>
        </div>
             <div class="row">
    		<div class="input-field  s10 ">
          <input  id="lien" name="lien" type="text" required class="validate">
          <label for="lien">Lien</label>
          </div>
            </div>
                        <div class="row">
    		<div class="input-field  s10 ">
          <input  id="ordre" name="ordre" type="number" required class="validate">
          <label for="ordre">Ordre</label>
          </div>
            </div>
                                   <div class="row">
    		<div class="input-field  s10 ">
            Photo: <input id="photos" type="file" name="photos[]"  accept="image/*" >
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