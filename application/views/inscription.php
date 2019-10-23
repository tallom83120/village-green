<?php 
$title="Inscription";
ob_start();
?>
<div class="formulaire">
	
	 <div class="container inscrip">
	 
    <h1>Créez vos identifiants</h1>
	 	<?php echo validation_errors(); ?>
        <?php echo form_open("register/inscription"); ?>
    <p class="requis">* Ces zones sont obligatoires</p>
    <div class="form-group row">

        <label for="email" class="col-sm-2 col-form-label ob">E-mail</label>
        <div class="col-sm-4 champs">
            <input type="email" class="form-control" name="email" id="email" value="<?php echo set_value('email'); ?>">
        </div>
            </div>
    <div class="form-group row deuz">
        <label for="password" class="col-sm-2 col-form-label ob">Créez votre<br> mot de passe</label>
        <div class="col-sm-4 champs">
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <label for="password2" class="col-sm-2 col-form-label ob">Confirmation<br> mot de passe</label>
        <div class="col-sm-4 champs">
            <input type="password" class="form-control" name="check_password" id="check_password">
        </div>
    </div>
    <h1>Vos coordonnées</h1>
    <div class="partTwo">
        <div class="left">
          <div class="form-group row">
                <label for="nom_ent" class="col-sm-4 col-form-label ob">Statut</label>
                        <div class="col-sm-4 champs">
                            <label for = "Particulier" class = "form-check-label">Particulier </label>
                            <input type = "radio"  name = "type_clients" value = "particulier" id = "particulier" checked>
                        </div>
                        <div class="col-sm-4 champs">
                            <label for = "Entreprise" class = "form-check-label">Entreprise </label>
                            <input type = "radio" name = "type_clients" value = "professionnel" id = "entreprise">
                        </div>
                        </div>
            <div class="form-group row" id="NomEntreprise">
                <label for="nom_ent" class="col-sm-4 col-form-label ob">Entreprise</label>
                <div class="col-sm-8 champs">
                    <input type="text" class="form-control" name="nom_entreprise" id="nom_entreprise" value="<?php echo set_value('nom_entreprise'); ?>">
                </div>
            </div>   
             <div class="form-group row" id="NumSiret">
                <label for="num_siret" class="col-sm-4 col-form-label ob">Siret</label>
                <div class="col-sm-8 champs">
                    <input type="text" class="form-control" name="num_siret" id="num_siret" value="<?php echo set_value('num_siret'); ?>">
                </div>
            </div>       
            <div class="form-group row">
                <label for="prenom" class="col-sm-4 col-form-label ob">Prénom</label>
                <div class="col-sm-8 champs">
                    <input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo set_value('prenom'); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="nom" class="col-sm-4 col-form-label ob">Nom</label>
                <div class="col-sm-8 champs">
                    <input type="text" class="form-control" name="nom" id="nom" value="<?php echo set_value('nom'); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="adresse" class="col-sm-4 col-form-label ob">Adresse</label>
                <div class="col-sm-8 champs">
                    <input type="text" class="form-control" name="adresse" id="adresse" value="<?php echo set_value('adresse'); ?>">
                </div>
            </div>
				<div class="form-group row">
                <label for="cp" class="col-sm-4 col-form-label ob">Code postal</label>
                <div class="col-sm-8 champs">
                    <input type="text" class="form-control" name="cp" id="cp" value="<?php echo set_value('cp'); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="ville" class="col-sm-4 col-form-label ob">Ville</label>
                <div class="col-sm-8 champs">
                    <input type="text" class="form-control" name="ville" id="ville" value="<?php echo set_value('ville'); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="pays" class="col-sm-4 col-form-label">Pays</label>
                <div class="col-sm-8 champs">
                    <input type="text" class="form-control" name="pays" id="pays" value="France" readonly>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="form-group row">
                <label for="mobile" class="col-sm-7 col-form-label ob">Numéro de Portable</label>
                <div class="col-sm champs">
                    <input type="tel" class="form-control" name="mobile" id="mobile" value="<?php echo set_value('mobile'); ?>" placeholder='06 xx xx xx xx'>
                </div>
            </div>
            <div class="form-group row">
                <label for="fixe" class="col-sm-7 col-form-label">Numéro de téléphone fixe</label>
                <div class="col-sm champs">
                    <input type="tel" class="form-control" name="fixe" id="fixe" value="">
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="row" id="validInscrip" >
        <button type="submit" class="btn btn-danger" name="valider">Valider</button>
    </div>
    <?php form_close();?>
    </div>
<div class="bas row">
    <img src="<?=base_url("assets/img/bas_de_page")?>" alt="bas_page" title="bas de page">
</div>

		<?php 
$contenu = ob_get_clean();
require 'template.php';
?>
	