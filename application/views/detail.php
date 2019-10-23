<?php
$title= $liste_produits->pro_nom; ob_start(); ?>
  <!-- page d'affichage de détail d'un produit !-->
<div class="container detailProduit">
    <div class="row det">
          <div class="col-sm-6 zoom">
            <img id="myimage" src="<?=base_url('assets/img/').$liste_produits->pro_id.".".$liste_produits->pro_photo?> " alt="<?php echo $liste_produits->pro_nom?>" title="<?php echo $liste_produits->pro_nom?>">
		  <div id="myresult" class="img-zoom-result"></div>
		</div>
		
		
        <div class="offset-sm-2 col-sm-4 detailRight">
            <div class="minInfo">
                <h3> <?php echo ucfirst($liste_produits->pro_marque);?> </h3>
                <p><?php echo mb_strtoupper($liste_produits->pro_nom);?> </p>
                <p class="lib"><?php echo mb_strtoupper($liste_produits->cat_nom);?></p>
                <div class="ref">
                    Réf : <?php echo mb_strtoupper($liste_produits->pro_ref);?>                 </div>
                <div class="avis">
                                            <p><a href="#avis2">Avis clients : 3.5/5                            </a></p>
                                        <!-- si le client est connecté, il peut donner un avis via modale !-->
                                        <!--        modale d'ajout d'avis-->
                    <div class="modal center" id="avisProd">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form action="https://dev.amorce.org/jmercerol/fil_rouge/index.php/products/ajoutAvis?id=4" method="post" accept-charset="utf-8">
                                    <!-- creation d'un input pour récupérer l'id mais champ non affiché dans la modale (display:none) !-->
                                    <input type="text" value="4" name="proId" id="proId">
                                    <div class = "form-group row">
                                        <label for = "avis_note" class = "col-form-label col-sm-3">Note</label>
                                        <select class="custom-select col-sm-2" id="avis_note" name="avis_note">
                                            <option value="note">Note</option>
                                            <option value="0">0/5</option>
                                            <option value="1">1/5</option>
                                            <option value="2">2/5</option>
                                            <option value="3">3/5</option>
                                            <option value="4">4/5</option>
                                            <option value="5">5/5</option>
                                        </select>
                                    </div>
                                    <div class = "form-group row">
                                        <label for = "avis_nom" class = "col-form-label col-sm-3">Votre nom</label>
                                        <input type = "text" class = "form-control col-sm-8" name = "avis_nom" id = "avis_nom">
                                    </div>

                                    <div class = "form-group row">
                                        <label for = "avis_text" class = "col-form-label col-sm-3">Votre commentaire</label>
                                        <textarea type="text" class = "form-control col-sm-8" name = "avis_text" id = "avis_text"></textarea>
                                    </div>
                                    <div id="avisButt">
                                        <button type="submit" class="btn btn-danger avisValid">Valider</button>
                                        <button type="button" class="btn btn-danger avisValid" data-dismiss="modal">Annuler</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="priceInfo">
                                    <div class="yes">
                        <span > <?php if($liste_produits->pro_bloque==1 && $liste_produits->pro_stock>=1){echo '<strong class="vert">.</strong>'."<span class='dispo'> disponible</span>";}
                         else {echo '<strong class="rouge">.</strong>'."<span class='indispo'> indisponible</span>";}?>
						</span><br>
                        <?php echo $liste_produits->pro_prix;?>€
                    </div>
                            </div>
            <!-- bouton d'ajout au panier dipo pour tous !-->
            <div class="panierButt">
                

            </div>
        </div>
    </div>
    <hr>
    <!--bloc carac-->
        <div class = "row techn">
        <div class = "col-sm-6 description">
            <h4>Description</h4>
            <p><?php echo $liste_produits->pro_description?></p>
        </div>
        <div class="col-sm-6 caracteristiques">
            <h4>Caracteristiques</h4>
            <!-- Form Modif produit -->
 <br>
   <div class="col"> <a href="<?=site_url('produits/modif/'.$liste_produits->pro_id);?> " type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal3" data-whatever="2">modifier un produit</a> 
     </div>        
 <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulaire de modification d'un produit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <?php echo form_open("produits/modif/".$liste_produits->pro_id);?>
     
                    <div class="form-group">
                    <div class = "form-group row">
                        <label for = "categorie" class = "col-form-label col-sm-3">Sous-Categorie</label>
                        <select class="custom-select col-sm-8" id="categorie" >
                            <option value="">Sélectionnez une sous-catégorie</option>
      <?php                                     foreach ($aCatMenu as $menu) 
      { 
      $aSousCat = $menu[1];
      foreach ($aSousCat as $souscategorie)
      {
         
    if ($souscategorie->cat_id==$produits->pro_cat_id){   echo '
			<option value="'.$souscategorie->pro_cat_id.'" selected>'.$souscategorie->cat_id.'-'.$souscategorie->cat_nom.'</option>
			'; } else {echo '
			<option value="'.$souscategorie->cat_id.'" >'.$souscategorie->cat_id.'-'.$souscategorie->cat_nom.'</option>
			'; } }}?> 
                
                		</select>
                    </div>
                    <div class = "form-group row">
                        <label for="nom" class="col-form-label col-sm-3">Nom Produit</label>
                        <input type="text" class="form-control col-sm-8" name="pro_nom" id="ref" value="<?php echo set_value('pro_nom', $produits->pro_nom); ?>"><?php echo form_error("pro_nom"); ?>
                    </div>
                    <div class = "form-group row">
                        <label for="ref" class="col-form-label col-sm-3">Référence</label>
                        <input type="text" class="form-control col-sm-8" name="pro_ref" id="ref" value="<?php echo set_value('pro_ref',$produits->pro_ref); ?>"><?php echo form_error("pro_ref"); ?>
                    </div>
                    <div class = "form-group row">
                        <label for = "marque" class = "col-form-label col-sm-3">Marque</label>
                        <input type = "text" class = "form-control col-sm-8" name = "pro_marque" id = "marque" value="<?php echo set_value('pro_marque',$produits->pro_marque); ?>"><?php echo form_error("pro_marque"); ?>
                    </div>
                   <div class = "form-group row">
                        <label for = "fournis" class = "col-form-label col-sm-3">Fournisseur</label>
                        <select class="custom-select col-sm-8" id="fournis" name="pro_fou_id">
                            <option value="">Sélectionner un fournisseur</option>
                            <?php foreach($aFournisseurs as $row){ if($row->fouId == $produits->pro_fou_id){?> 
                            <option value="<?= $row->fouId ?>" selected><?php echo $row->fouNom ?></option>
                            <?php }else{?>
							<option value="<?= $row->fouId ?>"><?php echo $row->fouNom ?></option>
							<?php }} ?>
                            
                         </select>
                    </div>
                    <div class = "form-group row">
                        <label for= "libelle" class = "col-form-label col-sm-3">Libellé</label>
                        <input type = "text" class = "form-control col-sm-8" name = "pro_libelle" id = "libelle" value="<?php echo set_value('pro_libelle',$produits->pro_libelle); ?>"><?php echo form_error("pro_libelle"); ?>
                    </div>
                    <div class = "form-group row">
                        <label for = "descrip" class = "col-form-label col-sm-3">Description</label>
                        <textarea rows="7" class = "form-control col-sm-8" name = "pro_description" id = "description" ><?php echo set_value('pro_description',$produits->pro_description); ?></textarea><?php echo form_error("pro_description"); ?>
                    </div>
					 <div class = "form-group row">
                        <label for = "couleur" class = "col-form-label col-sm-3">Couleur</label>
                        <input  class = "form-control col-sm-8" name = "pro_couleur" id = "couleur" value="<?php echo set_value('pro_couleur',$produits->pro_couleur); ?>"><?php echo form_error("pro_couleur"); ?>
                    </div>
                    <div class = "form-group row">
                        <label for = "prix" class = "col-form-label col-sm-3">Prix</label>
                        <input type = "text" class = "form-control col-sm-8" name = "pro_prix" id = "prix"value="<?php echo set_value('pro_prix',$produits->pro_prix); ?>"><?php echo form_error("pro_prix"); ?>		

                    </div>
                    <div class = "form-group row">
                        <label for = "stock" class = "col-form-label col-sm-3">Stock</label>
                        <input type = "text" class = "form-control col-sm-8" name = "pro_stock" id = "stock"value="<?php echo set_value('pro_stock',$produits->pro_stock); ?>"><?php echo form_error("pro_stock"); ?>
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
                  </div>
                    <div class="addValidButtons">
                        <button type="submit" class="btn btn-danger validAdd" >Valider</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                    </div>
                         <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div> 
<?php if(isset($errorMod)){?>
      <script>        
        $('#exampleModal3').modal('show')</script> 
    
<?php }?>
 <div class="col mt-3"> <a href="<?=site_url('produits/supprime/'.$liste_produits->pro_id);?> " type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal4" data-whatever="2">supprimer ce produit</a> 
     </div>        
 <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Voulez-vous supprimer ce produit?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<?php echo form_open("produits/supprime/".$liste_produits->pro_id); ?>
Catégorie du produit: <?php echo $liste_produits->cat_nom ;?><br/>
Libellé du produit: <?php echo $liste_produits->pro_libelle ;?><br/>
Prix du produit: <?php echo $liste_produits->pro_prix ;?> <sup>&euro;</sup><br/>
Stock actuel: <?php echo $liste_produits->pro_stock ;?><br/>
Couleur: <?php echo$liste_produits->pro_couleur ;?><br/>
Date d'ajout du produit: <?php echo$liste_produits->pro_d_ajout ;?><br/>
Date et heure de la dernière modification: <?php echo $liste_produits->pro_d_modif ;?><br/>
<?php if($liste_produits->pro_bloque == 0){
echo "Ce produit est bloqué.";
}
        else
{
  echo "Ce produit est encore disponible à la vente";
}

?>
<div class="addValidButtons">
<button type="submit" class="btn btn-danger validAdd" >Supprimer</button>
<button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                    </div>
<?php echo form_close(); 
?></div>
        </div></div></div></div>
    </div></div>
<?php 
   $contenu = ob_get_clean();
  require 'template.php';
  ?>