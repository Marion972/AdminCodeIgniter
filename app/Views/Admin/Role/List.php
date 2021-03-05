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
                                        <th>Nom du film</th>
                                        <th>Nom de l'acteur</th>
                                        <th>Nom du rôle</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    if(isset($tabRoles)) {
                                    foreach($tabRoles as $role ){ 
                                        $artist = $artistModel->where('id', $role["id_acteur"])->first();
                                        $films = $filmModel->where('id', $role["id_film"])->first();
                                    ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <a href="app-invoice-view.html"><?php echo $artist["id"]; ?></a>
                                            </td>
                                            <td><span class="invoice-amount"><?php echo $films["titre"]; ?></span></td>
                                            <td><small><?php echo $artist["nom"]; ?></small></td>
                                            <td><span class="invoice-customer"><?php echo $role["nom_role"]; ?></span></td>
                                            <td>
                                                <span class="bullet green"></span>
                                                <small></small>
                                            </td>
                                            <td>
                                                <div class="invoice-action">
                                                    <a href="<?php echo base_url("admin/role/delete/".$role["id_film"].$role["id_acteur"]); ?>" class="invoice-action-view mr-4">
                                                        <i class="material-icons">delete</i>
                                                    </a>
                                                    <a href="<?php echo base_url("admin/role/edit/".$role["id_film"].$role["id_acteur"]); ?>" class="invoice-action-edit">
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