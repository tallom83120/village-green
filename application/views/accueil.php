<?php 
$title="Accueil village green";
ob_start(); ?>
<div class="middle row">
    <div class="col-sm-9 pub">
        <a href="<?php echo site_url("produits/listeparcategorie/1");?>"><img src="<?= base_url("assets/img/pub_bouton")?>" alt="pub15" title="Cliquez ici !" class="img-responsive"></a>
    </div>
    <div class="pubSM">
        <img src="<?= base_url("assets/img/pub_guitare")?>" alt="pub15" title="promo15" class="img-fluid">
    </div>
    <div class="col-sm-2 livraison">
        <a href=""><img src="<?= base_url("assets/img/LGdroite")?>" alt="livraison gratuite" title="livraison gratuite" class="img-responsive"></a>
    </div>
    <div class="pictos row">
        <a href=""><img src="<?= base_url("assets/img/banniere_livraison")?>" alt="conditions" title="conditions"></a>
    </div>
    <div class="categories container">
        <h1>Nos catégories</h1>
        <div class="photoCat row">
        	<a class="col-sm-3" href= "<?php echo site_url("produits/listeparcategorie/1");?> "><img src="<?= base_url("assets/img/1guitare")?>" alt="guitare" title="guitare" class="img-fluid" onmouseover="this.src = '<?= base_url("assets/img/1guitareHover")?>';" onmouseout="this.src = '<?= base_url("assets/img/1guitare")?>';"></a>
            <a class="col-sm-3" href= "<?php echo site_url("produits/listeparcategorie/3");?> "><img src="<?= base_url("assets/img/2batterie")?>" alt="batterie" title="batterie" class="img-fluid" onmouseover="this.src = '<?= base_url("assets/img/2batterieHover")?>';" onmouseout="this.src = '<?= base_url("assets/img/2batterie")?>';"></a>
            <a class="col-sm-3" href= "<?php echo site_url("produits/listeparcategorie/2");?> "><img src="<?= base_url("assets/img/3piano")?>" alt="piano" title="piano" class="img-fluid" onmouseover="this.src = '<?= base_url("assets/img/3pianoHover")?>';" onmouseout="this.src = '<?= base_url("assets/img/3piano")?>';"></a>
            <a class="col-sm-3" href= "<?php echo site_url("produits/listeparcategorie/4");?> "><img src="<?= base_url("assets/img/4micro")?>" alt="micro" title="micro" class="img-fluid" onmouseover="this.src = '<?= base_url("assets/img/4microHover")?>';" onmouseout="this.src = '<?= base_url("assets/img/4micro")?>';"></a>
            <a class="col-sm-3" href= "<?php echo site_url("produits/listeparcategorie/5");?> "><img src="<?= base_url("assets/img/5sono")?>" alt="sono" title="sono" class="img-fluid" onmouseover="this.src = '<?= base_url("assets/img/5sonoHover")?>';" onmouseout="this.src = '<?= base_url("assets/img/5sono")?>';"></a>
            <a class="col-sm-3" href= "<?php echo site_url("produits/listeparcategorie/7");?> "><img src="<?= base_url("assets/img/6cases")?>" alt="cases" title="cases" class="img-fluid" onmouseover="this.src = '<?= base_url("assets/img/6casesHover")?>';" onmouseout="this.src = '<?= base_url("assets/img/6cases")?>';"></a>
            <a class="col-sm-3" href= "<?php echo site_url("produits/listeparcategorie/9");?> "><img src="<?= base_url("assets/img/7cable")?>" alt="cable" title="cable" class="img-fluid" onmouseover="this.src = '<?= base_url("assets/img/7cableHover")?>';" onmouseout="this.src = '<?= base_url("assets/img/7cable")?>';"></a>
            <a class="col-sm-3" href="<?php echo site_url("produits/listeparcategorie/10");?> "><img src="<?= base_url("assets/img/8saxo")?>" alt="saxo" title="saxo" class="img-fluid" onmouseover="this.src = '<?= base_url("assets/img/8saxoHover")?>';" onmouseout="this.src = '<?= base_url("assets/img/8saxo")?>';"></a>
        </div>
    </div>
    <div class="others d-flex">
        <div class="topSales">
            <h1>Nos meilleures ventes</h1>
            <div class="photoSales">
                <a href=""><img src="<?= base_url("assets/img/TOP_VENTES_guitare")?>" alt="top-vente1" title="Top vente guitare" class="img-fluid" onmouseover="this.src = '<?= base_url("assets/img/TOP_VENTES_ROLL_OVER_guitare")?>';" onmouseout="this.src = '<?= base_url("assets/img/TOP_VENTES_guitare")?>';"></a>
                <a href=""><img src="<?= base_url("assets/img/TOP_VENTES_saxo")?>" alt="top_vente2" title="top vente saxo" class="img-fluid" onmouseover="this.src = '<?= base_url("assets/img/TOP_VENTES_ROLL_OVER_saxo")?>';" onmouseout="this.src = '<?= base_url("assets/img/TOP_VENTES_saxo")?>';"></a>
                <a href=""><img src="<?= base_url("assets/img/TOP_VENTES_piano")?>" alt="top_vente3" title="top vente piano" class="img-fluid topVente3" onmouseover="this.src = '<?= base_url("assets/img/TOP_VENTES_ROLL_OVER_piano")?>';" onmouseout="this.src = '<?= base_url("assets/img/TOP_VENTES_piano")?>';"></a>
            </div>
        </div>
        <div class="partners">
            <h1>Nos partenaires</h1>
            <div class="partnersLogo">
                <a href=""><img src="<?=base_url("assets/img/partenaires")?>" alt="partenaires" title="partenaire" class="img-responsive"></a>
            </div>
            <div class="partnersLogoSM">
                <a href=""><img src="<?=base_url("assets/img/partenaires")?>" alt="partenaires" title="partenaire" class="img-fluid"></a>
            </div>
        </div>
    </div>
</div>

<?php 
$contenu = ob_get_clean();
require 'template.php';
?>
