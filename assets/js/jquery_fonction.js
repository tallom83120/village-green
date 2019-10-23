
		// fichier .js
$(document).ready(function()
{
		
	// Requête Ajax Catégories/sous-catégories sur les pages ajout de produit et modif produit  
/*	$(".menu1").click(function() 
			{	
			    // On récupère la valeur cliquée dans le <select> 'categories' (value du <select>)
				var categories_id = $(this).val();				
				
				
				$.post({
					cache: false,
					url: CI_BASE_URL+"/produits/menu_categorie", // url du fichier PHP qui va exécuter la requête SQL (CI_BASE_URL => variable definie dans le fichier liste_categories.php
					data:{cat_id:categories_id}, // passe le paramètre 'id' au fichier PHP, qui va valoir la région cliquée 
					dataType: "json", // on indique que le fichier est du type "json"
					success: function(aCategories) // la variable 'aCategories' reçoit le json retourné par PHP (via json_encode) 
					{			
									
						var contenu = ''; // on créé une chaîne vide nommée 'contenu'
						
						// 'each' est une boucle (équivalent d'un foreach en PHP)
						// lit ligne par ligne le JSON (une ligne = variable val)
						$.each(aCategories, function(val) 
						{		
		                    // on contruit pour chqe ligne le HTML d'un <option> du <select> 
		                    // avec les valeurs de la ligne JSON					
				            contenu +='<a class="dropdown-item" href=""  title="">'+val.cat_nom+'</a>';
    
				        });			
							
		                // une fois le JSON lu, on met à jour le HTML du <select> 'souscategories' avec les <option>
		                // construites pas le $.each 				
						$("#souscategories").html(contenu);
						
					},	
					error: function (request, error) {
				        console.log(error);		
				        				
				    },
				});		
			});	*/
	
	
	  /*$("a[id^='cat_']").click(function(){
		 var cat_id = $(this).attr('id');
		 $('.souscat').hide();
		 $("div[id$='"+cat_id+"']").show();
		 });*/
	
	
	var selectRadio = $('input[type="radio"]');
	var selectEntreprise = $('input[value="professionnel"]');
	var afficheNomEntreprise = $('div[id="NomEntreprise"]');
	var afficheNumSiret = $('div[id="NumSiret"]');
	
	afficheNomEntreprise.hide();
	  afficheNumSiret.hide();
	selectRadio.change( function() {
	  if(selectEntreprise.is(':checked')) {
		  afficheNomEntreprise.show();
		  afficheNumSiret.show();
		  
	  } 
	  else {
		  afficheNomEntreprise.hide();
		  afficheNumSiret.hide(); 
	  }
	});
	
});