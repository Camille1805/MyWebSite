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
	public function Getlesobjets()
	{
		$req = "SELECT * FROM Objets order by Type";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetchall();		
		return $laLigne;
	}
		public function Rechercheobjets($term)
	{
		$req = "SELECT * FROM Objets  where Nom like '%$term%' order by Type";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetchall();		
		return $laLigne;
	}
	public function CreerMonstre($nom,$vieminimum,$zone,$pourc_emp,$type)
	{
		$req = "INSERT INTO `Monstres`( `Nom`, `vie_mini`, `Zone_apparition`, `Chance_emp`, `Type`) VALUES ('$nom',$vieminimum,$zone,$pourc_emp,'$type')";
		$res = PdoSiteEOZ::$monPdo->query($req);
		if($res==null)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
			public function RechercheMonstres($term)
	{
		$req = "SELECT * FROM Monstres  where Nom like '%$term%' order by Type";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetchall();		
		return $laLigne;
	}
	public function supprimerObjets($id)
	{
		$req = "delete from Objets where Id=$id";
		$res = PdoSiteEOZ::$monPdo->query($req);
		echo $req;
		if($res==null)
		{
			return $req;
		}
		else
		{
			return $req;
		}
	}
		public function supprimerMonstre($id)
	{
		$req = "delete from Monstres where id=$id";
		$res = PdoSiteEOZ::$monPdo->query($req);
		echo $req;
		if($res==null)
		{
			return $req;
		}
		else
		{
			return $req;
		}
	}
			public function supprimerRecette($idrecette,$idobj)
	{
		$req = "delete from Recette where Id=$idobj and Id_Objets=$idrecette";
		$res = PdoSiteEOZ::$monPdo->query($req);
		echo $req;
		if($res==null)
		{
			return $req;
		}
		else
		{
			return $req;
		}
	}
				public function supprimerDrop($idmonstre,$idobj)
	{
		$req = "delete from Droper where Id_Objets=$idobj and id=$idmonstre";
		$res = PdoSiteEOZ::$monPdo->query($req);
		if($res==null)
		{
			return $req;
		}
		else
		{
			return $req;
		}
	}
	public function AjouterRecette ($idrecette,$idobj,$quant)
	{
		$req = "Insert into Recette value($idobj,$idrecette,$quant)";

	$res = PdoSiteEOZ::$monPdo->query($req);
		echo $req;
		if($res==null)
		{
			return $req;
		}
		else
		{
			return $req;
		}
	}
		public function AjouterDrop ($idmonstre,$idobj,$chance)
	{
		$req = "Insert into Droper value($idmonstre,$idobj,$chance)";

	$res = PdoSiteEOZ::$monPdo->query($req);
		echo $req;
		if($res==null)
		{
			return $req;
		}
		else
		{
			return $req;
		}
	}
		public function GetlesobjetsDeLaCategorie($nom)
	{
		$req = "SELECT * FROM Objets where Type='$nom'";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetchall();		
		return $laLigne;
	}
		public function GetlesMonstres()
	{
		$req = "SELECT * FROM Monstres order by Type";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetchall();		
		return $laLigne;
	}
			public function GetleMonstre($id)
	{
		$req = "SELECT * FROM Monstres where id=$id";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetch();		
		return $laLigne;
	}
		public function GetlesMonstresDeLaCategorie($nom)
	{
		$req = "SELECT * FROM Monstres where Type='$nom'";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetchall();		
		return $laLigne;
	}
			public function Getlobjet($id,$nom)
	{
		$nom=$nom."s";
		$req;
		if($nom!="Ressources"){
			$req = "SELECT * FROM Objets inner join $nom on Objets.Id=$nom.id   where Objets.Id=$id ";
		}
		else
		{
			$req = "SELECT * FROM Objets   where Objets.Id=$id ";
		}
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetch();		
		return $laLigne;
	}
	public function Getlarecettes($id)
	{
		$req="SELECT * FROM Recette inner join Objets on Objets.id=Recette.Id_Objets where Recette.Id=$id";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetchall();
		return $laLigne;
	}
		public function Getlesdrops($id)
	{
		$req="SELECT * FROM Droper inner join Monstres on Monstres.id=Droper.Id where Droper.Id_Objets=$id";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetchall();
		return $laLigne;
	}
			public function GetlesdropsMonstre($id)
	{
		$req="SELECT * FROM Droper inner join Objets on Droper.Id_Objets=Objets.Id where Droper.id=$id";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetchall();
		return $laLigne;
	}
		public function CreerRessource($id,$name,$descr,$typeobj)
	{
		$req = "INSERT INTO `Objets`(`Id_en_jeu`, `Nom`, `Description`, `Type`) VALUES ($id,'$name','$descr','$typeobj')";
		$res = PdoSiteEOZ::$monPdo->query($req);
		if($res==null)
		{
			return 0;
		}
		else
		{
			return 1;
		}
		
	}
			public function UpdateRessource($id,$idobj,$name,$descr)
	{
		$req = "UPDATE `Objets` SET `Id_en_jeu`=$idobj,`Nom`='$name',`Description`='$descr' WHERE Id=$id";
		$res = PdoSiteEOZ::$monPdo->query($req);
		if($res==null)
		{
			return 0;
		}
		else
		{
			return 1;
		}
		
	}
			public function UpdateArme($id,$idobj,$name,$descr,$degatsmin,$degatsmax,$vitesse,$typearme)
	{
		$req = "UPDATE `Objets` SET `Id_en_jeu`=$idobj,`Nom`='$name',`Description`='$descr' WHERE Id=$id";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$n=1;
		if($res==null)
		{
			$n= 0;
		}
		
		$req = "UPDATE `Armes` SET `degats_min`=$degatsmin,`degats_max`=$degatsmax,`Vitesse`=$vitesse,`Type_Objets`='$typearme' WHERE Id=$id";
		$res = PdoSiteEOZ::$monPdo->query($req);
		if($res==null)
		{
			$n= 0;
		}
		return $n;
	
	}
				public function UpdateArmure($id,$idobj,$name,$descr,$resistance,$vieplus,$typearmure)
	{
		$req = "UPDATE `Objets` SET `Id_en_jeu`=$idobj,`Nom`='$name',`Description`='$descr' WHERE Id=$id";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$n=1;
		if($res==null)
		{
			$n= 0;
		}
		
		$req = "UPDATE `Armures` SET `Pts_def`=$vieplus,`Pourc_resistance`=$resistance,`Type_Armure`='$typearmure' WHERE Id=$id";
		$res = PdoSiteEOZ::$monPdo->query($req);
		if($res==null)
		{
			$n= 0;
		}
		return $n;
	
	}
		public function CreerArme($id,$name,$descr,$typeobj,$degatsmin,$degatsmax,$vitesse,$typearme)
	{
		$req = "INSERT INTO `Objets`(`Id_en_jeu`, `Nom`, `Description`, `Type`)  VALUES ($id,'$name','$descr','$typeobj')";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$n=1;
		if($res==null)
		{
			$n= 0;
		}
		$req="SELECT max(Id) as Id FROM `Objets`";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetch();
		$idobj=$laLigne["Id"];
		$req = "INSERT INTO `Armes`(`Id`, `degats_min`, `degats_max`, `Vitesse`, `Type_Objets`)  VALUES ($idobj,$degatsmin,$degatsmax,$vitesse,'$typearme')";
		$res = PdoSiteEOZ::$monPdo->query($req);
		if($res==null)
		{
			$n= 0;
		}
		return $n;
	
	}
		public function CreerArmure($id,$name,$descr,$typeobj,$resistance,$vieplus,$typearmure)
	{
		$req = "INSERT INTO `Objets`(`Id_en_jeu`, `Nom`, `Description`, `Type`) VALUES ($id,'$name','$descr','$typeobj')";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$n=1;
		if($res==null)
		{
			$n= 0;
		}
		$req="SELECT max(Id) as Id FROM `Objets`";
		$res = PdoSiteEOZ::$monPdo->query($req);
		$laLigne = $res->fetch();
		$idobj=$laLigne["Id"];
		$req = "INSERT INTO `Armures`(`Id`, `Pts_def`, `Pourc_resistance`, `Type_Armure`) VALUES ($idobj,$vieplus,$resistance,'$typearmure')";
		$res = PdoSiteEOZ::$monPdo->query($req);
		if($res==null)
		{
			$n= 0;
		}
		return $n;
		
	}
	
}
?>