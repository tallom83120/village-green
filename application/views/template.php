<!DOCTYPE html>
<html lang = "fr" dir = "ltr">
    <head>
        <meta charset = "utf-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="village green, n°1 de la vente en ligne d'instruments de musiques ">
        <meta name="keywords" content="guitare, clavier, sons, sonos, dj, batteries, musique, électrique, acoustique">
        <meta name="robots" content="none">
        <title>
 <?php echo $title; ?>
        </title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity = "sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin = "anonymous" rel ="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity = "sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin = "anonymous" rel ="stylesheet">
        <link href=<?=base_url("assets/css/style.css");?> rel="stylesheet">
        <link href=<?=base_url("assets/css/style_footer.css");?> rel="stylesheet">
        <link href=<?=base_url("assets/css/style_inscrip.css");?> rel="stylesheet">
        <link href=<?=base_url("assets/css/form_success_style.css");?> rel="stylesheet">
        <link href=<?=base_url("assets/css/products_style.css");?> rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="<?= base_url("assets/img/logo_village_green1.ico")?>"/>
        
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>      	      <script src="<?= base_url("assets/js/jquery_fonction.js");?>"></script>

    </head>
    <body>
        <div class="main container">
            <header class="row">
                <a href="<?=site_url("produits/accueil/");?>" class="logotop col-xs-5 col-sm-4 col-lg-3"><img class="img-fluid img-responsive" src="<?= base_url("assets/img/logo_village_green"); ?>" alt="logo_village_green" title=logo_village_green ></a>
                <div class="top offset-sm-6 col-sm-6">
                    <a tabindex="0" class="btn btn-default navbar-btn" data-toggle="popover2" role="button" data-container="body" data-placement="bottom" data-trigger="focus">Infos</a>
                    <div id="popover2-content" class="row" style="display: none">
                        <div class="popForm infos">
                            <p>Les villageois</p>
                            <ul>
                                <li><a class="info" href="https://dev.amorce.org/jmercerol/fil_rouge/index.php/main/inscription">Ils vous conseillent</a></li>
                                <li><a class="info" href="">A votre agenda</a></li>
                                <li><a class="info" href="">On parle de nous</a></li>
                            </ul>
                        </div>
                    </div>
                    <?php if ($this->session->loginAdmin){ ?> <a class="nav-link" href="<?=site_url("register/logoutAdmin") ?>" tabindex="-1" aria-disabled="true">Deconnexion</a>
								<a class="nav-link" href="<?=site_url('register/detail_admin/'.$this->session->loginAdmin->nom_pers.'/'.$this->session->jeton)?>" ><?php echo $this->session->messageAdmin;?></a>
			<?php } else { ?><a tabindex="0" class="btn btn-default navbar-btn" data-toggle="popover6" role="button" data-container="body" data-placement="bottom" data-trigger="click">Espace Administration</a>
                                                                                                                 <?php }?>
                          <div id="popover6-content" class="row" style="display: none">
                                <div class="popForm popLeft">
                                    <span>Accès Administration</span>
                                    <?php echo form_open('register/loginAdmin');
                                    ?>                                     
                                    <div class="form-group">
     
                                        <label for="user"></label>
                                        <input type="email" class="form-control" id="login" name="login" placeholder="Adresse E-mail">
                                        <span class="text-danger"><?php echo form_error('login');?>
										</span>
                                        <label for="mdp"></label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
										<?php echo $this->session->flashdataAdmin;?> 
										<span class="text-danger"><?php echo form_error('password');?>
										</span>
                                         <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="rememberMe" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Rester connecté</label>
                                        </div>
                                    </div>  
										 <button type="submit" class="btn btn-danger">Se connecter maintenant</button>  
										<?php echo form_close();?>
									</div>									                               
									 </div>                                                                                     
								<?php  if ($this->session->loginClient){ ?> <a class="nav-link" href="<?=site_url("register/logoutClient") ?>" tabindex="-1" aria-disabled="true">Deconnexion</a>
								<a class="nav-link" href="<?=site_url('register/detail_users/'.$this->session->loginClient->nom.'/'.$this->session->jeton)?>" ><?php echo $this->session->message;?></a>
			<?php } else { ?><a tabindex="0" class="btn btn-default navbar-btn" data-toggle="popover" role="button" data-container="body" data-placement="bottom" data-trigger="click">Espace client</a>
                                                                                                                 <?php }?>
							<div id="popover-content" class="row" style="display: none">
                                <div class="popForm popLeft">
                                    <span>Etes-vous déjà client chez nous ?</span>
                                    <?php echo form_open('register/loginClient');
                                    ?>                                     
                                    <div class="form-group">
                                        <label for="user"></label>
                                        <input type="email" class="form-control" id="login" name="login" placeholder="Adresse E-mail">
                                        <span class="text-danger"><?php echo form_error('login');?>
										</span>
                                        <label for="mdp"></label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
										<?php echo $this->session->flashdata;?> 
										<span class="text-danger"><?php echo form_error('password');?></span>
                                         <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="rememberMe" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Rester connecté</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-danger">Se connecter maintenant</button>
                                    Vous avez oublié votre mot de passe ?
									<?php echo form_close();?>                               
 								</div>
                                <div class="popForm popRight">
                                    <span>Vous n'êtes pas client chez nous ?</span>
                                    <p>En tant que client Village Green
                                        vous pouvez suivre vos envois,
                                        lire des tests produits exclusifs,
                                        évaluer des produits, déposer
                                        des petites annonces, gérer
                                        vos chèques-cadeaux, devenir
                                        partenaire et bien plus encore.</p>
                                    <a type="button" class="btn btn-danger" href="<?=site_url("register/inscriptionClient/");?>">S'inscrire</a>
                                    Plus d'informations
                                </div>
                            </div>
				<a href=""><img src="<?= base_url("assets/img/logo_panier");?>" alt="accès du panier" title="accéder au panier"></a>
                    <a href="<?php echo site_url("produits/accueil")?>"><img src="<?= base_url("assets/img/picto_france");?>" alt="logo drapeau France" title="langue du site"></a>
                </div>
                <nav class="navbar navbar-expand-md navbar-dark bg-dark col-sm-12 d-flex">
                    <button class="navbar-toggler offset-xs-10 col-xs-2 offset-sm-10 col-sm-2" type="button" data-toggle="collapse" data-target="#menu" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="navbar-nav mr-auto offset-sm-4 col-sm-8 d-flex justify-content-around">
                            <li class="nav-item active">
                                <a class="nav-link" href="<?php echo site_url("produits/liste");?> ">Produits</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link service" href="">Service</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link help" href="">Aide</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link about" href="">A propos</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="bottom-header d-none d-md-block col-sm-11 ml-auto " >
                    <ul>
                      <?php 
                                 foreach ($aCatMenu as $menu) 
                                 { if($menu[0] == "aérophones"){?>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle prems menu1"  data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" ><?php echo ucfirst($menu[0]); ?></a>
                        <div class="dropdown-menu dropdown-menu-right"  id="souscategories">
                                         <?php 
                                         $aSousCat = $menu[1];
                                         foreach ($aSousCat as $souscategorie) 
                                         { 
                                              ?>
					<a class="dropdown-item"  href="<?php echo site_url("produits/listeparsscategorie/".$souscategorie->cat_id);?> " id="cat_<?php echo $souscategorie->cat_id ?>" ><?php echo ucfirst($souscategorie->cat_nom); ?></a>    
                                            <?php 
                                             }
                                             ?>  
                                </div>
                        </li>
                     <?php }  else {?> <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle prems menu1"  data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" ><?php echo ucfirst($menu[0]); ?></a>
                                 <div class="dropdown-menu"  id="souscategories">
                                         <?php 
                                         $aSousCat = $menu[1];
                                         foreach ($aSousCat as $souscategorie) 
                                         { 
                                              ?>
                                              <a class="dropdown-item"  href="<?php echo site_url("produits/listeparsscategorie/".$souscategorie->cat_id);?> " id="cat_<?php echo $souscategorie->cat_id ?>" ><?php echo ucfirst($souscategorie->cat_nom); ?></a>    
                                            <?php 
                                             }
                                            ?>  
                                </div>
                        </li>
                                      <?php } }?> 
                        </ul>
                </div>
                <a href="<?=site_url("produits/accueil/");?>" class="logo col-xs-4 col-sm-3 col-lg-3"><img class="img-fluid img-responsive" src="<?=base_url("assets/img/logo_village_green"); ?>" alt="logo_village_green" title=logo_village_green ></a>
            </header>
<?php echo $contenu; ?>
</div>
<footer id="first" class="container">
    <div class="fheader row">
        <div class="send form-group col-sm-4">
            <label for="mail" class="col-form-label"><h4>Recevez<em> nos offres exclusives</em></h4></label>
            <div class="email">
                <input type="email" class="form-control" name="mail" id="mail" placeholder="Votre adresse e-mail">
                <input type="submit" id="validMail" class="btn btn-danger" value="Valider">
            </div>
        </div>
        <div class="follow col-sm-3">
            <h4><em>Suivez-nous</em> par ici !</h4>
            <div id="followIcons">
                <a href="https://fr-fr.facebook.com/"><i class="fab fa-facebook"></i></a>
                <a href="https://twitter.com"><i class="fab fa-twitter-square"></i></a>
            </div>
        </div>
        <div class="partner col-sm-5">
            <p class="icons">
                <i class="fab fa-cc-visa"></i>
                <i class="fab fa-cc-mastercard"></i>
                <i class="fas fa-credit-card"></i>
                <i class="fab fa-cc-paypal"></i>
                <img src="<?= base_url("assets/img/kadeos")?>" alt="kadeos" title="kadeos"></p>
            <p class="icons"><img src="<?= base_url("assets/img/chronopost")?>" alt="chronopost" title="chronopost">
                <img src="<?= base_url("assets/img/logo_sofinco")?>" alt="sofinco" title="sofinco">
                <img src="<?= base_url("assets/img/aurore")?>" alt="aurore" title="aurore">
                <img src="<?= base_url("assets/img/maximiles")?>" alt="maximiles" title="maximiles">
                <img src="<?= base_url("assets/img/1euro")?>" alt="1euro" title="1euro"></p>
        </div>

    </div>
    <div class="fbody row">
        <div class="contact col-sm-3">
            <h4>Contactez-nous !</h4>
            <p><h5>Conseil / Commande téléphone</h5>
            du lundi au vendredi de 8h à 19h,<br>
            le samedi de 10h à 18h.</p>
            <p>Depuis la France :<br>
                <span class="tel">02 40 38 50 50</span></p>
            <p>Belgique, Suisse, International :<br>
                <span class="tel">0033 2 40 38 50 50</span></p>
            <p><h5>Service après vente :</h5>
            <span class="tel">02 51 80 68 76</span></p>
            <p>Contactez-nous par téléphone
                du lundi au samedi de 9h à 18h
                ou depuis votre compte client.</p>
            <p><h5>Conseils pour choisir
                un instrument :</h5>
            infovg@villagegreen.com</p>
            <p><h5>Service Presse :</h5>
            contact@villagegreen.com</p>
            <p><h5>Village Green Recrute !</h5></p>
        </div>
        <div class="stores col-sm-3">
            <h4> Village Green Stores</h4>
            <h5>Ouverts de 10h à 19h30 non-stop.</h5>
            <p>Guitares - Amplificateurs - Effets :<br>
                <span class="address">182 avenue Jean Jaurès<br>
                    75019 Paris</span></p>
            <p>Clavier - Home Studio - Sonorisation
                Equipement DJ - Eclairage :<br>
                <span class="address">184 avenue Jean Jaurès<br>
                    75019 Paris</span></p>
            <p>Librairie Musicale :<br>
                <span class="address">7 av. du Nouveau Conservatoire<br>
                    75019 Paris</span></p>
            <p>Instruments à vent :<br>
                <span class="address">9/11 av. du Nouveau Conservatoire<br>
                    75019 Paris</span></p>
            <p>Percussions :<br>
                <span class="address">13/15 av. du Nouveau Conservatoire<br>
                    75019 Paris<br>
                    Métro Ligne 5, station Porte de Pantin.</span></p>
            <a href="">Plan d'accès</a> / <a href="">Visite virtuelle</a>
        </div>
        <div class="utilities col-sm-3">
            <h4>Utiles !</h4>

            <ul class="quid">
                <li>Qui sommes nous ?</li>
                <li>F.A.Q.</li>
                <li>Le blog Village Green</li>
                <li>Vous avez un site Internet ?</li>
                <li>Devenez partenaire Village Green</li>
                <li>Conditions générales de vente</li>
                <li>Mentions légales</li>
                <li>Plan du site</li>
                <li>Parrainage</li>
                <li>Nouveautés</li>
                <li>Assurance Woodbrass.com</li>
                <li>Location d'instruments de musique</li>
            </ul>
        </div>
        <div class="society col-sm-3">
            <h4>Village Green
                Preservation Society</h4>
            <ul class="actu">
                <li>Toute l'actualité musicale</li>
                <li>Voir l'avis des musiciens</li>
                <li>Concours : inscription et résultat... à vous de
                    jouer !</li>
            </ul>
        </div>
        <div class="recap col-sm-12">
            Village Green est une entreprise 100% Made in France !<br>
            Magasin de musique - Achat / Vente instruments de musique - Location instruments de musique - Atelier de réparation - Vente accessoires de musique au meilleur prix.<br>
            1989-2016 - RCS Paris B 222 333 444 Déclaration CNIL : 12345678.
        </div>
    </div>
    <div class="ffooter row">
        <h6>Guitares - Amplis / Effets - Claviers / Pianos - Synthés - Batteries / Percussions - Vents - Violons - Home Studio - Sonorisation - Deejay - Éclairage - Micros - Casques - Enregistreurs - Lifestyle - Déstockage - Ecoles & Pros</h6>
        <p>Behringer - Bose - Conservatoire de musique de Paris - Fender - Focusrite Scarlett - Focusrite - Gibson 2016 - Gibson - Guitar Shop - Guitare Martin - Guitare Taylor - Guitare classique - Guitare folk - Guitare électrique
            IK Multimedia - Luthier Paris - Magasin DJ Paris - Magasin instruments de musique Paris - Magasin sonorisation Paris - Microphone USB - Musique - Namm - Partition alto - Partition clarinette - Partition flute - Partition guitare
            Partition harmonica - Partition musique - Partition piano - Partition saxophone - Partition trombone - Partition trompette - Partition vibraphone - Partition violon - Partition xylophone - Piano pas cher - Pioneer DJ - Platine vinyle
            Site internet DJ - Site internet Deejay - Site internet Violon - Sono Behringer - Tablature guitare - Tablatures - Ukulele - Vente sono - Yamaha RS - batterie débutant</p>
    </div>
    
</footer>

<!-- footer petits ecrans!-->
<footer id="second" class="container">
    <div class="fheader">
        <div class="send form-group">
            <label for="mail" class="col-form-label"><h4>Recevez<em> nos offres exclusives</em></h4></label>
            <div class="email">
                <input type="email" class="form-control" name="mail" id="mail" placeholder="Votre adresse e-mail">
                <input type="submit" id="validMail" class="btn btn-danger" value="Valider">
            </div>
        </div>
        <div class="follow">
            <h4><em>Suivez-nous</em> par ici !</h4>
            <div id="followIcons">
                <a href=""><i class="fab fa-facebook"></i></a>
                <a href=""><i class="fab fa-twitter-square"></i></a>
            </div>
        </div>
    </div>
    <div id="accordion" class="fbody" role="tablist">
        <div class="card">
            <div class="card-header" role="tab" id="headingOne">
                <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Contactez-nous !
                    </a>
                </h5>
            </div>

            <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="card-body">
                    <p><h5>Conseil / Commande téléphone</h5>
                    du lundi au vendredi de 8h à 19h,<br>
                    le samedi de 10h à 18h.</p>
                    <p>Depuis la France :<br>
                        <span class="tel">02 40 38 50 50</span></p>
                    <p>Belgique, Suisse, International :<br>
                        <span class="tel">0033 2 40 38 50 50</span></p>
                    <p><h5>Service après vente :</h5>
                    <span class="tel">02 51 80 68 76</span></p>
                    <p>Contactez-nous par téléphone
                        du lundi au samedi de 9h à 18h
                        ou depuis votre compte client.</p>
                    <p><h5>Conseils pour choisir
                        un instrument :</h5>
                    infovg@villagegreen.com</p>
                    <p><h5>Service Presse :</h5>
                    contact@villagegreen.com</p>
                    <p><h5>Village Green Recrute !</h5></p>                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" role="tab" id="headingTwo">
                <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Village Green Stores
                    </a>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="card-body">
                    <h5>Ouverts de 10h à 19h30 non-stop.</h5>
                    <p>Guitares - Amplificateurs - Effets :<br>
                        <span class="address">182 avenue Jean Jaurès<br>
                            75019 Paris</span></p>
                    <p>Clavier - Home Studio - Sonorisation
                        Equipement DJ - Eclairage :<br>
                        <span class="address">184 avenue Jean Jaurès<br>
                            75019 Paris</span></p>
                    <p>Librairie Musicale :<br>
                        <span class="address">7 av. du Nouveau Conservatoire<br>
                            75019 Paris</span></p>
                    <p>Instruments à vent :<br>
                        <span class="address">9/11 av. du Nouveau Conservatoire<br>
                            75019 Paris</span></p>
                    <p>Percussions :<br>
                        <span class="address">13/15 av. du Nouveau Conservatoire<br>
                            75019 Paris<br>
                            Métro Ligne 5, station Porte de Pantin.</span></p>
                    <a href="">Plan d'accès</a> / <a href="">Visite virtuelle</a>                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" role="tab" id="headingThree">
                <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Utiles
                    </a>
                </h5>
            </div>

            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="card-body">
                    <ul class="quid">
                        <li>Qui sommes nous ?</li>
                        <li>F.A.Q.</li>
                        <li>Le blog Village Green</li>
                        <li>Vous avez un site Internet ?</li>
                        <li>Devenez partenaire Village Green</li>
                        <li>Conditions générales de vente</li>
                        <li>Mentions légales</li>
                        <li>Plan du site</li>
                        <li>Parrainage</li>
                        <li>Nouveautés</li>
                        <li>Assurance Woodbrass.com</li>
                        <li>Location d'instruments de musique</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" role="tab" id="headingFour">
                <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Village Green Preservation Society
                    </a>
                </h5>
            </div>

            <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
                <div class="card-body">
                    <ul class="actu">
                        <li>Toute l'actualité musicale</li>
                        <li>Voir l'avis des musiciens</li>
                        <li>Concours : inscription et résultat... à vous de
                            jouer !</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="recap col-sm-12">
        Village Green est une entreprise 100% Made in France !<br>
        Magasin de musique - Achat / Vente instruments de musique - Location instruments de musique - Atelier de réparation - Vente accessoires de musique au meilleur prix.<br>
        1989-2016 - RCS Paris B 222 333 444 Déclaration CNIL : 12345678.
    </div>
<script src=<?php echo base_url("assets/js/script.js");?>></script> 
<script src=<?php echo base_url("assets/js/ex.js");?>></script> 
<script src=<?php echo base_url("assets/js/jquery_fonction.js");?>></script> 
</footer>
</body>
</html>