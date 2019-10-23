<?php
// application/controllers/Produits.php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produits extends CI_Controller
{
    public function bouton () {
        $this->load->helper('url');
        $this->load->view('bouton');
                              }
    public function error404 (){
        $this->load->helper('url');
        $this->load->view('error404');
                               }
        //affichage liste page accueil
    public function accueil(){
        $this->load->helper('url');
        $this->load->model('produits_model');
        $aCatMenu=$this->produits_model->souscategories();
        $this->load->view('accueil', array("aCatMenu"=>$aCatMenu));
                             }
                                         
          //formulaire ajout
       public function ajoutcategorie(){
           $this->load->helper('url');
           $this->load->helper('form');
           // Chargement de la librairie 'Upload'
           $this->load->model('produits_model');
           $aCategories['aCatMenu']=$this->produits_model->souscategories();
           $this->load->model('categories_model');
           $aCategories['aViewCategorie']=$this->categories_model->listeCategorie();
           // qui retourne le tableau de résultat ici affecté dans la variable $aCategorie (un tableau)
           // remarque la syntaxe $this->nom_modele->methode()
           // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
           //utilisation des form_validation de codeigniter permet de créer des "regex" php permettant de guider l'utilisateur dans l'utilisation des formualires.
           $this->form_validation->set_rules('cat_nom','cat_nom','required|min_length[3]|max_length[50]', array( 'required'  => 'veuillez saisir une sous catégorie'));
           $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">
               &times</span></button>' ,'</div>');
           if ($this->input->post())
           {
               if ($this->form_validation->run() === FALSE)
               {
                   $aCategories['errorCat']=true;
                   $this->load->view('formulaire_ajout',$aCategories);
               }
               else
               {
                   $this->load->model('categories_model');
                   $this->categories_model->ajoutCategorie();
                   redirect("produits/ajoutcategorie");
               }}
           else
           { // 1er appel de la page: affichage du formulaire
                   $this->load->view('formulaire_ajout',$aCategories);
              }
                                        }
            public function ajoutfournisseur()
                                        {
               $this->load->helper('url');
               $this->load->helper('form');
               $this->load->model('produits_model');
               $aCategories['aCatMenu']=$this->produits_model->souscategories();
               $this->load->model('categories_model');
               $aCategories['aViewCategorie']=$this->categories_model->listeCategorie();
               $this->form_validation->set_rules('fouNom','fouNom','htmlspecialchars|required|min_length[1]|max_length[50]', array( 'required'  => ' Vous devez renseignez le champ Société'));
               $this->form_validation->set_rules('fouSiret','fouSiret','htmlspecialchars|integer|required|exact_length[14]', array( 'required'  => 'Vous devez renseignez le champ SIRET','exact_length=>votre numéro siret doit comporter 14 chiffres','integer'=>'les caractères saisies ne corespondent pas.'));
               $this->form_validation->set_rules('fouContact','fouContact','htmlspecialchars|required|min_length[1]|max_length[50]', array( 'required'  => 'Vous devez renseignez le champ nom du référent'));
               $this->form_validation->set_rules('fouAdress','fouAdress','htmlspecialchars|required', array( 'required'  => 'Vous devez renseignez le champ adresse'));
               $this->form_validation->set_rules('fouCp','fouCp','htmlspecialchars|integer|required|exact_length[5]', array( 'required'  => 'Vous devez renseignez le champ code postal','exact_length'=>'la valeur saisie ne correspond pas avec la valeur attendue'));
               $this->form_validation->set_rules('fouVille','fouVille','htmlspecialchars|required|min_length[1]|max_length[50]', array( 'required'  => 'Vous devez renseigner le champ ville'));
               $this->form_validation->set_rules('fouEmail','fouEmail','required|valid_email|is_unique[fournisseurs.fouEmail]', array('valid_email'=>'veuillez saisir un email valide exemple: toto@yahoo.fr', 'required'  => 'champ Mail obligatoire','is_unique' =>'cet email est déjà utilisé, veuillez en saisir un autre.'));
               $this->form_validation->set_rules('fouTel','fouTel','htmlspecialchars|integer|required|exact_length[10]', array( 'required'  => 'Vous devez renseignez le champ téléphone','exact_length'=>'la valeur saisie ne correspond pas avec la valeur attendue'));
                                            
               $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">
               &times</span></button>' ,'</div>');
                                            
                                            if ($this->input->post())
                                            {
                                                if ($this->form_validation->run() === FALSE)
                                                {
                                                    $aCategories['errorFou']=true;
                                                    $this->load->view('formulaire_ajout',$aCategories);
                                                }
                                                else
                                                {
                                                    $this->load->model('produits_model');
                                                    $this->produits_model->ajoutfournisseur();
                                                    redirect("produits/ajoutfournisseur");}
                                            }
                                            else
                                            {
                                                $this->load->view('formulaire_ajout',$aCategories);
                                            }
                                        }
                                        
                     //Ajout d'un produit
                                public function ajoutProduits(){
                                $this->load->helper('url');
                                $this->load->helper('form');
                    // Chargement de la librairie 'Upload'
                                $this->load->library('upload');
                                $this->load->model('produits_model');
                                $aCategories['aCatMenu']=$this->produits_model->souscategories();
                                $this->load->model('categories_model');
                                $aCategories['aViewCategorie']=$this->categories_model->listeCategorie();
                                $aCategories['aFournisseurs']=$this->produits_model->listefournisseur();
                                $this->load->model('register_model');
                                $aCategories['aRole']=$this->register_model->listeRole();
                                // On appelle la méthode listeCategories() du modèle,
                                // qui retourne le tableau de résultat ici affecté dans la variable $aCategorie (un tableau)
                                // remarque la syntaxe $this->nom_modele->methode()
                                // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
                                //utilisation des form_validation de codeigniter permet de créer des "regex" php permettant de guider l'utilisateur dans l'utilisation des formualires.
                                $this->form_validation->set_rules('pro_nom','nom','required|min_length[3]|max_length[50]', array( 'required'  => 'champ obligatoire'));
                                $this->form_validation->set_rules('pro_libelle','libelle','required|min_length[3]|max_length[50]', array( 'required'  => 'champ obligatoire'));
                                $this->form_validation->set_rules('pro_ref','reference','required|min_length[3]|max_length[50]|is_unique[produits.pro_ref]', array( 'required'  => 'champ obligatoire',
                                'is_unique' =>'la référence %s existe déjà.'));
                                $this->form_validation->set_rules('pro_prix','prix','required', array( 'required'  => 'champ obligatoire'));
                                $this->form_validation->set_rules('pro_stock','stock','required', array( 'required'  => 'champ obligatoire'));
                                $this->form_validation->set_rules('pro_couleur','couleur','required|min_length[2]|max_length[50]', array( 'required'  => 'champ obligatoire'));
                                $this->form_validation->set_rules('pro_photo','photo','required|min_length[3]|max_length[50]', array( 'required'  => 'champ obligatoire'));
                                $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">
               &times</span></button>' ,'</div>');
                               
                                            if ($this->input->post())
                                            {
                                                $aCategories['post']=$this->input->post();
                                                if ($this->form_validation->run() == FALSE)
                                                { 
                                                    $aCategories["errorPro"]=true;
                                                    $this->load->view('formulaire_ajout',$aCategories);
                                                    
                                                }
                                                else
                                                { 
                                                   //on appelle la fonction ajout qui va permettre d'ajouter notre produit et ses données ds la bdd.
                                                    // On créé un tableau de configuration pour l'upload
                                                    $config['upload_path'] = './assets/img/'; // chemin où sera stocké le fichier
                                                    $name=$_FILES["photo"]["name"];
                                                    $file_ext=pathinfo($name, PATHINFO_EXTENSION);
                                                    $config['file_name']= $this->db->insert_id().'.'.$file_ext; // nom du fichier final
                                                    $config['allowed_types'] = 'gif|jpg|png'; // Types autorisés (ici pour des images)
                                                    // On charge la librairie 'upload' de CodeIgniter en lui envoyant la config
                                                    $this->load->library('upload');
                                                    // On initialise la config
                                                    $this->upload->initialize($config);
                                                    // La méthode do_upload() effectue les validations sur l'attribut HTML 'name' ('fichier' dans notre formulaire) et si OK renomme et déplace le fichier tel que configuré
                                                    if ( ! $this->upload->do_upload('photo'))
                                                    {
                                                        // Echec : on récupère les erreurs dans une variable (une chaîne)
                                                        $errors = $this->upload->display_errors();
                                                        // on réaffiche la vue du formulaire en passant les erreurs
                                                        $aView["errors"] = $errors;
                                                        $this->load->view('produits/ajoutProduits',$aView);
                                                    }
                                                    else
                                                    { // Succès, on redirige sur la liste
                                                        $this->load->model('produits_model');
                                                        $this->produits_model->ajoutProduits();
                                                        redirect("produits/ajoutProduits");
                                                    }
                                                  
                                                    redirect("produits/ajoutProduits");
                                                }
                                            }
                                            else
                                            { // 1er appel de la page: affichage du formulaire
                                                    $this->load->view('formulaire_ajout',$aCategories);
                                            }}
                                        
   //formulaire modif 
                    public function modif($id)
                    {
                        $this->load->database();
                        $this->load->helper('url');
                        $this->load->helper('form');
                        $this->load->model('produits_model');
                        $aCategories['aCatMenu']=$this->produits_model->souscategories();
                        $aCategories['liste_produits']=$this->produits_model->detailProduit($id);
                        $this->load->model('categories_model');
                        $aCategories['aViewCategorie']=$this->categories_model->listeCategorie();
                        $aCategories['aFournisseurs']=$this->produits_model->listefournisseur();
                        $this->form_validation->set_rules('pro_nom','nom','required|min_length[2]|max_length[50]', array( 'required'  => 'veuillez compléter le nom du produit','min_length'=> 'le nom doit comporter entre 2 et 50 caractères maximum.', 'max_length'=>'le nom doit comporter entre 2 et 50 caractères maximum.'));
                        $this->form_validation->set_rules('pro_marque','marque','required|min_length[2]|max_length[50]', array( 'required'  => 'veuillez compléter la marque','min_length'=> 'la marque doit comporter entre 2 et 50 caractères maximum.', 'max_length'=>'la marque doit comporter entre 2 et 50 caractères maximum.'));
                        $this->form_validation->set_rules('pro_libelle','libelle','required|min_length[2]|max_length[50]', array( 'required'  => 'veuillez compléter le libellé du produit','min_length'=>'le libellé doit comporter entre 2 et 50 caractères maximum.','max_length'=>'le libellé doit comporter entre 2 et 50 caractères maximum.'));
                        $this->form_validation->set_rules('pro_ref','reference','required|min_length[2]|max_length[50]', array('required'=>'veuillez compléter la référence produit','min_length'=> 'la référence doit comporter entre 2 et 50 caractères maximum.', 'max_length'=>'la référence doit comporter entre 2 et 50 caractères maximum.'));
                        $this->form_validation->set_rules('pro_description','description','required|min_length[2]|max_length[500]', array( 'required'  => 'veuillez compléter la description produit','min_length'=>'la description doit comporter entre 2 et 500 caractères maximum.','max_length'=>'la description doit comporter entre 2 et 500 caractères maximum.'));
                        $this->form_validation->set_rules('pro_prix','prix','required|decimal|numeric', array( 'required'  => 'veuillez saisir un prix','decimal'=>'veuillez saisir un nombre décimal','numeric'=>'caractère incorrect pour ce champ '));
                        $this->form_validation->set_rules('pro_stock','stock','required|integer|numeric', array( 'required'  => 'champ obligatoire','integer'=>'veuillez saisir un entier','numeric'=>'caractère incorrect pour ce champ '));
                        $this->form_validation->set_rules('pro_couleur','couleur','required|min_length[2]|max_length[50]', array( 'required'  => 'veuillez saisir une couleur','min_length'=>'nombre de carctères insuffisant','max_length'=>'le champ couleur doit comporter 50 caractères maximum'));
                        
                        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible d-flex justify-content-center">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">
                        &times</span></button>' ,'</div>');
                        
                        if ($this->input->post())
                        {
                            if ($this->form_validation->run() != false){
                                $modif=$this->produits_model->modif($id);
                                redirect('produits/detailProduit/'.$id);
                            }
                            else{
                                $liste=$this->produits_model->affiche_modif($id);
                                
                                // Teste s'il y a un résultat à la requête effectué :
                                if (!$liste->row())
                                {
                                    echo"<p>L'id.$id. n'existe pas dans la base de données.</p>";
                                }
                                $aCategories['errorMod']=true;
                                
                                $aCategories['liste']=$liste;
                                $aCategories['produits'] = $liste->row(); // première ligne du résultat
                                $this->load->view('detail', $aCategories);
                                }
                           }
                        }

           public function supprime($id)
           {
               $this->load->helper('url');
               $this->load->helper('form');
              
               if($this->input->post("supprimer"))
               {   
                   $this->load->model('produits_model');
                   $aDetail=$this->produits_model->supprime($id);
                   redirect(site_url('produits/detail_categorie'));
               }
               else{
                   $this->load->model('produits_model');
                   $aDetail=$this->produits_model->form_supprime($id);
                   $aView["liste_produits"] = $aDetail;
                   $this->load->view('detail',$aView); 
               }
           }
          
           public function listeSousCategories()
           {
               if ($this->input->is_ajax_request())    // Si la requête est une requête ajax
               {
                   // Charge le modèle 'categories_model'
                   $this->load->model('produits_model');
                   // On appelle la méthode listeSousCategories() du modèle,
                   // qui retourne le tableau de résultat ici affecté dans la variable $aSousCategories (un tableau)
                   $aSousCategories = $this->produits_model->listeSousCategories();
                   echo json_encode($aSousCategories);
               }
           }
           
       
                  
        public function liste(){
                      $this->load->helper('url');
                      // On charge le modèle 'produits_model'
                      $this->load->model('produits_model');
                      // On appelle la méthode liste() du modèle,
                      // qui retourne le tableau de résultat ici affecté dans la variable $aListe (un tableau)
                      // remarque la syntaxe $this->nom_modele->methode()
                      $aListe = $this->produits_model->liste();
                      // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
                      $aCatMenu["aCatMenu"]=$this->produits_model->souscategories();
                      $aCatMenu["liste_produits"] = $aListe;
                      $this->load->view('detail_categorie', $aCatMenu);
                      // Appel de la vue avec transmission du tableau
                                         }
        public function listeparsscategorie($id){
            $this->load->helper('url');
            $this->load->model('produits_model');
            $aListe = $this->produits_model->listeparsscategorie($id);
            $aCatMenu["aCatMenu"]=$this->produits_model->souscategories();
            $aCatMenu["liste_produits"] = $aListe;
            $this->load->view('detail_categorie', $aCatMenu);
            
                                         }
        public function listeparcategorie($id){
            $this->load->helper('url');
            $this->load->model('produits_model');
            $aListe = $this->produits_model->listeparcategorie($id);
            $aCatMenu["aCatMenu"]=$this->produits_model->souscategories();
            $aCatMenu["liste_produits"] = $aListe;
            $this->load->view('detail_categorie', $aCatMenu);
            
            
        }
                                         
        public function detailProduit($id)
        {
            $this->load->helper('url');
            $this->load->model('produits_model');
            $this->load->model('categories_model');
            $aCategories['aViewCategorie']=$this->categories_model->listeCategorie();
            $aCategories['aFournisseurs']=$this->produits_model->listefournisseur();
            $aDetail=$this->produits_model->detailProduit($id);
            $aCategories["aCatMenu"]=$this->produits_model->souscategories();
            $aCategories["liste_produits"] = $aDetail;
           
                  $aCategories['produits'] = $aDetail; // première ligne du résultat
                /*if($this->session->role=="ROLE_ADMIN"){
                 $this->load->view('formulaire_modif', $aCategories);
                 }*/
                /* else{redirect('produits/detailProduit');}*/
                $this->load->view('detail', $aCategories);
         
        }
                                         
}

?>
   