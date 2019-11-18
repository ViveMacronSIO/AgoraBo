<?php

	if (!isset($_POST['cmdAction'])){
		 $action = 'afficherMarque';
	}
	else {

		$action = $_POST['cmdAction'];
	}

	$idMarqueModif = -1;		
	$notification = 'rien';	


	switch($action){

		case 'ajouterNouvelleMarque':{		
			if (!empty($_POST['txtNomMarque']) and(!empty( $_POST['txtPaysOrigine'])))
			{
				$idMarqueNotif = $db->ajouterMarque($_POST['txtNomMarque'], $_POST['txtPaysOrigine']);
				$notification = 'Ajouté';
			}
		  break;
		}

		case 'demanderModifierMarque':{
				$idMarqueModif = $_POST['txtIdMarque']; 
			break;
		}
			
		case 'validerModifierMarque':{
			$db->modifierMarque($_POST['txtIdMarque'], $_POST['txtNomMarque'], $_POST['txtPaysOrigine']);
			$idMarqueNotif = $_POST['txtIdMarque']; 
			$notification = 'Modifié'; 
			break;
		}

		case 'supprimerMarque':{
			$idMarque = $_POST['txtIdMarque'];
			$db->supprimerMarque($idMarque); 			
			break;
		}
	}
		
	// l' affichage des genres se fait dans tous les cas	
	$tbMarques  = $db->getLesMarques();		
	require 'vue/v_lesMarques.php';

	?>