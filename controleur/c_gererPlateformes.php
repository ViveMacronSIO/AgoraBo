<?php

	if (!isset($_POST['cmdAction'])){
		 $action = 'afficher';
	}
	else {
		$action = $_POST['cmdAction'];
	}

	$idPlateformeModif = -1;
	$notification = 'rien';	

	switch($action){

		case 'ajouterNouvellePlateforme':{		
			if (!empty($_POST['txtlibPlateforme']))
			{
				$idPlateformeNotif = $db->ajouterPlateforme($_POST['txtlibPlateforme']);
				$notification = 'Ajouté';	
			}
		  break;
		}

		case 'demanderModifierPlateforme':{
				$idPlateformeModif = $_POST['txtIdPlateforme'];
			break;
		}
			
		case 'validerModifierPlateforme':{
			$db->modifierPlateforme($_POST['txtIdPlateforme'], $_POST['txtlibPlateforme']); 
			$idPlateformeNotif = $_POST['txtIdPlateforme']; 
			$notification = 'Modifié'; 
			break;
		}

		case 'supprimerPlateforme':{
			$idPlateforme = $_POST['txtIdPlateforme'];
			$db->supprimerPlateforme($idPlateforme);
			break;
		}
	}

	$tbPlateformes  = $db->getLesPlateformes();		
	require 'vue/v_lesPlateformes.php';

	?>