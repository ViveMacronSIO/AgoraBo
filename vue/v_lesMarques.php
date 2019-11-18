<div class="col-sm-12">
	<section class="panel">
		<div class="chat-room-head">
			<h3><i class="fa fa-angle-right"></i> Gérer les Marques</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-advance table-hover">
			<thead>
			  <tr class="tableau-entete">
				<th><i class="fa fa-bullhorn"></i> Identifiant de Marque</th>
				<th><i class="fa fa-bookmark"></i> Marque</th>
                  <th><i class="fa fa-bookmark"></i> Pays d'origine</th>
				<th></th>
			  </tr>
			</thead>
			<tbody>

			<tr>
			<form action="index.php?uc=gererMarques" method="post">
				<td>Nouvelle Marque</td>
				<td>
					<input type="text" id="txtNomMarque" name="txtNomMarque" size="24" required minlength="4"  maxlength="24"  placeholder="Nom de Marques" title="De 4 à 24 caractères"  />
				</td>
				<td>
                    <input type="text" id="txtPaysOrigine" name="txtPaysOrigine" size="24" required minlength="4"  maxlength="24"  placeholder="Pays d'origine" title="De 4 à 24 caractères"  />
                </td>
                <td>
					<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="ajouterNouvelleMarque" title="Enregistrer nouvelle Marque"><i class="fa fa-save"></i></button>
					<button class="btn btn-info btn-xs" type="reset" title="Effacer la saisie"><i class="fa fa-eraser"></i></button>	
				</td>
			</form>
			</tr>
				
			<?php
			foreach ($tbMarques as $marque) { 
			?>
			  <tr>

				<form action="index.php?uc=gererMarques" method="post">
				<td>
				    <?php echo $marque->identifiant; ?><input type="hidden"  name="txtIdMarque" value="<?php echo $marque->identifiant; ?>" />
				</td>
				<td>
				<?php 
					if ($marque->identifiant != $idMarqueModif) {
						echo $marque->libelle;
						?>
						</td><td>
							<?php if ($notification != 'rien' && $marque->libelle == $idMarqueNotif) {  
								echo '<button class="btn btn-success btn-xs"><i class="fa fa-check"></i>'.$notification.'</button>'; 
							
							}
                            echo $marque->paysOriginal;
						?>
                    </td><td>
                        <?php if ($notification != 'rien' && $marque->paysOriginal == $idMarqueNotif) {
                            echo '<button class="btn btn-success btn-xs"><i class="fa fa-check"></i>'.$notification.'</button>';

                        } ?>
                    </td><td>
							<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="demanderModifierMarque" title="Modifier"><i class="fa fa-pencil"></i></button>
							<button class="btn btn-danger btn-xs" type="submit" name="cmdAction" value="supprimerMarque" title="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer cette Marque?');"><i class="fa fa-trash-o "></i></button>
						</td>
					<?php
					}
					else {
						?>

                            <input type="text" id="txtNomMarque" name="txtNomMarque" size="24" required minlength="4"  maxlength="40"   value="<?php echo $marque->libelle; ?>" />

                        <td>
                        <input type="text" id="txtPaysOrigine" name="txtPaysOrigine" size="24" required minlength="4"  maxlength="40"   value="<?php echo $marque->paysOriginal; ?>" />
                        </td>

                        <td>
							<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="validerModifierMarque" title="Enregistrer"><i class="fa fa-save"></i></button>
							<button class="btn btn-info btn-xs" type="reset" title="Effacer la saisie"><i class="fa fa-eraser"></i></button>				
							<button class="btn btn-warning btn-xs" type="submit" name="cmdAction" value="annulerModifierMarque" title="Annuler"><i class="fa fa-undo"></i></button>
						</td>
						
						
					<?php
					}				
					?>
				</form>
			  </tr>  
			<?php
			}
            ?>
			</tbody>
		  </table>
			  	  
		</div>
    </section>
</div>