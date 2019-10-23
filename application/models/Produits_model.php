<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Produits_model extends CI_Model
{
     //page liste
    public function accueil() 
     {
         $this->load->database();
         $requete = $this->db->query("SELECT * FROM produits");
         $aProduits = $requete->result();  
         return $aProduits;            
     }  
    //page detail
    public function detailProduit($id)
     {
         $results = $this->db->query("select * from produits  join categories on cat_id = pro_cat_id where pro_id=?",$id);
         $aDetail = $results->row();
        return $aDetail;
     }
   
     //model pour page affiche formulaire detail avant de supprimer un produit.
     public function form_supprime($id)
    {
    $this->load->database();
    $results = $this->db->query("select * from produits where pro_id=?",array($id));
    
    $aDetail = $results->row();
    return $aDetail;
    }
    //model pour supprimer produit
    public function supprime($id)
    {
     $this->load->database();
     $this->db->where('pro_id', $id);
     $supprime=$this->db->delete('produits');
     return $supprime;
    }
   
    // modif produit
    public function modif ($id)
    {
    $this->load->database();
    $data = $this->input->post();
    $this->db->set('pro_d_modif','now()',false);
    $this->db->where('pro_id', $id);
    $this->db->join('categories', 'categories.cat_id=produits.pro_cat_id');
    
     $modif=$this->db->update('produits', $data);
     return $modif;
    }
    public function affiche_modif($id)
    {        
        $this->load->database();
        $liste = $this->db->query("SELECT * FROM produits  WHERE pro_id=?", array($id));
        return $liste;
    }
  
      public function listeCategorie()
    {
        // Charge la librairie 'database' si non paramétré dans config
        $this->load->database();
        // Exécute la requête
        $requete = $this->db->query('SELECT * FROM categories WHERE cat_parent is null');
        // Récupération des résultats
        $aCategories = $requete->result();
        
        return $aCategories;
    }
    public function listeSousCategories()
    {
        // Charge la librairie 'database' si non paramétré dans config
        $this->load->database();
        // Exécute la requête
        $requete = $this->db->query('SELECT * FROM categories WHERE cat_parent =?', $_POST['cat_id']);
        // Récupération des résultats
        
        if ($requete) // Si la requête contient des informations
        {
            $aSousCategories = $requete->result();
            
            if ($aSousCategories && is_array($aSousCategories) && count($aSousCategories)>0)
            {
                // var_dump($aSousCategories);
                return $aSousCategories;
            }
        }
    }
    
    public function ajoutfournisseur(){
        $this->load->database();
        $data = $this->input->post();
        $this->db->set('fouDateAjout','now()',false);//insert la date d'inscription avec la fonction now()
        $this->db->insert("fournisseurs", $data);//insert données du formulaire ds la bdd
        
    }
    public function listefournisseur(){
        $this->load->database();
        $requete=$this->db->query("select fouNom, fouId from fournisseurs");
        $aFournisseurs=$requete->result();
        return $aFournisseurs;
    }
    
    public function ajoutProduits()
    {
        $this->load->database();
        $data = $this->input->post();
        $this->db->set('pro_d_ajout','now()',false);
        return $this->db->insert('produits', $data);
    }
    
    public function liste()
    {
        $this->load->database();
        $requete = $this->db->query("SELECT * FROM produits join categories where pro_cat_id=cat_id");
        $aProduits = $requete->result();
        return $aProduits;
    } 
    public function listeparsscategorie($id){
      $requete = $this->db->query("SELECT * FROM produits join categories where pro_cat_id=cat_id and pro_cat_id=?",$id);
        $this->load->database();
        $aProduits = $requete->result();
        return $aProduits;
        
    }  
    public function listeparcategorie($id){
        $this->load->database();
        $requete = $this->db->query("SELECT * FROM produits join categories where pro_cat_id=cat_id and cat_parent = ?",$id);
        $aProduits = $requete->result();
        return $aProduits;
    }
    
    public function souscategories()
    {      
        $this->load->database();
        $tabscat=$this->db->query("select * from categories where cat_parent is null")->result();
        $aCatMenu = [];
        $c = 0;
        foreach ($tabscat as $o) {
            $tabs=$this->db->query("select cat_id,cat_nom FROM categories where cat_parent=?", $tabscat[$c]->cat_id)->result();
            $aCatMenu[$o->cat_id] = array($o->cat_nom, $tabs);
            $c++;
        }
        return $aCatMenu;
    }
  
}
?>