<!-- page start-->
<div class="col-sm-12">
	<section class="panel">
		<div class="chat-room-head">
			<h3><i class="fa fa-angle-right"></i> Gérer les Plateformes</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-advance table-hover">
			<thead>
			  <tr class="tableau-entete">
				<th><i class="fa fa-bullhorn"></i> Identifiant</th>
				<th><i class="fa fa-bookmark"></i> Plateforme</th>
				<th></th>
			  </tr>
			</thead>
			<tbody>

			<tr>
			<form action="index.php?uc=gererPlateformes" method="post">
				<td>Nouvelle Plateforme</td>
				<td>
					<input type="text" id="txtlibPlateforme" name="txtlibPlateforme" size="24" required minlength="1"  maxlength="24"  placeholder="Nom de Plateforme" title="De 1 à 24 caractères"  />				
				</td>
				<td> 
					<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="ajouterNouvellePlateforme" title="Enregistrer nouvelle Plateforme"><i class="fa fa-save"></i></button>
					<button class="btn btn-info btn-xs" type="reset" title="Effacer la saisie"><i class="fa fa-eraser"></i></button>	
				</td>
			</form>
			</tr>
				
			<?php
			foreach ($tbPlateformes as $plateforme) { 
			?>
			  <tr>
			  
				<form action="index.php?uc=gererPlateformes" method="post">
				<td>
				    <?php echo $plateforme->identifiant; ?><input type="hidden"  name="txtIdPlateforme" value="<?php echo $plateforme->identifiant; ?>" />
				</td>
				<td><?php 
					if ($plateforme->identifiant != $idPlateformeModif) {
						echo $plateforme->libelle;
						?>
						</td>
						<td>
							<?php if ($notification != 'rien' && $plateforme->libelle == $idPlateformeNotif) {  
								echo '<button class="btn btn-success btn-xs"><i class="fa fa-check"></i>'.$notification.'</button>'; 
							
							} 
						?>
							
							<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="demanderModifierPlateforme" title="Modifier"><i class="fa fa-pencil"></i></button>
							<button class="btn btn-danger btn-xs" type="submit" name="cmdAction" value="supprimerPlateforme" title="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer cette Plateforme?');"><i class="fa fa-trash-o "></i></button>
						</td>
					<?php
					}
					else {
						?>
						<input type="text" id="txtlibPlateforme" name="txtlibPlateforme" size="24" required minlength="1"  maxlength="54"   value="<?php echo $plateforme->libelle; ?>" /> 
						</td>
						
						<td>		 
							<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="validerModifierPlateforme" title="Enregistrer"><i class="fa fa-save"></i></button>
							<button class="btn btn-info btn-xs" type="reset" title="Effacer la saisie"><i class="fa fa-eraser"></i></button>				
							<button class="btn btn-warning btn-xs" type="submit" name="cmdAction" value="annulerModifierPlateforme" title="Annuler"><i class="fa fa-undo"></i></button>
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