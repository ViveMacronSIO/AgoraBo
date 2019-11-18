<!--page start-->
<div class="col-sm-12">
	<section class="panel" style="margin-right:-200px">
		<div class="chat-room-head">
			<h3><i class="fa fa-angle-right"></i> Gérer les jeux</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-advance table-hover" style="text-align:center">
			<thead>
			  <tr class="tableau-entete">
				<th><i class="fa fa-bullhorn"></i> <span style="padding-bottom:20px">Référence du jeu</span></th>
				<th><i class="fa fa-bookmark"></i> <span style="padding-bottom:20px">Plateforme</span></th>
				<th><i class="fa fa-bookmark"></i> <span style="padding-bottom:20px">Pegi</span></th>
				<th><i class="fa fa-bookmark"></i> <span style="padding-bottom:20px">Genre</span></th>
				<th><i class="fa fa-bookmark"></i> <span style="padding-bottom:20px">Marque</span></th>
				<th><i class="fa fa-bookmark"></i> <span style="padding-bottom:20px">Nom</span></th>
				<th><i class="fa fa-bookmark"></i> <span style="padding-bottom:20px">Prix</span></th>
				<th><i class="fa fa-bookmark"></i> <span style="padding-bottom:20px">Date de Parution</span></th>
				<th></th>
				</div>
			  </tr>
			</thead>
		
			<tbody>
			<tr>
			    <form action="index.php?uc=gererJeux" method="post">
				<td style="padding-top:19px">
				    <input type="text" id="txtRefJeu" name="txtRefJeu" size="15" required minlength="10"  maxlength="10"  placeholder="Référence"  />
				</td>
			
				<td style="padding-top:19px">
					<input type="text" id="txtNom" name="txtNom" size="20" required minlength="2"  maxlength="24"  placeholder="Nom du jeu" title="De 2 à 24 caractères"  />
				</td>
				<td style="padding-top:19px">
					<input type="text" id="txtPrix" name="txtPrix" size="6" required minlength="1"  maxlength="5"  placeholder="Prix" title="De 1 à 5 caractères"  />
				</td>
				<td style="padding-top:19px">
					<input type="text" id="txtdateParution" name="txtdateParution" size="14" required minlength="10"  maxlength="10"  placeholder="Date parution" title="Sous la forme aaaa-mm-jj"  />
				</td>
				
				<td> 
					<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="ajouterNouveauGenre" title="Enregistrer nouveau genre"><i class="fa fa-save"></i></button>
					<button class="btn btn-info btn-xs" type="reset" title="Effacer la saisie"><i class="fa fa-eraser"></i></button>	
				</td>	
				
				</form>
			</tr>	
            <?php
			foreach ($tbJeux as $J) { 
			?>			
		    <tr>
			<form action="index.php?uc=gererJeux" method="post">
				
				<td style="padding:35px"><?php 
			if ($J->refJeu != $refJeuModif) {
						echo $J->refJeu; ?>
				</td>
				<td style="padding:35px"><?php 						
						echo $J->libPlateforme;	?> 				
				</td><td style="padding:35px">
				<?php
						echo $J->ageLimite; ?>
				</td><td style="padding:35px">
				<?php
						echo $J->libGenre; ?>
				</td><td style="padding:35px">
				<?php
						echo $J->nomMarque; ?>
				</td><td style="padding:35px">
				<?php
						echo $J->nom; ?>
				</td><td style="padding:35px">
				<?php
						echo $J->prix; ?>
				</td>
				<td style="padding:35px">
				<?php
				    echo $J->dateParution; ?>
				</td>
						<td>
							<?php if ($notification != 'rien' && $J->refJeu == $refJeuNotif) {  
								echo '<button class="btn btn-success btn-xs"><i class="fa fa-check"></i>'.$notification.'</button>'; 
							
							} ?>
							<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="demanderModifierJeu" title="Modifier"><i class="fa fa-pencil"></i></button>
							<button class="btn btn-danger btn-xs" type="submit" name="cmdAction" value="supprimerJeu" title="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer ce jeu ?');"><i class="fa fa-trash-o "></i></button>
						</td>
					<?php
					}
					else {
						?> 			
						    
						<td style="padding-top:25px">
		                    <?php
                                afficherListe($tbPlateformes , 'lstPlateforme', 1, $J->idPlateforme);
		                    ?>
		                </td>
						<td style="padding-top:25px">
		                    <?php
                                afficherListe($tbPegi , 'lstPegi', 1, $J->idPegi);
		                    ?>
		                </td>
						<td style="padding-top:25px">
		                    <?php
                                afficherListe($tbGenres , 'lstGenre', 1, $J->idGenre);
		                    ?>
		                </td>
						<td style="padding-top:25px">
		                    <?php
                                afficherListe($tbMarques , 'lstMarque', 1, $J->idMarque);
		                    ?>
		                </td>
						<td style="padding:25px">
						<input type="text" id="txtNom" name="txtNom" size="20" required minlength="4"  maxlength="54"   value="<?php echo $J->nom; ?>" /> 
                        </td>
						<td style="padding:25px">
						<input type="text" id="txtPrix" name="txtPrix" size="6" required minlength="4"  maxlength="24"   value="<?php echo $J->prix; ?>" /> 	
                        </td>
						<td style="padding:25px">
						<input type="text" id="txtdateParution" name="txtdateParution" size="14" required minlength="4"  maxlength="24"   value="<?php echo $J->dateParution; ?>" /> 												
						</td>
						<td>		 
							<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="validerModifierJeu" title="Enregistrer"><i class="fa fa-save"></i></button>
							<button class="btn btn-info btn-xs" type="reset" title="Effacer la saisie"><i class="fa fa-eraser"></i></button>				
							<button class="btn btn-warning btn-xs" type="submit" name="cmdAction" value="annulerModifierJeu" title="Annuler"><i class="fa fa-undo"></i></button>
						</td>				
					<?php
					}				
					?>
				</form>	
            </tr> 			
			<?php
			}
                $db = null;
            ?>
			</tbody>
		  </table>
			  	  
		</div>
    </section>
</div>
