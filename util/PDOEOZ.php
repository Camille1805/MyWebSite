<?php
class PdoSiteEOZ
{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=eoz-wiki_ds5l';   		
      	private static $user='eoz-wiki_ds5l' ;    		
      	private static $mdp='V32i#t#E' ;	
		private static $monPdo;
		private static $monPdoCamille = null;
/**
 * Constructeur privÈ, crÈe l'instance de PDO qui sera sollicitÈe
 * pour toutes les mÈthodes de la classe
 */				
	private function __construct()
	{
    		PdoSiteEOZ::$monPdo = new PDO(PdoSiteEOZ::$serveur.';'.PdoSiteEOZ::$bdd, PdoSiteEOZ::$user, PdoSiteEOZ::$mdp); 
			PdoSiteEOZ::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoSiteEOZ::$monPdo = null;
	}
/**
 * Fonction statique qui crÈe l'unique instance de la classe
 *
 * Appel : $instancePdolafleur = PdoLafleur::getPdoLafleur();
 * @return l'unique objet de la classe PdoLafleur
 */
	public  static function getPdoEOZ()
	{
		if(PdoSiteEOZ::$monPdoCamille == null)
		{
			PdoSiteEOZ::$monPdoCamille= new PdoSiteEOZ();
		}
		return PdoSiteEOZ::$monPdoCamille;  
	}
		public function Valideruser($user,$mdp)
	{
		$req = "Select Nom_compte,Mdp from utilisateur where Nom_compte='$user'and Mdp='$mdp'";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetch();
		$user2=$laLigne['Nom_compte'];
		$mdp2=$laLigne['Mdp'];
		if($user==$user2 && $mdp==$mdp2)
		{
			$res=1;	
		}
		else
		{
		
			$res=0;
		}
		return $res;
	}
	//fonction test pour la recuperation de donnée sur unity

		public function Getlesprojet()
	{
		$req = "SELECT * FROM Projet order by Ordre";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetchall();		
		return $laLigne;
	}
			public function GetLaJam($id)
	{
		$req = "SELECT * FROM GameJam where Id=$id";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetch();		
		return $laLigne;
	}
	public function GetlesBillets()
	{
		$req = "SELECT * FROM Billet inner join Projet on Billet.IdProjet=Projet.ID order by Date desc";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetchall();		
		return $laLigne;	
	}
			public function GetlesJams()
	{
		$req = "SELECT * FROM GameJam order by Ordre";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetchall();		
		return $laLigne;
	}
	public function GetlesXP()
	{
		$req = "SELECT * FROM ExperiencePro order by Ordre";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetchall();		
		return $laLigne;
	}
	public function Getlesliens($id)
	{
		$req = "SELECT * FROM Possede inner join Liens on Possede.Id=Liens.id where Id_Projet=$id";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetchall();		
		return $laLigne;
	}
	public function Getleprojet($id)
	{
		$req = "SELECT * FROM Projet where Id=$id";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetch();		
		return $laLigne;
	}
	public function SupprimerBillet($id)
	{
		$req="delete from Billet where Idbillet=$id";
		$res = PdoSiteEOZ::$monPdo->query($req);

	}
	public function SupprimerJam($id)
	{
		$req="delete from GameJam where Id=$id";
		$res = PdoSiteEOZ::$monPdo->query($req);

	}
	public function SupprimerXp($id)
	{
		$req="delete from  ExperiencePro where Id=$id";
		$res = PdoSiteEOZ::$monPdo->query($req);

	}
		public function GetleBillet($id)
	{
		$req = "SELECT * FROM Billet where Idbillet=$id";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetch();		
		return $laLigne;
	}
		public function GetLexperiencePro($id)
	{
		$req = "SELECT * FROM  ExperiencePro where Id=$id";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetch();		
		return $laLigne;
	}
	public function AjouterProjet($name,$namenav,$descr,$debut,$fin,$etat,$ordre)
	{
		$req = "INSERT INTO `Projet`( `NomNav`, `NomComplet`, `Etat`, `Description`, `AnneeDebut`, `AnneeFin`,Ordre) VALUES ('$namenav','$name','$etat','$descr','$debut','$fin',$ordre)";
		
		$res = PdoSiteEOZ::$monPdo->query($req);
	}
	public function UpdateProjet($name,$namenav,$descr,$debut,$fin,$etat,$id)
	{
		$req = "UPDATE `Projet` SET `NomNav`='$namenav',`NomComplet`='$name',`Etat`='$etat',`Description`='$descr',`AnneeDebut`='$debut',`AnneeFin`='$fin' WHERE Id=$id";
		$res = PdoSiteEOZ::$monPdo->query($req);
	}
	public function GetlesImagesJam($id)
	{
		$req = "SELECT * FROM Medias where idJam=$id";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetchall();		
		return $laLigne;
	}
	public function AjouterJam($titre,$theme,$descr,$lien,$ordre,$fichier)
	{
		$req="INSERT INTO `GameJam`( `Titre`, `Theme`, `Description`, `Lien`,Ordre,PhotoCouverture) VALUES ('$titre','$theme','$descr','$lien',$ordre,'images/$fichier')";
		$res = PdoSiteEOZ::$monPdo->query($req);
	}
	public function UpdateJam($titre,$theme,$descr,$lien,$ordre,$idjam)
	{
		$req="UPDATE `GameJam` SET Titre='$titre',Theme='$theme',Description='$descr',Ordre=$ordre,Lien='$lien' WHERE Id=$idjam";
		$res = PdoSiteEOZ::$monPdo->query($req);
	}
	public function GetlesImagesXpPro($id)
	{
		$req = "SELECT * FROM Medias where idxxpro=$id";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetchall();		
		return $laLigne;
	}
		public function GetlesImagesBillet($id)
	{
		$req = "SELECT * FROM Medias where Idbillet=$id";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetchall();		
		return $laLigne;
	}
	public function AjouterExperiencePro($titre,$descr,$entreprise,$ordre)
	{
		$req="INSERT INTO `ExperiencePro`(`Nom`, `Description`, `Entreprise`, `Ordre`) VALUES ('$titre','$descr','$entreprise',$ordre)";
		$res = PdoSiteEOZ::$monPdo->query($req);
	}
		public function UpdateXpPro($titre,$descr,$entreprise,$ordre,$id)
	{
		$req="UPDATE `ExperiencePro` SET Nom='$titre',Description='$descr',Entreprise='$entreprise',Ordre=$ordre WHERE Id=$id";
		$res = PdoSiteEOZ::$monPdo->query($req);
	}
	public function AjouterBillet($idprojet,$title,$descr)
	{
		$req="INSERT INTO `Billet`(`IdProjet`, `Titre`, `Contenu`) VALUES ($idprojet,'$title','$descr')";
		$res = PdoSiteEOZ::$monPdo->query($req);
	}
	public function UpdateBillet($idprojet,$title,$descr,$idbillet)
	{
		$req="UPDATE `Billet` SET IdProjet=$idprojet,Titre='$title',Contenu='$descr' WHERE Idbillet=$idbillet";
		$res = PdoSiteEOZ::$monPdo->query($req);
	}
	public function GetlesImagesProjet($id)
	{
		$req = "SELECT * FROM Medias where idprojet=$id";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetchall();		
		return $laLigne;
	}
	public function GetlanguagesProgrammation(){
		$req = "SELECT * FROM langageprogr";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetchall();		
		return $laLigne;
	}
	public function Getlanguages(){
		$req = "SELECT * FROM langues";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetchall();		
		return $laLigne;
	}
	public function GetprojetCV(){
		$req = "SELECT * FROM projetcv";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetchall();		
		return $laLigne;
	}
		public function GetXpProCV(){
		$req = "SELECT * FROM experienceprocv";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetchall();		
		return $laLigne;
	}
			public function GetEtudes(){
		$req = "select * from Etudes order by current desc ";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetchall();		
		return $laLigne;
	}
}
?>