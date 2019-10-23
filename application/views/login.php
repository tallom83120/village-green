<?php
$title="Connexion";
ob_start();
?>  
<?php echo form_open('register/loginAdmin');
                                    ?>                                     
                                    <div class="form-group">
                                        <label for="user"></label>
                                        <input type="email" class="form-control" id="login" name="login" placeholder="Adresse E-mail">
                                        <span class="text-danger"><?php echo form_error('login');?>
										</span>
                                        <label for="mdp"></label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
										<?php echo $this->session->flashdata;?> 
										<span class="text-danger"><?php echo form_error('password');?>
										</span>
                                         <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="rememberMe" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Rester connecté</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-danger">Se connecter maintenant</button>
                                    <?php echo $this->session->flashdata("error");?>
                                    Vous avez oublié votre mot de passe ?
									<?php echo form_close();?>      
<?php
$contenu = ob_get_clean();
require 'template.php';
?>
