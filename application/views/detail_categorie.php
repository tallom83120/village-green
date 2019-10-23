<?php
$title="detail categorie";
ob_start();
?>   
<br><br>
			<div class="row">
<?php  foreach ($liste_produits as $row){?>
                    <div class="col-sm-6 col-md-4 col-lg-3 blocProd">
                    
                <div id="pro_cat_<?php echo $row->pro_cat_id;?>" class="prod">
                <a href="<?=site_url('produits/detailproduit/'.$row->pro_id)?>"><!-- envoi de l'id par l'url pour l'affichage du detail produit !-->
                        <div class="lib">
                            <p class="card-title "><?php echo mb_strtoupper($row->cat_nom) ;?></p>
                        </div>
                        <div class="remise">
                        </div>
                        <div class="photoProd">
                            <img src=<?=base_url('assets/img/'.$row->pro_id.".".$row->pro_photo) ;?> alt="<?php  echo $row->pro_nom; ?>" title="<?php  echo $row->pro_nom; ?>">
                        </div>
                        <div class="infoProd">
                            <hr>
                            <div class="infoLeft">
                                <div class="marque">
                                    <p><?php  echo ucfirst($row->pro_marque); ?></p>
                                </div>
                                <div class="model">
                                    <p><?php  echo mb_strtoupper($row->pro_nom); ?></p>
                                </div>
                            </div>
                            <div class="infoRight">
                                <div class="price">
                                 <span> <?php  echo '<strong>'.$row->pro_prix."<sup>&euro;</sup>".'</strong>';?></span>
								</div>
                                <div class="Iright">
                                    <div class="dispo">
<?php  if($row->pro_bloque==1 && $row->pro_stock>=1){echo '<strong class="vert">.</strong>'." disponible";} 
    else {echo '<strong class="rouge">.</strong>'." indisponible";}?>
    								</div>
                                    <div class="ref">
                                       Réf: <?php  echo $row->pro_ref.'&nbsp;';?>
                                    </div>
                                </div>
                            </div>
                        </div>
                 </a>
                 </div>
                    </div>
								<?php };?>
            </div>      	
	 <?php 		
   $contenu = ob_get_clean();
  require 'template.php';
  ?>
