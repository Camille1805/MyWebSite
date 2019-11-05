  <!DOCTYPE html>
  <html>
  <style>
   body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }
  
  </style>
    <head>
    	<title>EOZ wiki</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1.0"/>
    </head>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

    <body>
    <header>
<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
  <li><a href="https://www.camillebalmer.fr/WikiEOZ/?uc=newobject">Ajouter Objets</a></li>
  <li><a href="https://www.camillebalmer.fr/WikiEOZ/?uc=newmonstre">Ajouter monstres</a></li>
  <li class="divider"></li>
  <li><a href="https://www.camillebalmer.fr/WikiEOZ/?uc=deco"><i  class="material-icons">power_settings_new</i>Deco</a></li>
</ul>
<ul id="dropdown2" class="dropdown-content">
  <li><a href="https://www.camillebalmer.fr/WikiEOZ/?uc=newobject">Ajouter Objets</a></li>
  <li><a href="https://www.camillebalmer.fr/WikiEOZ/?uc=newmonstre">Ajouter monstres</a></li>
  <li class="divider"></li>
  <li><a href="https://www.camillebalmer.fr/WikiEOZ/?uc=deco"><i  class="material-icons">power_settings_new</i>Deco</a></li>
</ul>
<nav>
  <div class="nav-wrapper black darken-1">
    <a  href="https://www.camillebalmer.fr/WikiEOZ/" class="left brand-logo hide-on-large-only">EOZ Wiki</a>
     <a href="https://www.camillebalmer.fr/WikiEOZ/" class="left brand-logo hide-on-med-and-down">EOZ Wiki</a>
     

    <ul class="right hide-on-med-and-down">
		<li>          
		<form method="POST" action="https://www.camillebalmer.fr/WikiEOZ/?uc=recherche" >
		<div class="input-field " >
		<i class="material-icons prefix">search</i>
          <input name="term" placeholder="Recherche" style="color:white;border-bottom-color:red;" id="first_name" type="text" class="validate">
        </div>
     </form>
      </li>
      <li><a href="https://www.camillebalmer.fr/WikiEOZ/?uc=voirlesobjets">Objets</a></li>
      <li><a href="https://www.camillebalmer.fr/WikiEOZ/?uc=voirlesmonstres">Monstres</a></li>
      <?php
      if(estConnecte()){
      ?>
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Admin<i class="material-icons right">arrow_drop_down</i></a></li>
<?php
}
else{
      ?>
            <li><a href="https://www.camillebalmer.fr/WikiEOZ/?uc=coadmin">Connnexion admin</a></li>
      <?php }?>
    </ul>
    <ul class="right">
      <li><a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a></li>
</ul>
  </div>
</nav>

  <ul id="slide-out" class="sidenav">
  		<li>          
		<form method="POST" action="https://www.camillebalmer.fr/WikiEOZ/?uc=recherche" >
		<div class="input-field " style="border-color:white;">
				<i class="material-icons prefix">search</i>
          <input name="term" placeholder="Recherche" style="color:black;" id="first_name" type="text" class="validate">
        </div>
     </form>
      </li>
      <li><a href="https://www.camillebalmer.fr/WikiEOZ/?uc=voirlesobjets">Objets</a></li>
      <li><a href="https://www.camillebalmer.fr/WikiEOZ/?uc=voirlesmonstres">Monstres</a></li>
      <!-- Dropdown Trigger -->
            <?php

            if(estConnecte()){
      ?>
      <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">Admin<i class="material-icons right">arrow_drop_down</i></a></li>
      <?php
}
else{
      ?>
            <li><a href="https://www.camillebalmer.fr/WikiEOZ/?uc=coadmin">Connnexion admin</a></li>
      <?php }?>
  </ul>
        
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"> </script>
      <script>
            $( document ).ready(function(){
      	$(".dropdown-trigger").dropdown({
      		coverTrigger : false
      	});
      	$('.sidenav').sidenav();
      })
       $(document).ready(function(){
    $('select').formSelect();
  });
    $(document).ready(function(){
    $('.collapsible').collapsible();
  });
      </script>
      </header>
      <main>
        <script>
function reload(adresse,temps){
setTimeout(function(){
	window.location.href="/"
}, temps);
}
</script>

