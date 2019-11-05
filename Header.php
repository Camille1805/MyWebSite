  <!DOCTYPE html>
  <html lang="fr">
  	<meta name="Description" content="Put your description here.">

  <style>
   body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
    background-image:url(images/BG.jpg);

  }

  main {
    flex: 1 0 auto;
  }

  </style>
    <script>
    if(window.location.protocol=="http:"){
	window.location.href="https://www.camillebalmer.fr/"
  }
  </script>
    <head>
    	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-132677097-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-132677097-1');
</script>

    	<title id="titreOnglet"></title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1.0"/>
    </head>

   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <body>
    <header>
    	<ul id="dropdownprojet" class="dropdown-content">
    		<?php 
    		foreach($lesprojets as $unprojet){
    		?>
  <li><a href="https://www.camillebalmer.fr/?uc=voirprojet&id=<?php echo $unprojet["Id"]; ?>"><?php echo $unprojet["NomNav"]; ?></a></li>
  <?php }?>
</ul>

    	<ul id="dropdownprojet2" class="dropdown-content">
    		<?php 
    		foreach($lesprojets as $unprojet){
    		?>
  <li><a href="https://www.camillebalmer.fr/?uc=voirprojet&id=<?php echo $unprojet["Id"]; ?>"><?php echo $unprojet["NomNav"]; ?></a></li>
  <?php }?>
</ul>
    	<ul id="dropdownjam" class="dropdown-content">
    		<?php 
    		foreach($lesjam as $unejam){
    		?>
  <li><a href="https://www.camillebalmer.fr/?uc=voirjam&id=<?php echo $unejam["Id"]; ?>"><?php echo $unejam["Titre"]; ?></a></li>
  <?php }?>
</ul>

    	<ul id="dropdownjam2" class="dropdown-content">
    		<?php 
    		foreach($lesjam as $unejam){
    		?>
  <li><a href="https://www.camillebalmer.fr/?uc=voirjam&id=<?php echo $unejam["Id"]; ?>"><?php echo $unejam["Titre"]; ?></a></li>
  <?php }?>
</ul>
    	<ul id="dropdownxppro" class="dropdown-content">
    		<?php 
    		foreach($lesxppro as $unexp){
    		?>
  <li><a href="https://www.camillebalmer.fr/?uc=voirxp&id=<?php echo $unexp["Id"]; ?>"><?php echo $unexp["Nom"]; ?></a></li>
  <?php }?>
</ul>
    	<ul id="dropdownlangue" class="dropdown-content">
   
  <li><a href="https://www.camillebalmer.fr">Fr</a></li>
  <li><a href="https://www.camillebalmer.fr">Eng</a></li>

</ul>

    	<ul id="dropdownxppro2" class="dropdown-content">
    		<?php 
    		foreach($lesxppro as $unexp){
    		?>
  <li><a href="https://www.camillebalmer.fr/?uc=voirxp&id=<?php echo $unexp["Id"]; ?>"><?php echo $unexp["Nom"]; ?></a></li>
  <?php }?>
</ul>



<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
  <li><a href="https://www.camillebalmer.fr/?uc=ajoutprojet">Ajouter projets</a></li>
    <li><a href="https://www.camillebalmer.fr/?uc=ajoutjam">Ajouter jam</a></li>
  <li><a href="https://www.camillebalmer.fr/?uc=ajoutxppro">Ajouter experience</a></li>
  <li><a href="https://www.camillebalmer.fr/?uc=ajoutbillet">Ajouter billet</a></li>
  <li class="divider"></li>
  <li><a href="https://www.camillebalmer.fr/?uc=deco"><i  class="material-icons">power_settings_new</i>Deco</a></li>
</ul>

<ul id="dropdown2" class="dropdown-content">
  <li><a href="https://www.camillebalmer.fr/?uc=ajoutprojet">Ajouter projets</a></li>
  <li><a href="https://www.camillebalmer.fr/?uc=ajoutjam">Ajouter jam</a></li>
  <li><a href="https://www.camillebalmer.fr/?uc=ajoutxppro">Ajouter experience</a></li>
  <li><a href="https://www.camillebalmer.fr/?uc=ajoutbillet">Ajouter billet</a></li>

  <li class="divider"></li>
  <li><a href="https://www.camillebalmer.fr/?uc=deco"><i  class="material-icons">power_settings_new</i>Deco</a></li>
</ul>





<nav>
  <div class="nav-wrapper black darken-1">
    <a  href="https://www.camillebalmer.fr/" class="left brand-logo hide-on-large-only">Camille BALMER</a>
     <a href="https://www.camillebalmer.fr/" class="left brand-logo hide-on-med-and-down">Camille BALMER</a>
     

    <ul class="right hide-on-med-and-down">

 <li><a class="dropdown-trigger" href="#!" data-target="dropdownprojet"><i  class="material-icons left">videogame_asset</i>My projects</a></li>
  <li><a class="dropdown-trigger" href="#!" data-target="dropdownjam"><i  class="material-icons left">videogame_asset</i>My game jams</a></li>
  <li><a class="dropdown-trigger" href="#!" data-target="dropdownxppro"><i  class="material-icons left">web</i>My experience</a></li>

 <li><a href="https://www.camillebalmer.fr/?uc=portfolio"><i  class="material-icons left">person</i>CV</a></li>

      <?php
      if(estConnecte()){
      ?>
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Admin<i class="material-icons right">arrow_drop_down</i></a></li>
<?php
}
else{
      ?>
            <li><a href="https://www.camillebalmer.fr/?uc=coadmin">Connnexion admin</a></li>
      <?php }?>
        <li><a class="dropdown-trigger" href="#!" data-target="dropdownlangue"><i  class="material-icons left">language</i>Language</a></li>

    </ul>
    <ul class="right">
      <li><a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a></li>
</ul>

  </div>
</nav>

  <ul id="slide-out" class="sidenav">
 <li><a class="dropdown-trigger" href="#!" data-target="dropdownprojet2"><i  class="material-icons left">videogame_asset</i>My projects</a></li>
  <li><a class="dropdown-trigger" href="#!" data-target="dropdownjam2"><i  class="material-icons left">videogame_asset</i>My game jams</a></li>
  <li><a class="dropdown-trigger" href="#!" data-target="dropdownxppro2"><i  class="material-icons left">web</i>My experience</a></li>

      <li><a href="https://www.camillebalmer.fr/?uc=portfolio"><i  class="material-icons left">person</i>CV</a></li>

      <!-- Dropdown Trigger -->
            <?php

            if(estConnecte()){
      ?>
      <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">Admin<i class="material-icons right">arrow_drop_down</i></a></li>
      <?php
}
else{
      ?>
            <li><a href="https://www.camillebalmer.fr/?uc=coadmin">Connnexion admin</a></li>
      <?php }?>
  </ul>
        
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"> </script>
      <script>
      function reload(adresse,temps){
setTimeout(function(){
	window.location.href="/"
}, temps);
}
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

</script>

