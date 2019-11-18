
<!-- page start-->
<div class="col-sm-12">
	<section class="panel">
		<div class="chat-room-head">
			<h3><i class="fa fa-angle-right"></i> Gérer les Pegi</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-advance table-hover">
			<thead>
			  <tr class="tableau-entete">
				<th><i class="fa fa-bullhorn"></i> Identifiant du Pegi</th>
				<th><i class="fa fa-bookmark"></i> Limite de l'Age</th>
				<th><i class="fa fa-bookmark"></i> Description du Pegi</th>
				<th></th>
			  </tr>
			</thead>
			<tbody>
			<!-- formulaire pour ajouter un nouveau genre-->
			<tr>
			<form action="index.php?uc=gererPegi" method="post">
				<td>Nouveau Pegi</td>
				<td>
					<input type="text" id="txtlimiteAge" name="txtlimiteAge" size="24" required minlength="1"  maxlength="2"  placeholder="Limite d'Age" title="De 1 à 2 caractères"  />					
				</td>
				<td>
					<input type="text" id="txtdescPegi" name="txtdescPegi" size="24" required minlength="1"  maxlength="100"  placeholder="Description" title="De 1 à 100 caractères"  />
				</td>
				<td> 
					<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="ajouterNouveauPegi" title="Enregistrer nouveau pegi"><i class="fa fa-save"></i></button>
					<button class="btn btn-info btn-xs" type="reset" title="Effacer la saisie"><i class="fa fa-eraser"></i></button>	
				</td>
			</form>
			</tr>
				
			<?php
			foreach ($tbPegi as $pegi) { 
			?>
			  <tr>
			  
				<!-- formulaire pour modifier et supprimer les pegi-->
				<form action="index.php?uc=gererPegi" method="post">
				<td><?php echo $pegi->identifiantPegi; ?><input type="hidden"  name="txtIdPegi" value="<?php echo $pegi->identifiantPegi; ?>" /></td>
				<td><?php 
					if ($pegi->identifiantPegi != $idPegiModif) {
						echo $pegi->limiteAge;
						?>
						</td><td>
							<?php if ($notification != 'rien' && $pegi->limiteAge == $idPegiNotif) {  
								echo '<button class="btn btn-success btn-xs"><i class="fa fa-check"></i>'.$notification.'</button>'; 
							
							} 
					
						echo $pegi->descriptionPegi;
						?>
						</td><td>
							<?php if ($notification != 'rien' && $pegi->descriptionPegi == $idPegiNotif) {  
								echo '<button class="btn btn-success btn-xs"><i class="fa fa-check"></i>'.$notification.'</button>'; 
							
							} ?>
							.....................................................................................
							<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="demanderModifierPegi" title="Modifier"><i class="fa fa-pencil"></i></button>
							<button class="btn btn-danger btn-xs" type="submit" name="cmdAction" value="supprimerPegi" title="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer ce pegi?');"><i class="fa fa-trash-o "></i></button>
						</td>
					<?php
					}
					else {
						?><tr><input type="text" id="txtlimiteAge" name="txtlimiteAge" size="24" required minlength="4"  maxlength="24"   value="<?php echo $pegi->limiteAge; ?>" />
						<tr><input type="text" id="txtlimiteAge" name="txtlimiteAge" size="24" required minlength="4"  maxlength="24"   value="<?php echo $pegi->limiteAge; ?>" />
						
						
						<td>		 
							<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="validerModifierPegi" title="Enregistrer"><i class="fa fa-save"></i></button>
							<button class="btn btn-info btn-xs" type="reset" title="Effacer la saisie"><i class="fa fa-eraser"></i></button>				
							<button class="btn btn-warning btn-xs" type="submit" name="cmdAction" value="annulerModifierPegi" title="Annuler"><i class="fa fa-undo"></i></button>
						</td>
						</tr>
						<tr><input type="text" id="txtdescPegi" name="txtdescPegi" size="24" required minlength="4"  maxlength="24"   value="<?php echo $pegi->descriptionPegi; ?>" /> 
						
						
						<td>		 
							<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="validerModifierPegi" title="Enregistrer"><i class="fa fa-save"></i></button>
							<button class="btn btn-info btn-xs" type="reset" title="Effacer la saisie"><i class="fa fa-eraser"></i></button>				
							<button class="btn btn-warning btn-xs" type="submit" name="cmdAction" value="annulerModifierPegi" title="Annuler"><i class="fa fa-undo"></i></button>
						</td></tr>
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

	
<section class="panel">
	<div class="panel-body">
		<!--page start-->
		<div class="row mt">
		  <aside class="col-lg-3 mt">
			<h4><i class="fa fa-angle-right"></i> Evénements à positionner</h4>
			<div id="external-events">
			  <div class="external-event label label-theme">Animation</div>
			  <div class="external-event label label-success">Réunion interne</div>
			  <div class="external-event label label-info">Tournoi</div>
			  <div class="external-event label label-warning">Soirée</div>
			  <div class="external-event label label-danger">Fête</div>
			  <div class="external-event label label-default">Sortie organisée</div>
			  <div class="external-event label label-theme">Séjour</div>
			  <div class="external-event label label-info">Réunion participative</div>
			  <div class="external-event label label-success">Représentation</div>
			  <p class="drop-after">
				<input type="checkbox" id="drop-remove"> Supprimer après déplacement
			  </p>
			</div>
		  </aside>
		  <aside class="col-lg-9 mt">
			<section class="panel">
			  <div class="panel-body">
				<div id="calendar" class="has-toolbar"></div>
			  </div>
			</section>
		  </aside>
		</div>
		<!-- page end-->
	 </div>
	</section>
</div><!--fin div col-sm-12-->