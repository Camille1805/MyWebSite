  <script>
	            $( document ).ready(function(){
	document.getElementById("titreOnglet").innerHTML="Créer un projet";
      		coverTrigger : false
      	});
</script>

<div class="row">
    <div class="col s10 offset-s1 m8 offset-m2 l6 offset-l3 ">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title center">Créer Un projet</span>
              <form method="POST" action="https://www.camillebalmer.fr/?uc=ajouterprojet">
           
            <div class="row">
    		<div class="input-field  s10 ">
          <input  id="name" name="name" type="text" required class="validate">
          <label for="name">Nom du Projet</label>
          </div>
            </div>
              
            <div class="row">
    		<div class="input-field  s10 ">
          <input  id="namenav" name="namenav" type="text" required class="validate">
          <label for="namenav">Nom nav</label>
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
          <input  id="debut" name="debut" type="text" required class="validate">
          <label for="debut">Début du Projet</label>
          </div>
            </div>
              
            <div class="row">
    		<div class="input-field  s10 ">
          <input  id="fin" name="fin" type="text"  class="validate">
          <label for="fin">Fin fu projet</label>
          </div>
            </div>
                                    <div class="row">
    		<div class="input-field  s10 ">
          <input  id="ordre" name="ordre" type="number" required class="validate">
          <label for="ordre">Ordre</label>
          </div>
            </div>
   <div class="row">
 <div class="input-field s10">
    <select required name="etat">
      <option value="" disabled selected>Choisir un etat</option>
      <option value="In progress">In progress</option>
      <option value="Completed">Completed</option>
      
    </select>
    <label>Type monstre</label>
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