<?php
	// si le paramètre action n'est pas positionné alors
	//		si aucun bouton "action" n'a été envoyé alors par défaut on affiche les genres
	//		sinon l'action est celle indiquée par le bouton

	if (!isset($_POST['cmdAction'])){
		 $action = 'afficherPegi';
	}
	else {
		// par défaut
		$action = $_POST['cmdAction'];
	}

	$idPegiModif = -1;		// positionné si demande de modification
	$notification = 'rien';	// pour notifier la mise à jour dans la vue

	// selon l'action demandée on réalise l'action 
	switch($action){

		case 'ajouterNouveauPegi':{		
			if (!empty($_POST['txtlimiteAge']) and(!empty( $_POST['txtdescPegi'])))
			{
				$idPegiNotif = $db->ajouterPegi($_POST['txtlimiteAge'], $_POST['txtdescPegi']);
				// $idGenreNotif est l'idGenre du pegi ajouté
				$notification = 'Ajouté';	// sert à afficher l'ajout réalisé dans la vue
			}
		  break;
		}

		case 'demanderModifierPegi':{
				$idPegiModif = $_POST['txtIdPegi']; // sert à créer un formulaire de modification pour ce genre
			break;
		}
			
		case 'validerModifierPegi':{
			$db->modifierPegi($_POST['txtIdPegi'], $_POST['txtlimiteAge'], $_POST['txtdescPegi']); 
			$idPegiNotif = $_POST['txtIdPegi']; // $idGenreNotif est l'idPegi du genre modifié
			$notification = 'Modifié';  // sert à afficher la modification réalisée dans la vue
			break;
		}

		case 'supprimerPegi':{
			$idPegi = $_POST['txtIdPegi'];
			$db->supprimerPegi($idPegi); //  à compléter, voir quelle méthode appeler dans le modèle			
			break;
		}
	}
		
	// l' affichage des pegi se fait dans tous les cas	
	$tbPegi  = $db->getLesPegi();		
	require 'vue/v_lesPegi.php';

	?>