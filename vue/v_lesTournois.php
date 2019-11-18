<!-- page start-->
<div class="col-sm-12">
    <section class="panel">
        <div class="chat-room-head">
            <h3><i class="fa fa-angle-right"></i> Gérer les Tournois</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-advance table-hover">
                <thead>
                <tr class="tableau-entete">
                    <th><i class="fa fa-bullhorn"></i> Nom</th>
                    <th><i class="fa fa-bookmark"></i> Annee</th>
                    <th><i class="fa fa-bookmark"></i> Numero</th>
                    <th><i class="fa fa-bookmark"></i> Participant</th>
                    <th><i class="fa fa-bookmark"></i> Gain</th>
                    <th><i class="fa fa-bookmark"></i> Référence Jeu</th>
                    <th><i class="fa fa-bookmark"></i> Format</th>
                    <th><i class="fa fa-bookmark"></i> Juge</th>

                    <th></th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <form action="index.php?uc=gererTournoi" method="post">
                        <td>Nouveau Tournoi</td>
                        <td>
                            <input type="text" id="txtNomTournoi" name="txtNomTournoi" size="24" required minlength="1"  maxlength="24"  placeholder="Nom du Tournoi" title="De 1 à 24 caractères"  />
                        </td>
                        <td>
                            <button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="ajouterNouveauTournoi" title="Enregistrer un nouveau Tournoi"><i class="fa fa-save"></i></button>
                            <button class="btn btn-info btn-xs" type="reset" title="Effacer la saisie"><i class="fa fa-eraser"></i></button>
                        </td>
                    </form>
                </tr>

                <?php
                foreach ($tbTournoi as $tbTournoi) {
                    ?>
                    <tr>

                        <form action="index.php?uc=gererTournoi" method="post">
                            <td>
                                <?php echo $tournoi->identifiant; ?><input type="hidden"  name="txtNomTournoi" value="<?php echo $tournoi->identifiant; ?>" />
                            </td>
                            <td><?php
                                if ($tournoi->identifiant != $TournoiModif) {
                                echo $tournoi->libelle;
                                ?>
                            </td>
                            <td>
                                <?php if ($notification != 'rien' && $tournoi->libelle == $tournoiNotif) {
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
                                <input type="text" id="txtNomTournoi" name="txtNomTournoi" size="24" required minlength="1"  maxlength="54"   value="<?php echo $tournoi->libelle; ?>" />
                                </td>

                                <td>
                                    <button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="validerModifierTournoi" title="Enregistrer"><i class="fa fa-save"></i></button>
                                    <button class="btn btn-info btn-xs" type="reset" title="Effacer la saisie"><i class="fa fa-eraser"></i></button>
                                    <button class="btn btn-warning btn-xs" type="submit" name="cmdAction" value="annulerModifierTournoi" title="Annuler"><i class="fa fa-undo"></i></button>
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
