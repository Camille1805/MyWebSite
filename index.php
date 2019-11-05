 <?php
session_start();
require_once("util/fonctions.php");

require_once("util/PDOEOZ.php");
$pdo = PdoSiteEOZ::getPdoEOZ();
$lesprojets=$pdo->Getlesprojet();
$lesjam=$pdo->GetlesJams();
$lesxppro=$pdo->GetlesXP();
include("Header.php");
if(isset($_REQUEST['uc']))
	$uc = $_REQUEST['uc'];
else
	$uc = 'accueil';
if(isset($_REQUEST['lang']))
	$lang = $_REQUEST['lang'];
else
	 $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2)[0];
switch ($uc)
{
	
		case 'accueil':
		{
			include("vues/v_acc.php");
			$lesbillets=$pdo->GetlesBillets();
			$lesprojets=$pdo->Getlesprojet();
			$lesjam=$pdo->GetlesJams();
			include("vues/Billets/v_lesbillets.php");
			
			break;
		}
		case'modifierxp':
		{
				if(estConnecte()){
			$lexperience=$pdo->GetLexperiencePro($_GET["id"]);
			include("vues/Xppro/v_modifierexperiencepro.php");
				}
			break;
		}
		case'modifxppro':
			{
					if(estConnecte()){
				$pdo->UpdateXpPro($_POST["title"],addslashes(nl2br($_POST["descr"])),$_POST["entreprise"],$_POST["ordre"],$_POST["id"]);
					}
				break;
			}
		case'supprimerjam':
			{
					if(estConnecte()){
				$pdo->SupprimerJam($_GET["delete"]);
					}
				break;
			}
			case'modifierbillet':
			{
					if(estConnecte()){
				$lebillet=$pdo->GetleBillet($_GET["id"]);
				include("vues/Billets/v_modifierbillet.php");
					}
				break;
			}
		case 'voirbillett':
		{
			$lesimages=$pdo->GetlesImagesBillet($_GET["id"]);
			$lebillet=$pdo->GetleBillet($_GET["id"]);
			include("vues/Billets/v_lebillets.php");
			break;
		}
		case'modifierjam':
		{
				if(estConnecte()){
			$lajam=$pdo->GetLaJam($_GET["id"]);
			include("vues/Jam/v_modifierjam.php");
				}
			break;
		}
		case'modifjam':
		{
				if(estConnecte()){
				$pdo->UpdateJam($_POST["title"],$_POST["theme"],addslashes(nl2br($_POST["descr"])),$_POST["lien"],$_POST["ordre"],$_POST["id"]);
				}
				break;
		}
			case'supprimerbillet':
			{
					if(estConnecte()){
				$pdo->SupprimerBillet($_GET["delete"]);
					}
				break;
			}
			case'supprimerxp':
			{
					if(estConnecte()){
				$pdo->SupprimerXp($_GET["delete"]);
					}
				break;
			}
		case'voirjam':
			{
				
					$lajam=$pdo->GetLaJam($_GET["id"]);
					$lesimages=$pdo->GetlesImagesJam($_GET["id"]);
					include("vues/Jam/v_lajam.php");
				
				break;
			}
			case'ajouterjam':{
				if(estConnecte()){
					$fichier="";
					if(isset($_FILES['photos']))
					{
						$fichier = basename($_FILES['photos']['name'][0]);
					 if(move_uploaded_file($_FILES['photos']['tmp_name'][0], "images/".($fichier))) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
					 {
					 }
			
					}
				
				$pdo->AjouterJam($_POST["title"],$_POST["theme"],addslashes(nl2br($_POST["descr"])),$_POST["lien"],$_POST["ordre"],$fichier);
				}
				break;
			}
			case'voirxp':
			{
				$lexperience=$pdo->GetLexperiencePro($_GET["id"]);
				$lesimages=$pdo->GetlesImagesXpPro($_GET["id"]);
				include("vues/Xppro/v_laexperiencepro.php");
				break;
			}
			case'ajoutjam':
			{
					if(estConnecte()){
				include("vues/Jam/v_creerjam.php");
					}
				break;
			}
			case'ajoutxppro':
			{
					if(estConnecte()){
				include("vues/Xppro/v_creerexperiencepro.php");
					}
				break;
			}
			case'ajoutbillet':
			{
					if(estConnecte()){
				include("vues/Billets/v_creerbillet.php");
					}
				break;
			}
			case'ajouterxppro':
			{
					if(estConnecte()){
				$pdo->AjouterExperiencePro($_POST["title"],addslashes(nl2br($_POST["descr"])),$_POST["entreprise"],$_POST["ordre"]);
					}
				break;
			}
			case'ajouterbillet':
			{
					if(estConnecte()){
				$pdo->AjouterBillet($_POST["projet"],addslashes($_POST["title"]),addslashes(nl2br($_POST["descr"])));
					}
				break;
			}
			case'modifbillet':
			{
					if(estConnecte()){
				$pdo->UpdateBillet($_POST["projet"],addslashes($_POST["title"]),addslashes(nl2br($_POST["descr"])),$_POST["id"]);
					}
				break;
			}

case'voirprojet':
	{
		$lesimages=$pdo->GetlesImagesProjet($_GET["id"]);
		$lesliens=$pdo->Getlesliens($_GET["id"]);
		$leprojet=$pdo->Getleprojet($_GET["id"]);
		include("vues/Projets/v_leprojet.php");
		break;
	}
	case'portfolio':{
		include("vues/v_portfolio.php");
		break;
	}
	case'ajoutprojet':
	{
			if(estConnecte()){
		include("vues/Projets/v_creerleprojet.php");
			}
		break;
	}
	case'ajouterprojet':
	{
			if(estConnecte()){
		$descr=nl2br($_POST["descr"]);
		$pdo->AjouterProjet(addslashes($_POST["name"]),addslashes($_POST["namenav"]),addslashes($descr),addslashes($_POST["debut"]),addslashes($_POST["fin"]),addslashes($_POST["etat"]),$_POST["ordre"]);
			}
		break;
	}
	case'modifierprojet':
		{
				if(estConnecte()){
			$descr=nl2br($_POST["descr"]);
			$pdo->UpdateProjet(addslashes($_POST["name"]),addslashes($_POST["namenav"]),addslashes($descr),addslashes($_POST["debut"]),addslashes($_POST["fin"]),addslashes($_POST["etat"]),$_POST["id"]);
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
					include("v_message.php");
					//header ("Refresh: 2;URL=https://www.camillebalmer.fr/");
					echo "<script>reload('https://www.camillebalmer.fr',100)</script>";
					
				}
				else
				{
						$message="Connexion echoué :/ !";
						include("v_message.php");
						include("v_connexion.php");
				}
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
			include("v_message.php");
			echo "<script>reload('https://www.camillebalmer.fr',100)</script>";
		break;
		}

}
include("footer.php");	
?>


