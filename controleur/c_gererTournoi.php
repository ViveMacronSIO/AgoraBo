<?php
        if (!isset($_POST['cmdAction'])){
            $action = 'afficherTournoi';
        }
        else {
            // par défaut
            $action = $_POST['cmdAction'];
        }

        $nomTournoiModif = -1;		// positionné si demande de modification
        $notification = 'rien';	// pour notifier la mise à jour dans la vue

        // selon l'action demandée on réalise l'action
        switch($action){

            case 'ajouterNouveauTournoi':{
                if ((!empty($_POST['txtNomTournoi'])) AND (!empty($_POST['lstAnnee'])) AND (!empty($_POST['lstNumero'])) AND (!empty($_POST['lstNbParticipant'])) AND (!empty($_POST['lstGain'])) AND (!empty($_POST['txtRefJeu'])) AND (!empty($_POST['idFormat'])) AND (!empty($_POST['idJuge'])))
                {
                    $TournoiNotif = $db->ajouterTournoi($_POST['txtNomTournoi'], $_POST['1stAnnee'], $_POST['1stNumero'], $_POST['1stNbParticipant'], $_POST['1stGain'], $_POST['txtRefJeu'], $_POST['idFormat'], $_POST['idJuge']);
                    // $TournoiNotif est la référence du tourni ajouté
                    $notification = 'Ajouté';	// sert à afficher l'ajout réalisé dans la vue
                }
                break;
            }

            case 'demanderModifierTournoi':{
                $TournoiModif = $_POST['txtNomTournoi']; // sert à créer un formulaire de modification pour ce jeu
                break;
            }

            case 'validerModifierTournoi':{
                $db->modifierTournoi( $_POST['txtNomTournoi'], $_POST['Annee'], $_POST['Numero'], $_POST['NbParticipant'], $_POST['Gain'], $_POST['txtRefJeu'], $_POST['idFormat'], $_POST['idJuge']);
                $TournoiNotif = $_POST['txtNomTournoi'];
                $notification = 'Modifié';  // sert à afficher la modification réalisée dans la vue
                break;
            }

            case 'supprimerTournoi':{
                $nomTournoi = $_POST['txtNomTournoi'];
                $db->supprimerTournoi($nomTournoi);
                break;
            }
        }

        // l' affichage des tournois se fait dans tous les cas

        // require"c_forms_list";

        $tbTournoi  = $db->getLesTournois();
        require 'vue/v_lesTournois.php';

?>