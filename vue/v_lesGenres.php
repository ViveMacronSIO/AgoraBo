<!-- page start-->
<div class="col-sm-12">
	<section class="panel">
		<div class="chat-room-head">
			<h3><i class="fa fa-angle-right"></i> Gérer les genres</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-advance table-hover">
			<thead>
			  <tr class="tableau-entete">
				<th><i class="fa fa-bullhorn"></i> Identifiant</th>
				<th><i class="fa fa-bookmark"></i> Libellé</th>
				<th><i class="fa fa-bookmark"></i> Spécialiste</th>
				<th><i class="fa fa-bookmark"></i> Nombres Jeux</th>
				<th></th>
			  </tr>
			</thead>
			<tbody>
			<!-- formulaire pour ajouter un nouveau genre-->
			<tr>
			<form action="index.php?uc=gererGenres" method="post">
				<td>Nouveau</td>
				
				<td>
				<input type="text" id="txtLibGenre" name="txtLibGenre" size="24" required minlength="4"  maxlength="24"  placeholder="Libellé" title="De 4 à 24 caractères"  />
				</td>
				
				<td>
				<label for="lstMembre">Specialiste</label> 				
				<select name="lstSpecialisteGenre_BK" id="lstSpecialisteGenre_BK" size="1">										
				</select>
				</td>
				<td> 
					<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="ajouterNouveauGenre" title="Enregistrer nouveau genre"><i class="fa fa-save"></i></button>
					<button class="btn btn-info btn-xs" type="reset" title="Effacer la saisie"><i class="fa fa-eraser"></i></button>	
				</td>
			</form>
			</tr>
				
			<?php
			foreach ($tbGenres as $genre) { 
			?>
			  <tr>
			  
				<!-- formulaire pour modifier et supprimer les genres-->
				<form action="index.php?uc=gererGenres" method="post">
				<td><?php echo $genre->identifiant; ?><input type="hidden"  name="txtIdGenre" value="<?php echo $genre->identifiant; ?>" /></td>
				<td><?php 
					if ($genre->identifiant != $idGenreModif) {
						echo $genre->libelle;
						?>
						</td><td>
							<?php if ($notification != 'rien' && $genre->identifiant == $idGenreNotif) {  
								echo '<button class="btn btn-success btn-xs"><i class="fa fa-check"></i>'.$notification.'</button>'; 
							
							} ?>
							<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="demanderModifierGenre" title="Modifier"><i class="fa fa-pencil"></i></button>
							<button class="btn btn-danger btn-xs" type="submit" name="cmdAction" value="supprimerGenre" title="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer ce genre?');"><i class="fa fa-trash-o "></i></button>
						</td>
						
				</td>
					<?php
					}
					else {
						?>
						
		                <td>
						<input type="text" id="txtLibGenre" name="txtLibGenre" size="24" required minlength="4"  maxlength="24"   value="<?php echo $genre->libelle; ?>" />     
						</td>
						<td>
						<input type="1st" id="lstSpecialisteGenre_BK" name="lstSpecialisteGenre_BK" size="1" required minlength="4"  maxlength="24"   value="<?php echo $genre->Specialiste; ?>" />     
						</td>

						
						<td>		 
							<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="validerModifierGenre" title="Enregistrer"><i class="fa fa-save"></i></button>
							<button class="btn btn-info btn-xs" type="reset" title="Effacer la saisie"><i class="fa fa-eraser"></i></button>				
							<button class="btn btn-warning btn-xs" type="submit" name="cmdAction" value="annulerModifierGenre" title="Annuler"><i class="fa fa-undo"></i></button>
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
			  	  
		</div><!-- fin div panel-body-->
    </section><!-- fin section genres-->
</div><!--fin div col-sm-6-->

