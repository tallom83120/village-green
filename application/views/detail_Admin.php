<?php
$title="";
ob_start(); ?> 

<div class="container detailProduit">
                   <h4>Mon Compte</h4>		
       
        <div class = "row description center">
            <?php if($this->session->loginAdmin){
    echo '<div class="row-sm-6 ml-4"><div class="card" style="width:25rem;"><details open>
    <summary>Informations personnel: </summary>
        <table>
            <tr>
                <td>Rôle:</td>
                <td>'.$detail_Admin->role_nom.'</td>

            <tr>
                <td>Adresse:&nbsp;</td>
                <td>'.$detail_Admin->adresse_pers.'<br>'.$detail_Admin->cp_pers.' '.$detail_Admin->ville_pers.'</td>
            </tr>
        </table>

        </details>
        </div></div>
        <div class="row-sm-6 ml-4">
       <div class="card" style="width: 25rem;"> <details open>
    <summary>Moyens de Contact: </summary>
    <table>
            <tr>
                <td>Civilité: </td>
                <td>' .'.$detail_Admin->nom_pers.'.$detail_Admin->prenom_pers.'</td>
            </tr>
            <tr>
                <td>Tél:</td>
                <td>'.$detail_Admin->telephone.'</td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>'.$detail_Admin->mail_pers.'</td>
            </tr>
         </table>
        </details>
        </div>  
      </div>
        <div class="col-sm-6 ml-2 mt-2">

        <table>
        <tr>
                <td>Date d\'inscription:</td>
                <td>'.$detail_Admin->date_acces_systeme.'</td>
            </tr>
            <tr>
                <td>Date de dernière connexion:</td>
                <td>'.$detail_Admin->date_connexion.'</td>
            </tr>
         </table></div>'

   ;  } 
   ?>
</div>
</div>

<?php 
   $contenu = ob_get_clean();
  require 'template.php';
  ?> 