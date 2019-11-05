<div class="row">
    <div class="col s10 offset-s1 m8 offset-m2 l6 offset-l3 ">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title center">Créer Monstre</span>
              <form method="POST" action="index.php?uc=createmonster">
           
            <div class="row">
    		<div class="input-field  s10 ">
          <input  id="name" name="name" type="text" required class="validate">
          <label for="name">Nom du monstre</label>
          </div>
            </div>
   
           <div class="row">
        <div class="input-field  s10 ">
          <input id="viemini" type="number" min="1" required name="viemini" class="validate">
          <label for="viemini">Vie minimum</label>
        </div>
        </div>
                   <div class="row">
        <div class="input-field  s10 ">
          <input id="zonespawn" type="number" min="1" required name="zonespawn" class="validate">
          <label for="zonespawn">Zone apparition</label>
        </div>
        </div>
                   <div class="row">
        <div class="input-field  s10 ">
          <input id="chance" type="number" step="0.01" required min="0" max="1" name="chance" class="validate">
          <label for="chance">Chance d'empoisoner( entre 0 et 1)</label>
        </div>
        </div>
        
   <div class="row">
 <div class="input-field s10">
    <select required name="type">
      <option value="" disabled selected>Choisir un type de monstre</option>
      <option value="Boss">Boss</option>
      <option value="Mob">Mob</option>
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