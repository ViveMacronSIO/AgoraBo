<?php
	//   si le paramètre action n'est pas positionné alors
	//		si aucun bouton "action" n'a été envoyé alors par défaut on affiche les genres
	//		sinon l'action est celle indiquée par le bouton

	if (!isset($_POST['cmdAction'])){
	    $action = 'afficherJeux';
	}
	else {
	// par défat
       $action = $_POST['cmdAction'];
	}

	$refJeuModif = -1;		// positionné si demande de modification
	$notification = 'rien';	// pour notifier la mise à jour dans la vue

	// selon l'action demandée on réalise l'action 
	switch($action){

		case 'ajouterNouveauJeu':{		
			if ((!empty($_POST['txtRefJeu'])) AND (!empty($_POST['lstPlateformes'])) AND (!empty($_POST['lstPegi'])) AND (!empty($_POST['lstGenres'])) AND (!empty($_POST['lstMarques'])) AND (!empty($_POST['txtNom'])) AND (!empty($_POST['txtPrix'])) AND (!empty($_POST['txtdateParution']))) 
            {
				$refJeuNotif = $db->ajouterJeu($_POST['txtRefJeu'], $_POST['lstPlateformes'], $_POST['lstPegi'], $_POST['lstGenres'], $_POST['lstMarques'], $_POST['txtNom'], $_POST['txtPrix'], $_POST['txtdateParution']);
				// $refJeuNotif est la référence du jeu ajouté
				$notification = 'Ajouté';	// sert à afficher l'ajout réalisé dans la vue
			}
		    break;
		}

		case 'demanderModifierJeu':{
				$refJeuModif = $_POST['txtRefJeu']; // sert à créer un formulaire de modification pour ce jeu
			break;
		}
			
		case 'validerModifierJeu':{
		$db->modifierJeu($_POST['idPlateforme'], $_POST['idPegi'], $_POST['idGenre'], $_POST['idMarque'], $_POST['nom'], $_POST['prix'], $_POST['dateParution']);
			$refJeuNotif = $_POST['txtRefJeu'];
			$notification = 'Modifié';  // sert à afficher la modification réalisée dans la vue
			break;
		}

		case 'supprimerJeu':{
			$refJeu = $_POST['txtRefJeu'];
			$db->supprimerJeu($refJeu);
			break;
		}
	}
		
	// l' affichage des jeux se fait dans tous les cas	
    
	// require"c_forms_list";
	
	$tbJeux  = $db->getLesJeux();		
	$tbPlateformes = $db->getLesPlateformes();
	$tbPegi = $db->getLesPegi();
	$tbGenres = $db->getLesGenres();
	$tbMarques = $db->getLesMarques();
	require 'vue/v_lesJeux.php';

	?>
