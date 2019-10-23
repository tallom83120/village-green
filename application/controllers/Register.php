<?php
// application/controllers/Produits.php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller
{
    /*fonction inscription affiche le form inscription et insert ds la bdd les données rentrée par l'utilisateur */
    public function inscriptionClient(){           
           $this->load->helper('url');
           $this->load->helper('form');
           $this->load->model('produits_model');
           $aCategories['aCatMenu']=$this->produits_model->souscategories();
           $this->load->model('categories_model');
           $aCategories['aViewCategorie']=$this->categories_model->listeCategorie();
           // Chargement de la librairie 'Upload'
           $this->load->library('upload');
           $this->form_validation->set_rules('prenom','prenom','htmlspecialchars|required|min_length[2]|max_length[50]', array( 'required'  => 'Vous devez renseignez le champ Prénom','min_length'=>'le champ prénom requiert 2 lettres minimum', 'max_length'=>'le champ peut comporter un maximum de 50 caractères.'));
           $this->form_validation->set_rules('nom','nom','htmlspecialchars|required|min_length[2]|max_length[50]', array( 'required'  => ' Vous devez renseignez le champ nom' ,'min_length'=>'le champ nom mrequiert 2 lettres minimum', 'max_length'=>'le champ peut comporter un maximum de 50 caractères.'));
           $this->form_validation->set_rules('email','email','required|valid_email|is_unique[clients.email]', array('valid_email'=>'veuillez saisir un email valide exemple: toto@yahoo.fr', 'required'  => 'champ Mail obligatoire','is_unique' =>'cet email est déjà utilisé, veuillez en saisir un autre.'));
           $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]',array('required'=> 'veuillez saisir un mot de passe','min_length'=>'votre mot de passe doit comporter minimum 8 caractères.'));
           $this->form_validation->set_rules('check_password', 'check_password', 'trim|required|matches[password]',array('required'=> 'Veuillez confirmer votre mot de passe','matches'=>'le mot de passe saisi ne correspond pas'));
           $this->form_validation->set_rules('adresse','adresse','htmlspecialchars|required|min_length[6]|max_length[100]', array( 'required'  => ' Vous devez renseignez le champ adresse'));
           $this->form_validation->set_rules('cp','cp','htmlspecialchars|required|exact_length[5]|integer', array( 'required'  => 'Vous devez saisir un code postal', 'exact_length'=>'votre code postal doit comporter 5 chiffres.'));
           $this->form_validation->set_rules('ville','ville','htmlspecialchars|required|min_length[4]|max_length[50]', array( 'required'  => ' Vous devez renseignez le champ adresse','min_length'=>'veuillez saisir minimum 2 caractères','max_length'=>'veuillez saisir 50 caractères maximum'));
           $this->form_validation->set_rules('mobile','mobile','htmlspecialchars|required|exact_length[10]|integer', array( 'required'  => ' Vous devez renseignez le champ numéro de Portable', 'exact_length'=>'veuillez saisir un numéro de téléphone valide'));
           
           $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">
               &times</span></button>' ,'</div>');
           if ($this->input->post()) 
           {  if ($this->input->post('type_clients')=='professionnel'){
               $this->form_validation->set_rules('nom_entreprise','nom_entreprise','htmlspecialchars|required|min_length[1]|max_length[60]|is_unique[clients.nom_entreprise]', array( 'required'  => ' Vous devez renseignez le champ Entreprise' ,'min_length'=>'le champ entreprise requiert 2 caractères minimum', 'max_length'=>'le champ entreprise peut comporter un maximum de 60 caractères.','is_unique'=>"le nom de cette entreprise existe, veuillez vérifier que vous n'avez pas déjà un compte chez nous."));
               $this->form_validation->set_rules('num_siret','num_siret','htmlspecialchars|required|exact_length[14]|integer', array( 'required'  => ' Vous devez saisir un numéro Siret', 'exact_length'=>'votre numéro Siret doit comporter 14 chiffres.','integer'=>'le numéro siret est uniquement composer de chiffres (14)'));
           }
                if ($this->form_validation->run() != FALSE)
                {
                    if ($this->input->post('type_clients')=='professionnel'){
                        $array1=array('nom_entreprise'=>$this->input->post('nom_entreprise'),'num_siret'=>$this->input->post('num_siret'));
                    }
                    $data=array('type_clients'=>$this->input->post('type_clients'),'nom'=>$this->input->post('nom'),'prenom'=>$this->input->post('prenom'),'email'=>$this->input->post('email'),'password'=>$this->input->post('password'),'adresse'=>$this->input->post('adresse'),'cp'=>$this->input->post('cp'),'ville'=>$this->input->post('ville'),'mobile'=>$this->input->post('mobile'));  
                    if(isset($array1))
                    {
                        $data = array_merge($data, $array1);
                    }
                    $this->load->model('register_model');
                    $this -> load -> library ( 'email' );
           
                    $config [ 'charset' ]  =  'utf-8' ;
                    $config['crlf']="\r\n";
                    $config['newline']="\r\n";
                    $config['wrapchars']=70;
                    $this -> email -> initialize ($config);
            
                    $to=$this->input->post('email');
           
                    $this->email->from('allombert_thib@hotmail.fr', 'Village Green');
                    $this->email->to($to);
                    $this->email->subject("Confirmation d'inscription");
                    $this->email->message('Bienvenue dans le monde merveilleux de Village Green, votre compte est à présent crée.');
                    if($this->email->send())
                    {
                        $this->register_model->inscriptionClient($data);
                        redirect('produits/accueil');
                    }
                    else 
                    {
                        $this->load->view('inscription',$aCategories);
                    }
                }
                else 
                {
                    $this->load->view('inscription',$aCategories);}
            }
            else 
            {
                $this->load->view('inscription',$aCategories);}
       }
   //connexion
       public function loginClient()
       {
           $this->load->model('produits_model');
           $aCategories['aCatMenu']=$this->produits_model->souscategories();
           $this->load->model('categories_model');
           $aCategories['aViewCategorie']=$this->categories_model->listeCategorie();
           $this->load->view("accueil",$aCategories);
           $this->load->model('register_model'); //charge le model
           if ( $this->input->post()){
               $data=$this->input->post();
               $login = $data["login"];
               $password = $data["password"];
               $clients=$this->register_model->loginClient($login);
               if ( !empty ($clients)) {
                   if (password_verify($password, $clients->password)){//fonction password_verify vérifie que le hachage correspond au bon mot de passe.
                       
                       $this->register_model->connexion_utilisateur($login);
                       $this->session->loginClient = $clients;
                       $this->session->email = $login;
                       $this->session->message = "bienvenue ".$clients->nom;
                       $this->session->jeton= bin2hex(openssl_random_pseudo_bytes(6));//crée un jeton aleatoire de 6 caracteres pour chaque connexion de l'utilisateur pour que la page detail users soit sécuriser.
                       redirect(site_url("produits/liste"));
                   }
                   else {
                       $this->session->set_flashdata("flashdata","<div class='alert alert-danger alert-dismissible mt-2'>  <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>
               &times</span></button> Le mot de passe et le login ne correspondent pas !</div");
                       redirect(site_url("produits/accueil")); 
                   }
                    }
               else {
                   $this->session->set_flashdata("flashdata","<div class='alert alert-danger alert-dismissible mt-2'>  <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>
               &times</span></button> Le mot de passe et le login ne correspondent pas !</div");
                   redirect(site_url("produits/accueil")); 
               }
           }
           else{$this->load->view('accueil');
               $this->session->flashdata ="";
           } }

        public function logoutClient(){
                            unset($this->session->loginClient);
                           unset($this->session->message);
                           $this->session->unset_userdata('login');
                           $this->session->sess_destroy();
                           redirect(site_url("produits/accueil"));
                                 }
                   
        public function detail_users($login, $jeton){  
            if($this->session->loginClient->nom == $login && $this->session->jeton == $jeton){
                           $this->load->model('produits_model');
                           $aCatMenu["aCatMenu"]=$this->produits_model->souscategories();
                           $this->load->model('register_model');
                           $aDetail=$this->register_model->detail_users($this->session->email);
                           $aCatMenu["detail_users"] = $aDetail;
                           $this->load->view('detail_users',$aCatMenu);
                                                                                    }
                                                    }
                                      
         public function inscriptionAdmin(){
                                                        
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->model('categories_model');
            $aCategories['aViewCategorie']=$this->categories_model->listeCategorie();
            $this->load->model('produits_model');
            $aCategories['aFournisseurs']=$this->produits_model->listefournisseur();
            $aCategories['aCatMenu']=$this->produits_model->souscategories();
            $this->load->model('register_model');
            $aCategories['aRole']=$this->register_model->listeRole();
            
            $this->form_validation->set_rules('nom_pers','nom_pers','htmlspecialchars|required|min_length[1]|max_length[50]',array( 'required'  => ' Vous devez renseigner le champ "nom"','max_length'=>'50 caractères maximum'));
            $this->form_validation->set_rules('prenom_pers','prenom_pers','htmlspecialchars|required|min_length[1]|max_length[50]',array( 'required'  => ' Vous devez renseigner le champ "prénom"','max_length'=>'50 caractères maximum'));
            $this->form_validation->set_rules('mail_pers','mail_pers','required|valid_email|is_unique[personnel.mail_pers]', array('valid_email'=>'veuillez saisir un email valide exemple: toto@yahoo.fr', 'required'  => 'champ Mail obligatoire','is_unique' =>'cet email est déjà utilisé, veuillez en saisir un autre.'));
            $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]',array('required'=> 'veuillez saisir un mot de passe','min_length'=>'votre mot de passe doit comporter minimum 8 caractères.'));
            $this->form_validation->set_rules('check_password', 'check_password', 'trim|required|matches[password]',array('required'=> 'Veuillez confirmer votre mot de passe','matches'=>'le mot de passe saisi ne correspond pas'));
            $this->form_validation->set_rules('adresse_pers','adresse','htmlspecialchars|required|min_length[6]|max_length[100]', array( 'required'  => ' Vous devez renseigner le champ adresse'));
            $this->form_validation->set_rules('cp_pers','cp','htmlspecialchars|required|exact_length[5]|integer', array( 'required'  => 'Vous devez saisir un code postal', 'exact_length'=>'votre code postal doit comporter 5 chiffres.'));
            $this->form_validation->set_rules('ville_pers','ville','htmlspecialchars|required|min_length[4]|max_length[50]', array( 'required'  => ' Vous devez renseigner le champ adresse','min_length'=>'veuillez saisir minimum 2 caractères','max_length'=>'veuillez saisir 50 caractères maximum'));
            $this->form_validation->set_rules('telephone','telephone','htmlspecialchars|required|exact_length[10]|integer', array( 'required'  => ' Vous devez renseigner le champ numéro de Portable', 'exact_length'=>'veuillez saisir un numéro de téléphone valide'));
           
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">
               &times</span></button>' ,'</div>');
            if ($this->input->post())
            {   
            if ($this->form_validation->run() != FALSE)
            {
                $data=array('pers_role_ID'=>$this->input->post('pers_role_ID'),'nom_pers'=>$this->input->post('nom_pers'),'prenom_pers'=>$this->input->post('prenom_pers'),'mail_pers'=>$this->input->post('mail_pers'),'password'=>$this->input->post('password'),'adresse_pers'=>$this->input->post('adresse_pers'),'cp_pers'=>$this->input->post('cp_pers'),'ville_pers'=>$this->input->post('ville_pers'),'telephone'=>$this->input->post('telephone'));

                $this ->load->library('email');
                
                $config [ 'charset' ]  =  'utf-8' ;
                $config['crlf']="\r\n";
                $config['newline']="\r\n";
                $config['wrapchars']=70;
                $this -> email -> initialize ($config);
                
                $to=$this->input->post('email');
                
                $this->email->from('allombert_thib@hotmail.fr', 'Village Green');
                $this->email->to($to);
                $this->email->subject("Confirmation d'inscription administration");
                $this->email->message('Bienvenue dans le monde merveilleux de Village Green, votre compte est à présent crée.');
                if($this->email->send())
                {
                    $this->register_model->inscriptionAdmin($data);
                    redirect('produits/accueil');
                }
                else
                {
                    $this->load->view('formulaire_ajout',$aCategories);
                }
            }
            else
            {
                $this->load->view('formulaire_ajout',$aCategories);}
            }
            else
            {
                $this->load->view('formulaire_ajout',$aCategories);}
         }
            
         public function loginAdmin(){
            $this->load->model('produits_model');
            $aCategories['aCatMenu']=$this->produits_model->souscategories();
            $this->load->model('categories_model');
            $aCategories['aViewCategorie']=$this->categories_model->listeCategorie();
            $this->load->view("accueil",$aCategories);
            $this->load->model('register_model'); //charge le model
            if ( $this->input->post()){
                $data=$this->input->post();
                $login = $data["login"];
                $password = $data["password"];
                $personnel=$this->register_model->loginAdmin($login);
                if ( !empty ($personnel)) {
                    if (password_verify($password, $personnel->password)){//fonction password_verify vérifie que le hachage correspond au bon mot de passe.
                        
                        $this->register_model->connexionAdmin($login);
                        $this->session->loginAdmin = $personnel;
                        $this->session->mail_pers = $login;
                        $this->session->messageAdmin = "bienvenue ".$personnel->nom_pers;
                        $this->session->jeton= bin2hex(openssl_random_pseudo_bytes(6));//crée un jeton aleatoire de 6 caracteres pour chaque connexion de l'utilisateur pour que la page detail users soit sécuriser.
                        redirect(site_url("produits/ajoutproduits"));
                    }
                    else {
                        $this->session->set_flashdata("flashdataAdmin","<div class='alert alert-danger alert-dismissible mt-2'>  <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>
               &times</span></button> Le mot de passe et le login ne correspondent pas !</div");
                        redirect(site_url("register/loginadmin"));
                    }
                }
                else {
                    $this->session->set_flashdata("flashdataAdmin","<div class='alert alert-danger alert-dismissible mt-2'>  <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>
               &times</span></button> Le mot de passe et le login ne correspondent pas !</div");
                    redirect(site_url("register/loginadmin"));
                }
            }
            else{
                 $this->load->view('accueil');
                 $this->session->flashdataAdmin ="";
            } 
                                             }
               public function logoutAdmin(){
                    unset($this->session->loginAdmin);
                    unset($this->session->message);
                    $this->session->unset_userdata('login');
                    $this->session->sess_destroy();
                    redirect(site_url("produits/ajoutproduits"));
                                             }
                public function ajoutRole() 
                    {
                        $this->load->helper('url');
                        $this->load->helper('form');
                        $this->load->model('produits_model');
                        $aCategories['aCatMenu']=$this->produits_model->souscategories();
                        $this->load->model('categories_model');
                        $aCategories['aViewCategorie']=$this->categories_model->listeCategorie();
                        $this->form_validation->set_rules('role_nom','role_nom','htmlspecialchars|required|min_length[1]|max_length[50]', array( 'required'  => ' Vous devez renseignez le champ "Rôle"'));
                        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">
               &times</span></button>' ,'</div>');
                        if ($this->input->post())
                        {
                            if ($this->form_validation->run() === FALSE)
                            {
                                $aCategories['errorRole']=true;
                                $this->load->view('formulaire_ajout',$aCategories);
                            }
                            else
                            {
                                $this->load->model('register_model');
                                $this->register_model->ajoutRole();
                                redirect("register/ajoutRole");}
                        }
                        else
                        {
                            $this->load->view('formulaire_ajout',$aCategories);
                        }
                    }
                    public function detail_Admin($login, $jeton){
                        if($this->session->loginAdmin->nom_pers == $login && $this->session->jeton == $jeton){
                            $this->load->model('produits_model');
                            $aCatMenu["aCatMenu"]=$this->produits_model->souscategories();
                            $this->load->model('register_model');
                            $aDetail=$this->register_model->detail_Admin($this->session->mail_pers);
                            $aCatMenu["detail_Admin"] = $aDetail;
                            $this->load->view('detail_Admin',$aCatMenu);
                        }
                    }
         /*  public function forgotpassword(){
                            $this->load->helper('url');
                            $this->load->library('email');
                            $this->form_validation->set_rules('mail','mail','trim|required|max_length[100]');
                            $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible">  <button type="button" class="close"  data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">
               &times</span></button>' ,'</div>');
                            if($this->input->post("valider")){
                                if($this->form_validation->run())
                            {
                                $email = $this->input->post('mail');
                                $this->load->model('register_model');
                                var_dump($email);
                              if($this->register_model->verifEmail($email) != NULL){
                                    $this->email->from('allombert_thib@hotmail.fr','admin');
                                    $this->email->to($email);
                                    $this->email->subject('Mot de passe oublié');
                                    $this->email->message('http://localhost/projet/ci/index.php/register/changepassword');
                                    $this->email->send();
                               redirect("produits/liste")  ;   
                               echo "Le mail de confirmation a été envoyé";
                              }
                                else
                                {
                                    echo "mail incorrect";
                                }
                            }
                            else{
                                $this->load->view('forgotpassword');
                            }
                            }else{
                                $this->load->view('forgotpassword');
                            }
           }
                            
        public function changepassword() {
            $this->load->library('upload');
            $this->form_validation->set_rules('password', 'password','required|max_length[60]');
           $this->form_validation->set_rules('passwordConfirmation', 'passwordConfirmation', 'trim|required|matches[password]',array('required'=> 'Veuillez confirmer votre mot de passe','matches'=>'le mot de passe saisi ne correspond pas'));

            if ($this->input->post())
            {if ($this->form_validation->run()) {
                $this->load->model('register_model');
                $this->input->post('password');
                redirect("register/login");
            }
            else{
                $this->load->view('changepassword');
            }
            }
            else{
                $this->load->view("changepassword");
            }
        }*/
}
           ?>
      