<script>
	            $( document ).ready(function(){
	document.getElementById("titreOnglet").innerHTML="Connexion";
      		coverTrigger : false
      	});
</script>
<div class="row">
    <div class="col s10 offset-s1">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title center">Connexion admin</span>
              <form method="POST" action="index.php?uc=connec">
           <div class="row">
    		<div class="input-field s10 offset-s1">
          <input  id="user" style="color:white;" name="user" type="text" class="validate">
          <label for="user">Nom de compte</label>
          </div>
            </div>
                  <div class="row">
        <div class="input-field cols10 offset-s1">
          <input id="passw" style="color:white;" type="password" name="passw" class="validate">
          <label for="passw">Password</label>
        </div>
        </div>
          <div class="row">
        <div class="input-field col s10 offset-s1">  
  <button class="btn waves-effect waves-light" type="submit" name="action">Connexion
    <i class="material-icons right">send</i>
  </button>
                
                </div>
        </div>
      
          </form>
      
        
        </div>
  
      </div>
    </div>
  </div>