<div id="main">
        <div class="row">
            <div class="content-wrapper-before blue-grey lighten-5"></div>
            <div class="col s12">
                <div class="container">
                    <!-- invoice list -->
                    <section class="invoice-list-wrapper section">
                        <!-- create invoice button-->
                        <!-- Options and filter dropdown button-->
                      
                        <!-- create invoice button-->
                        <div class="invoice-create-btn">
                            <a href="app-invoice-add.html" class="btn waves-effect waves-light invoice-create border-round z-depth-4">
                                <i class="material-icons">add</i>
                                <span class="hide-on-small-only">Create User</span>
                            </a>
                        </div>
                 
                        <div class="responsive-table">
                        <div class="row">
                            <div class="col s12 m6 l6">
                                <div class="card card card-default scrollspy">
                                    <div class="card-content">
                                    <h4 class="card-title">Ajout / Modification</h4>
                                        <form action="<?php echo base_url("admin/artiste/edit/".$formArtist['id']); ?>" method="POST">
                                            <?php if(isset($formArtist['id'])){?>
                                            <!-- je cache mon champ pour dire que je suis dans le mode modifier -->
                                                <input type="hidden" name="save" value="update" ><!-- je met à jour -->
                                            <?php }else { ?>
                                                <input type="hidden" name="save" value="create" ><!-- je créer un nouvel enregistrement -->
                                                <?php }?>
                                        
                                            <div class="row">
                                            <div class="input-field col s12">
                                                <input type="text" name="artistName" value="<?php echo $formArtist['nom']; ?>">
                                                <label for="fn">Nom</label>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="input-field col s12">
                                                <input type="text" name="artistPrenom" value="<?php echo $formArtist['prenom']; ?>">
                                                <label for="prenom">Prénom</label>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="input-field col s12">
                                                <input type="text" name="artistNaissance" value="<?php echo $formArtist['annee_naissance']; ?>">
                                                <label for="anneNaissance">Année de naissance</label>
                                            </div>
                                            </div>
                                            <div class="row">
                                            
                                            <div class="row">
                                                <div class="input-field col s12">
                                                
                                                <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Modifier
                                                    <i class="material-icons right">send</i>
                                                </button>
                                                </div>
                                            </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>               