<?php

    function afficherListe($tbObjets, $name, $size, $idSelect) 
	{
		if (count($tbObjets) && (empty($idSelect))) 
		{
		    $idSelect = $tbObjets[0]->identifiant; 
		}
		
		echo '<select name="'.$name.'" id="'.$name.'" size="'.$size.'">';
		
		foreach($tbObjets as $objet) 
		{
			if ($objet->identifiant != $idSelect) 
			{ 
				echo '<option value="'.$objet->identifiant.'">'.$objet->libelle.'</option>';
			}
			else 
			{
				echo '<option selected value="'.$objet->identifiant.'">'.$objet->libelle.'</option>';
			}
		}
		echo '</select>';
		return ($idSelect);
	}
?>