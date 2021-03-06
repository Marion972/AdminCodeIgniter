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
                            <table class="table invoice-data-table white border-radius-4 pt-1">
                                <thead>
                                    <tr>
                                        <!-- data table responsive icons -->
                                        <th></th>
                                        <!-- data table checkbox -->
                                        <th></th>
                                        <th>
                                            <span>ID</span>
                                        </th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Année de naissance</th>
                                        <th>Nombre de film</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    if(isset($tabArtists)) {
                                    foreach($tabArtists as $artist ){ 
                                        
                                    ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <a href="app-invoice-view.html"><?php echo $artist['id']; ?></a>
                                            </td>
                                            <td><span class="invoice-amount"><?php echo $artist['nom']; ?></span></td>
                                            <td><small><?php echo $artist['prenom']; ?></small></td>
                                            <td><span class="invoice-customer"><?php echo $artist['annee_naissance']; ?></span></td>
                                            <td>
                                                <span class="bullet green"></span>
                                                <small></small>
                                            </td>
                                            <td>
                                                <div class="invoice-action">
                                                    <a href="<?php echo base_url("admin/artiste/delete/".$artist['id']); ?>" class="invoice-action-view mr-4">
                                                        <i class="material-icons">delete</i>
                                                    </a>
                                                    <a href="<?php echo base_url("admin/artiste/edit/".$artist['id']); ?>" class="invoice-action-edit">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                </div>
                                            </td>   
                                        </tr>
                                        <?php }?>
                                    <?php } ?>
                                </tbody>
                            </table>
                              <!-- Pagination -->
                              0<?= $pager->links() ?>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>               