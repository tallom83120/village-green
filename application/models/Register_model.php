<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model
{   
    
        public function inscriptionClient($data){
    $this->load->database();
    $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT); //hachage du mot de passe //
    $this->db->set('date_inscription','now()',false);//insert la date d'inscription avec la fonction now()
    $this->db->insert("clients", $data);//insert données du formulaire ds la bdd

                                       }

        public function loginClient($login){
    $this->load->database();
    $clients = $this->db->query("select * from clients where email=?", $login)->row();
    return $clients;
                                            }
                                            
        public function connexion_utilisateur($login){
    $this->load->database();
    $date = date('Y-m-d');
    $data=array('date_connexion'=>$date);
    $this->db->where('email',$login);
    $this->db->update('clients',$data); }
    
         public function detail_users($login){
    $results = $this->db->query("select * from clients where email=?",$login);
    $aDetail = $results->row();
    return $aDetail;  
                                        }
           
        public function inscriptionAdmin($data){
           $this->load->database();
           $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT); //hachage du mot de passe //
           $this->db->set('date_acces_systeme','now()',false);//insert la date d'inscription avec la fonction now()
           $this->db->insert("personnel", $data);
                                        }
        public function listeRole(){
            $this->load->database();
            $role=$this->db->query("select * from role");
            $aRole=$role->result();
            return $aRole;
                                        }
                                        
         public function loginAdmin($login){
             $this->load->database();
             $personnel = $this->db->query("select * from personnel where mail_pers=?", $login)->row();
              return $personnel;
                                        }
                                        
        public function connexionAdmin($login){
             $this->load->database();
             $date = date('Y-m-d');
             $data=array('date_connexion'=>$date);
             $this->db->where('mail_pers',$login);
             $this->db->update('personnel',$data); }
             
             public function ajoutRole(){
                 $this->load->database();
                 $data = $this->input->post();
                 $this->db->insert("role", $data);
             }
           public function detail_Admin($login){
                 $results = $this->db->query("select * from personnel join role where mail_pers=? and role_ID=pers_role_ID",$login);
                 $aDetail = $results->row();
                 return $aDetail;
             }
             
   /* public function verifEmail($email){
        $this->load->database();
        $results = $this->db->query("select * from clients where email=?",$email);
        $aDetail = $results->row();
        return $aDetail;
                                        }
    public function changermotdepasse (){
     $this->load->database();
     $data = $this->input->post();
     $this->db->where('password', $password);
     $changermotdepasse=$this->db->update('clients', $data);
     return $changermotdepasse;}*/

}
?>