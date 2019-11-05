 <?php
session_start();
require_once("util/fonctions.php");
include("Header.php");
require_once("util/PDOEOZ.php");
$pdo = PdoSiteEOZ::getPdoEOZ();
if(isset($_REQUEST['uc']))
	$uc = $_REQUEST['uc'];
else
	$uc = 'accueil';
switch ($uc)
{
	
		case 'accueil':
		{
			include("vues/v_acc.php");	
			break;
		}
		case'modifierobj':
			{
					if($_POST["typeobj"]=="Ressource")
					{
						$res=$pdo->UpdateRessource($_POST["id"],$_POST["idenjeu"],addslashes($_POST["name"]),addslashes($_POST["descr"]));
					}
					else if($_POST["typeobj"]=="Arme"){
						

						$res=$pdo->UpdateArme($_POST["id"],$_POST["idenjeu"],addslashes($_POST["name"]),addslashes($_POST["descr"]),$_POST["degatsmin"],$_POST["degatsmax"],$_POST["vitesse"],$_POST["typearme"]);
					}
					else if($_POST["typeobj"]=="Armure"){
						$res=$pdo->UpdateArmure($_POST["id"],$_POST["idenjeu"],addslashes($_POST["name"]),addslashes($_POST["descr"]),$_POST["res"],$_POST["ptsvieenplus"],$_POST["typearmure"]);
					}
					if($res==1)
					{
						$message="Modification reussie";
					}
					else{
						$message="La modification à echouée";
					}
					include("v_message.php");
					echo '<script type="text/javascript">';
					echo 'reload("http://www.camillebalmer.fr/WikiEOZ/",5000)';
					echo '</script>';
				break;
			}
		case'supprimerobjetrecette':
			{
				$pdo->supprimerRecette($_GET["idobjrecette"],$_GET["idobj"]);
				break;
			}
			case'supprimerDrop':
				{
					$pdo->supprimerDrop($_GET["idobjetmonstre"],$_GET["idobjet"]);
					break;
				}
			case'ajouterobjetrecette':
				{
					$pdo->AjouterRecette($_GET["idobjrecette"],$_GET["idobj"],$_GET["quant"]);
					break;
				}
				case'ajouterdrop':
					{
						$pdo->AjouterDrop($_GET["imonstre"],$_GET["idobj"],$_GET["chance"]);
						break;
					}
		case 'modifiermonstre':
			{
				//formulaire de modification monstre
				if(estConnecte()){
					$unmonstre=$pdo->GetleMonstre($_GET["id"]);
					$lesdrops=$pdo->GetlesdropsMonstre($_GET["id"]);
					include("WikiEOZ/vues/Monstres/v_modifiermonstre.php");
				}
				else
				{
					echo "Accés interdit";
				}
				break;
			}
			case'modifiermonster':
				{
					//modification monstre
					$pdo->UpdateMonster($_POST["name"],addslashes ($_POST["name"]),$_POST["viemini"],$_POST["zonespawn"],$_POST["chance"],addslashes ($_POST["type"]));
					break;
				}
			case 'modifierobjet':
			{
				if(estConnecte()){
				$unobjet=$pdo->Getlobjet($_GET["id"],$_GET["type"]);
				$larecette=$pdo->Getlarecettes($_GET["id"]);
				$lesdrops=$pdo->Getlesdrops($_GET["id"]);
				include("vues/Objets/v_modifierlobjet.php");
				}
				else
				{
					echo "Accés interdit";
				}
				break;
			}
			case'createobjet':
				{
					$res;
					if($_POST["typeobj"]=="Ressource")
					{
						$res=$pdo->CreerRessource($_POST["id"],addslashes($_POST["name"]),addslashes($_POST["descr"]),$_POST["typeobj"]);
					}
					else if($_POST["typeobj"]=="Arme"){
						$res=$pdo->CreerArme($_POST["id"],addslashes($_POST["name"]),addslashes($_POST["descr"]),$_POST["typeobj"],$_POST["degatsmin"],$_POST["degatsmax"],$_POST["vitesse"],$_POST["typearme"]);
					}
					else if($_POST["typeobj"]=="Armure"){
						$res=$pdo->CreerArmure($_POST["id"],addslashes($_POST["name"]),addslashes($_POST["descr"]),$_POST["typeobj"],$_POST["res"],$_POST["ptsvieenplus"],$_POST["typearmure"]);
					}
					if($res==1)
					{
						$message="Création reussie";
					}
					else{
						$message="La création à echouée";
					}
					include("v_message.php");
	
					break;
				}
			case'supprimermonstre':
				{
					
					$res=$pdo->supprimerMonstre($_GET["delete"]);
					break;
				}
				case'supprimerobjet':
				{
					
					$res=$pdo->supprimerObjets($_GET["delete"]);
					break;
				}
			case 'newmonstre':
			{
				if(estConnecte()){
					include("vues/Monstres/v_creerMonstre.php");
				}
				else
				{
					echo "Accés interdit";
				}
				break;
			}
			case 'newobject':
			{
				if(estConnecte()){
					include("vues/Objets/v_creerobjet.php");
				}
				else
				{
					echo "Accés interdit";
				}
				break;
			}
			case'createmonster':
				{
					if(estConnecte()){
						$res=$pdo->CreerMonstre(addslashes ($_POST["name"]),$_POST["viemini"],$_POST["zonespawn"],$_POST["chance"],addslashes ($_POST["type"]));
						if($res==1)
						{
							$message="Création reussi ";
							include("v_message.php");
						}
						else
						{
							$message="Erreur";
							include("v_message.php");
						}
					}
					else
					{
						echo "Accés interdit";
					}
					break;
				}
		case'recherche':
			{
				
				$lesmonstres=$pdo->RechercheMonstres($_POST["term"]);
				$lesobjets=$pdo->Rechercheobjets($_POST["term"]);
				if(sizeof($lesmonstres)>0 || sizeof($lesobjets)>0){
				include("vues/Objets/v_lesobjets.php");
				include("vues/Monstres/v_lesmonstre.php");
				}
				else
				{
					echo "Rien trouvé";
				}
				break;
			}
		case 'connec':
			{
				$user=strtoupper($_REQUEST['user']);
				$mdp=$_REQUEST['passw'];
				$mdp=md5($mdp);
				$n=$pdo->Valideruser($user,$mdp);
				if($n==1)
				{
					enregUser(1);
					$message="Connexion reussi !";
					header ("Refresh: 2;URL=https://www.camillebalmer.fr/");
					include("v_message.php");
					
				}
				else
				{
						$message="Connexion echoué :/ !";
						include("v_message.php");
						include("v_connexion.php");
				}
				break;
			}
			case 'voirlesobjets':
		{
			$lesobjets=$pdo->Getlesobjets();
			include("vues/Objets/v_lesobjets.php");	
			break;
		}
					case 'voirlesmonstres':
		{
			$lesmonstres=$pdo->GetlesMonstres();
			include("vues/Monstres/v_lesmonstre.php");	
			break;
		}
		case 'voircategorie':
		{
			$lesobjets=$pdo->GetlesobjetsDeLaCategorie($_GET["nom"]);
			include("vues/Objets/v_lesobjets.php");	
			break;
		}
		case 'voircategorieMonstre':
		{
			$lesmonstres=$pdo->GetlesMonstresDeLaCategorie($_GET["nom"]);
			include("vues/Monstres/v_lesmonstre.php");	
			break;
		}
		case 'voirunobjet':
			{
			$unobjet=$pdo->Getlobjet($_GET["id"],$_GET["type"]);
			$larecette=$pdo->Getlarecettes($_GET["id"]);
			$lesdrops=$pdo->Getlesdrops($_GET["id"]);
			include("vues/Objets/v_lobjet.php");	
				break;
			}
			case'voirunmonstre':
				{
					$unmonstre=$pdo->GetleMonstre($_GET["id"]);
					$lesdrops=$pdo->GetlesdropsMonstre($_GET["id"]);
					include("vues/Monstres/v_lemonstre.php");
					break;
				}
				case'coadmin':
					{
						include("v_connexion.php");
						break;
					}
		case 'deco':
		{
			deconnexion();
			$message="Déconnexion reussi !";
			header ("Refresh: 2;URL=https://www.camillebalmer.fr/");
			include("v_message.php");
		break;
		}
}
include("footer.php");	
?>


