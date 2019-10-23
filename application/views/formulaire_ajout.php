<?php
$title="Formulaire d'ajout";
ob_start();
?>   
   <div class="container">
   <div class="row">
<!-- modale ajout d'1 role -->
      <div class="col mt-5" id="html"> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal5" data-whatever="1">ajouter un role</button> 
      </div>       
  <div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">   
                        <?php echo  form_open("register/ajoutRole");?>  
    
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulaire d'ajout d'un Rôle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    
                    <div class = "form-group">
   <input type = "text" class = "form-control" name = "role_nom" id = "newRole" placeholder="Saisir un nouveau rôle" value="<?php echo set_value('role_nom'); ?>"><?php echo form_error("newRole"); ?>
                    </div><?php echo form_error('role_nom'); ?>
                    
                    <div class="addValidButtons">
     </div>
    </div>
      <div class="addValidButtons">
        <button type="submit" class="btn btn-danger validCat" >Valider</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
      </div>
    </div>
	<?= form_close() ?>
    
  </div>
</div>  
<?php if(isset($errorRole)){?>
   <script>$('#exampleModal5').modal('show')</script> 
    
<?php }?> 
<!-- Formulaire Ajout Administration personnel -->

     <div class="col mt-5" id="html"> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal4" data-whatever="2">ajouter un Admin</button> 
     </div>        
 <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulaire d'ajout d'Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
                    <div class="form-group">
   					<?php echo form_open("register/inscriptionAdmin");?> 
                   <div class = "form-group row">
                        <label for = "nom_pers" class = "col-form-label col-sm-3">Nom</label>
                        <input type = "text" class = "form-control col-sm-8" name = "nom_pers" id = "nom_pers" value="<?php echo set_value('nom_pers'); ?>">
                    </div><?php echo form_error('nom_pers'); ?>
                    <div class = "form-group row">
                        <label for = "prenom_pers" class = "col-form-label col-sm-3">Prénom</label>
                        <input type = "text" class = "form-control col-sm-8" name = "prenom_pers" id = "fouSiret" value="<?php echo set_value('prenom_pers'); ?>">
                    </div> <?php echo form_error('prenom_pers'); ?>
                    <div class = "form-group row">
                        <label for = "mail_pers" class = "col-form-label col-sm-3">E-mail</label>
                        <input type = "text" class = "form-control col-sm-8" name = "mail_pers" id = "mail_pers" value="<?php echo set_value('mail_pers'); ?>">
                    </div><?php echo form_error('mail_pers'); ?>
                        <div class = "form-group row">
                        <label for = "role" class = "col-form-label col-sm-3">Rôle/Fonction</label>
                       <select class="form-control" id="roleAdd" name="pers_role_ID">
                        <option value="">Sélectionner un Rôle/Fonction</option>
                            <?php foreach($aRole as $row){?> 
                            <option value="<?= $row->role_ID ?>"><?php echo $row->role_nom ?></option>
                            <?php }?>
                         </select>
                    </div>
                    <div class = "form-group row">
                    <div class="form-group row ">
        			<label for="password" class="row-sm-2 col-form-label  col-sm-5">Créez votre mot de passe</label>
      				  <div class="col-sm-6 champs">
           			 <input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>">
        			</div><?php echo form_error('password'); ?>
        			<label for="password2" class="row-sm-2 col-form-label  col-sm-5">Confirmation mot de passe</label>
       				 <div class="col-sm-6 champs">
            		<input type="password" class="form-control" name="check_password" id="check_password">
        			</div><?php echo form_error('check_password'); ?>
    				</div>
                        <label for = "adresse_pers" class = "col-form-label col-sm-3">Adresse</label>
                        <input type = "text" class = "form-control col-sm-8" name = "adresse_pers" id = "adresse_pers" value="<?php echo set_value('adresse_pers'); ?>">
                    </div><?php echo form_error('adresse_pers'); ?>
                    <div class = "form-group row">
                        <label for = "cp_pers" class = "col-form-label col-sm-3">Code postal</label>
                        <input type = "text" class = "form-control col-sm-8" name = "cp_pers" id = "cp_pers" value="<?php echo set_value('cp_pers'); ?>">
                    </div><?php echo form_error('cp_pers'); ?>
                    <div class = "form-group row">
                        <label for= "ville_pers" class = "col-form-label col-sm-3">Ville</label>
                        <input type = "text" class = "form-control col-sm-8" name = "ville_pers" id = "ville_pers" value="<?php echo set_value('ville_pers'); ?>">
                    </div><?php echo form_error('ville_pers'); ?>
                   
                      <div class = "form-group row">
                        <label for = "telephone" class = "col-form-label col-sm-3">Téléphone</label>
                        <input type = "text" class = "form-control col-sm-8" name = "telephone" id = "telephone" value="<?php echo set_value('telephone'); ?>">
                    </div><?php echo form_error('telephone'); ?>
                    </div>
    </div>
      <div class="addValidButtons">
        <button type="submit" class="btn btn-danger validCat" >Valider</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
      </div>
     <?php ECHO form_close() ?>
    </div>
  </div>
</div>  
<?php if(isset($errorPers)){?>
   <script>$('#exampleModal4').modal('show')</script> 
    
<?php }?> 
 <!-- modale ajout d'1 sous catégorie -->
      <div class="col mt-5" id="html"> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="1">ajouter une sous-catégorie</button> 
      </div>       
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">   
                        <?php echo  form_open("produits/ajoutcategorie");?>  
    
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulaire d'ajout de catégorie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <div class="form-group">
                        <select class="custom-select" id="categorieAdd" name="cat_parent">
                            <option selected disabled>Sélectionnez</option>     
                <?php
                foreach ($aViewCategorie as  $aListCat) 
                {
                    echo"<option value='".$aListCat->cat_id."'>".$aListCat->cat_nom."</option>\n";   
                }
                ?>  
                                                    </select>
                    </div>
                    <div class = "form-group">
   <input type = "text" class = "form-control" name = "cat_nom" id = "sousCatAdd" placeholder="Saisir la sous-catégorie à ajouter" value="<?php echo set_value('sousCatAdd'); ?>"><?php echo form_error("sousCatAdd"); ?>
                    </div><?php echo form_error('cat_nom'); ?>
                    <div class="addValidButtons">
     </div>
    </div>
      <div class="addValidButtons">
        <button type="submit" class="btn btn-danger validCat" >Valider</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
      </div>
    </div>
	<?= form_close() ?>
    
  </div>
</div>  
<?php if(isset($errorCat)){?>
   <script>$('#exampleModal').modal('show')</script> 
    
<?php }?> 
<!-- formulaire ajout de fournisseurs-->
     <div class="col mt-5" id="html"> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal1" data-whatever="2">ajouter un fournisseur</button> 
     </div>        
 <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulaire d'ajout de fournisseur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
                    <div class="form-group">
   					<?php echo form_open("produits/ajoutfournisseur");?> 
                   <div class = "form-group row">
                        <label for = "fouNom" class = "col-form-label col-sm-3">Société</label>
                        <input type = "text" class = "form-control col-sm-8" name = "fouNom" id = "fouNom" value="<?php echo set_value('fouNom'); ?>">
                    </div><?php echo form_error('fouNom'); ?>
                    <div class = "form-group row">
                        <label for = "fouSiret" class = "col-form-label col-sm-3">numéro Siret</label>
                        <input type = "text" class = "form-control col-sm-8" name = "fouSiret" id = "fouSiret" value="<?php echo set_value('fouSiret'); ?>">
                    </div> <?php echo form_error('fouSiret'); ?>
                    <div class = "form-group row">
                        <label for = "fouContact" class = "col-form-label col-sm-3">Nom du référent</label>
                        <input type = "text" class = "form-control col-sm-8" name = "fouContact" id = "fouContact" value="<?php echo set_value('fouContact'); ?>">
                    </div><?php echo form_error('fouContact'); ?>
                    <div class = "form-group row">
                        <label for = "fouAdress" class = "col-form-label col-sm-3">Adresse</label>
                        <input type = "text" class = "form-control col-sm-8" name = "fouAdress" id = "fouAdress" value="<?php echo set_value('fouAdress'); ?>">
                    </div><?php echo form_error('fouAdress'); ?>
                    <div class = "form-group row">
                        <label for = "fouCp" class = "col-form-label col-sm-3">Code postal</label>
                        <input type = "text" class = "form-control col-sm-8" name = "fouCp" id = "fouCp" value="<?php echo set_value('fouCp'); ?>">
                    </div><?php echo form_error('fouCp'); ?>
                    <div class = "form-group row">
                        <label for= "fouVille" class = "col-form-label col-sm-3">Ville</label>
                        <input type = "text" class = "form-control col-sm-8" name = "fouVille" id = "fouVille" value="<?php echo set_value('fouVille'); ?>">
                    </div><?php echo form_error('fouVille'); ?>
                   <div class = "form-group row">
                        <label for = "fouEmail" class = "col-form-label col-sm-3">E-mail</label>
                        <input type = "text" class = "form-control col-sm-8" name = "fouEmail" id = "fouEmail" value="<?php echo set_value('fouEmail'); ?>">
                    </div><?php echo form_error('fouEmail'); ?>
                      <div class = "form-group row">
                        <label for = "fouTel" class = "col-form-label col-sm-3">Téléphone</label>
                        <input type = "text" class = "form-control col-sm-8" name = "fouTel" id = "fouTel" value="<?php echo set_value('fouTel'); ?>">
                    </div><?php echo form_error('fouTel'); ?>
                    </div>
    </div>
      <div class="addValidButtons">
        <button type="submit" class="btn btn-danger validCat" >Valider</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
      </div>
     <?php ECHO form_close() ?>
    </div>
  </div>
</div>  
<?php if(isset($errorFou)){?>
   <script>$('#exampleModal1').modal('show')</script> 
    
<?php }?> 
 <!-- formulaire ajout de produit -->
   
   <div class="col mt-5"> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal2" data-whatever="2">ajouter un produit</button> 
     </div>        
 <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulaire d'ajout de produit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <?php echo form_open_multipart("produits/ajoutProduits");?>  
                    <div class="form-group">
                   <div class = "form-group row">
                        <label for = "categorie" class = "col-form-label col-sm-3">Categorie</label>
                         <select class="custom-select col-sm-8" id="categorie" >
                            <option value="">Sélectionnez une catégorie</option>
          <?php    foreach ($aViewCategorie as $key => $aListCat) 
                                    {
                    echo"<option value='".$aListCat->cat_id."'>".$aListCat->cat_nom."</option>\n";   
                                    }                    
                ?>     
                
                		</select>
                          <label for="sousCategories"  class = "col-form-label col-sm-3">Sous-catégories</label>
                           <select class="custom-select col-sm-8" name="pro_cat_id" id="sousCategories" >
                              <option selected disabled>Sélectionnez une sous-catégorie</option>     
                        </select>
                    </div>
                    <div class = "form-group row">
                        <label for="nom" class="col-form-label col-sm-3">Nom Produit</label>
                        <input type="text" class="form-control col-sm-8" name="pro_nom" id="ref" value="<?php echo set_value('pro_nom'); ?>"><?php echo form_error("pro_nom"); ?>
                    </div>
                    <div class = "form-group row">
                        <label for="ref" class="col-form-label col-sm-3">Référence</label>
                        <input type="text" class="form-control col-sm-8" name="pro_ref" id="ref" value="<?php echo set_value('pro_ref'); ?>"><?php echo form_error("pro_ref"); ?>
                    </div>
                    <div class = "form-group row">
                        <label for = "marque" class = "col-form-label col-sm-3">Marque</label>
                        <input type = "text" class = "form-control col-sm-8" name = "pro_marque" id = "marque" value="<?php echo set_value('pro_marque'); ?>"><?php echo form_error("pro_marque"); ?>
                    </div>
                   <div class = "form-group row">
                        <label for = "fournis" class = "col-form-label col-sm-3">Fournisseur</label>
                        <select class="custom-select col-sm-8" id="fournis" name="pro_fou_id">
                            <option value="">Sélectionner un fournisseur</option>
                            <?php foreach($aFournisseurs as $row){?> 
                            <option value="<?= $row->fouId ?>"><?php echo $row->fouNom ?></option>
                            <?php }?>
                         </select>
                    </div>
                    <div class = "form-group row">
                        <label for= "libelle" class = "col-form-label col-sm-3">Libellé</label>
                        <input type = "text" class = "form-control col-sm-8" name = "pro_libelle" id = "libelle" value="<?php echo set_value('pro_libelle'); ?>"><?php echo form_error("pro_libelle"); ?>
                    </div>
                    <div class = "form-group row">
                        <label for = "descrip" class = "col-form-label col-sm-3">Description</label>
                        <textarea  class = "form-control col-sm-8" name = "pro_description" id = "descrip" ></textarea>
                    </div>
					 <div class = "form-group row">
                        <label for = "couleur" class = "col-form-label col-sm-3">Couleur</label>
                        <input  class = "form-control col-sm-8" name = "pro_couleur" id = "couleur" value="<?php echo set_value('pro_couleur'); ?>"><?php echo form_error("pro_couleur"); ?>
                    </div>
                    <div class = "form-group row">
                        <label for = "prix" class = "col-form-label col-sm-3">Prix</label>
                        <input type = "text" class = "form-control col-sm-8" name = "pro_prix" id = "prix"value="<?php echo set_value('pro_prix'); ?>"><?php echo form_error("pro_prix"); ?>		

                    </div>
                    <div class = "form-group row">
                        <label for = "stock" class = "col-form-label col-sm-3">Stock</label>
                        <input type = "text" class = "form-control col-sm-8" name = "pro_stock" id = "stock"value="<?php echo set_value('pro_stock'); ?>"><?php echo form_error("pro_stock"); ?>
                    </div>
                    <div class = "form-group row">
                        <div class="col-sm-3">Parution</div>
                        <div class="form-check form-check-inline">
                            <label for = "oui" class = "form-check-label">Oui </label>
                            <input type = "radio" class = "form-check-input" name = "pro_bloque" value = "1" id = "oui" checked>
                        </div>
                        <div class="form-check form-check-inline">
                            <label for = "non" class = "form-check-label">Non </label>
                            <input type = "radio" class = "form-check-input" name = "pro_bloque" value = "0" id = "non">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="photo" class="col-form-label col-sm-3">Ajout photo </label>
                        <input class = "form-control col-sm-8" type="text" name="pro_photo" id="pro_photo" value="<?php echo set_value('pro_photo');?>"><?php echo form_error('pro_photo');?>
                       <span class="col-form-label col-sm-3">(jpg, png, gif | max 15 Ko)</span>
                        <input type="file" name="photo" id="photo">
                    </div> </div>
                    <div class="addValidButtons">
                        <button type="submit" class="btn btn-danger validAdd" >Valider</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                    </div>
                         <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div> 
<?php if(isset($errorPro)){?>
      <script>        
        $('#exampleModal2').modal('show')</script> 
    
<?php }?>
    <script>    var CI_BASE_URL = "<?php echo site_url(); ?>" ; 
</script>
 
<script src="<?= base_url("assets/js/jquery_fonction1.js");?>"></script>
</div></div>
<?php 
$contenu = ob_get_clean();
require 'template.php';
?>
 

