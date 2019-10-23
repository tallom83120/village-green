<?php
$title="";
ob_start(); ?> 

<div class="container detailProduit">
                   <h4>Mon Compte</h4>		
       
        <div class = "row description center">
            <?php if($this->session->loginClient->type_clients=='professionnel'){
    echo '<div class="row-sm-6 ml-4"><div class="card" style="width:25rem;"><details open>
    <summary>Informations Entreprise: </summary>
        <table>
            <tr>
                <td>Société:</td>
                <td>'.$detail_users->nom_entreprise.'</td>
            </tr>
            <tr>
 <td>Siret:</td>
                <td>'.$detail_users->num_siret.'</td>
</tr>
            <tr>
                <td>Adresse:&nbsp;</td>
                <td>'.$detail_users->adresse.'<br>'.$detail_users->cp.' '.$detail_users->ville.'</td>
            </tr>
        </table>

        </details>
        </div></div>
        <div class="row-sm-6 ml-4">
       <div class="card" style="width: 25rem;"> <details open>
    <summary>Contact: </summary>
    <table>
            <tr>
                <td>Personne à contacter:</td>
                <td>'.$detail_users->nom.' '.$detail_users->prenom.'</td>
            </tr>
            <tr>
                <td>Tél:</td>
                <td>'.$detail_users->mobile.'</td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>'.$detail_users->email.'</td>
            </tr>
         </table>
        </details>
        </div>  
      </div>
        <div class="col-sm-6 ml-2 mt-2">

        <table>
        <tr>
                <td>Date d\'inscription:</td>
                <td>'.$detail_users->date_inscription.'</td>
            </tr>
            <tr>
                <td>Date de dernière connexion:</td>
                <td>'.$detail_users->date_connexion.'</td>
            </tr>
         </table></div>'

   ;  } 
   else{
      echo '<div class="col-sm-3">
            <details open>
              <summary>Votre identité  </summary>
                <table>
                 <tr>
                  <td>Nom</td>
                  <td>'.$detail_users->nom.'</td> 
                  <td> Prénom</td>
                  <td>'.$detail_users->prenom.'</td>
                </tr>
               </table>
            </details>
           </div>
        <div class="col-sm-3">
        <details open><summary>Vos moyens de Contact</summary>
        <table>
        <tr>
       <td>Tél:</td>
       <td>'.$detail_users->mobile.'</td>
       </tr>
       <tr>
       <td>Email:</td>
       <td>'.$detail_users->email.'</td>
       </tr>
        </table>
        </details>
        </div>
       <table>
       <tr>
       <td>Date d\'inscription:</td>
                <td>'.$detail_users->date_inscription.'</td>
            </tr>
            <tr>
                <td>Date de dernière connexion:</td>
                <td>'.$detail_users->date_connexion.'</td>
            </tr>
         </table>'
                    ;  }?>
</div>
</div>

<?php 
   $contenu = ob_get_clean();
  require 'template.php';
  ?> 