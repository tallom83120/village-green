$(function() {
// popover demo
    $('a[data-toggle=popover]').popover({
        html: true,
        //trigger: "click",
        content: function() {
            return $('#popover-content').html();
        }
    });
    $('a[data-toggle=popover6]').popover({
        html: true,
        //trigger: "click",
        content: function() {
            return $('#popover6-content').html();
        }
    });
    $('a[data-toggle=popover2]').popover({
        html: true,
        //trigger: "click",
        content: function() {
            return $('#popover2-content').html();
        }
    });
    $('a[data-toggle=popover3]').popover({
        html: true,
        //trigger: "click",
        content: function() {
            return $('#popover3-content').html();
        }
    });
    $('a[data-toggle=popover4]').popover({
        html: true,
        //trigger: "click",
        content: function() {
            return $('#popover4-content').html();
        }
    });
    $('a[data-toggle=popover5]').popover({
        html: true,
        //trigger: "click",
        content: function() {
            return $('#popover5-content').html();
        }
    });
    // ajout des zones obligatoires
    $('.ob').prepend('<span class="star">* </span>');
    $('.star').css('color', 'red').css('font-weight', 'normal');

    //regex email
    function verifEmail() {
        var regex = /[a-z0-9]{2,}@[a-z]{2,}\.[a-z]{2,4}/;
        if (regex.test($(this).val())) {
            $(this).css('border-color', 'green').css('backgroundColor', 'rgba(113, 170, 100, 0.2)');
        } else if ($(this).val() === '') {
            $(this).css('border-color', 'red').attr('placeholder', 'ce champs est obligatoire').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        } else if (!regex.test($(this).val())) {
            $(this).val('');
            $(this).css('border-color', 'red').attr('placeholder', 'adresse e-mail invalide').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        }
    }
    //regex
    function verifMdp() {
        var regexMdp = /^(?=.{10,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/;
        if (regexMdp.test($(this).val())) {
            $(this).css('border-color', 'green').css('backgroundColor', 'rgba(113, 170, 100, 0.2)');
        } else if ($(this).val() === '') {
            $(this).css('border-color', 'red').attr('placeholder', 'vous devez saisir un mot de passe').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        } else if (!regexMdp.test($(this).val())) {
            $(this).val('');
            $(this).css('border-color', 'red').attr('placeholder', 'mot de passe invalide').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        }
    }
    // regex verif nom prÃ©nom valide
    function verif() {
        var regexTest = /^[a-zA-ZÃ Ã§Ã©Ã¨ÃªÃ«Ã®Ã¯][a-zA-ZÃ Ã§Ã©Ã¨ÃªÃ«Ã®Ã¯]+([-'\s][a-zA-ZÃ©Ã¨ÃªÃ«Ã Ã§Ã¯Ã®]+)?$/;
        if (regexTest.test($(this).val())) {
            $(this).css('border-color', 'green').css('backgroundColor', 'rgba(113, 170, 100, 0.2)');
        } else if ($(this).val() === '') {
            $(this).css('border-color', 'red').attr('placeholder', 'ce champ est obligatoire').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        } else if (!regexTest.test($(this).val())) {
            $(this).val('');
            $(this).css('border-color', 'red').attr('placeholder', 'votre saisie n\'est pas valide').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        }
    }
    function verifAdresse() {
        var regexCp = /^([0-9a-zA-Z'Ã Ã¢Ã©Ã¨ÃªÃ´Ã¹Ã»Ã§Ã€Ã‚Ã‰ÃˆÃ”Ã™Ã›Ã‡\s-]{1,50})$/;
        if (regexCp.test($(this).val())) {
            $(this).css('border-color', 'green').css('backgroundColor', 'rgba(113, 170, 100, 0.2)');
        } else if ($(this).val() === '') {
            $(this).css('border-color', 'red').attr('placeholder', 'vous devez saisir une adresse').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        } else if (!regexCp.test($(this).val())) {
            $(this).val('');
            $(this).css('border-color', 'red').attr('placeholder', 'adresse invalide').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        }
    }
    function verifAdresseOpt() {
        var regexCp = /^([0-9a-zA-Z'Ã Ã¢Ã©Ã¨ÃªÃ´Ã¹Ã»Ã§Ã€Ã‚Ã‰ÃˆÃ”Ã™Ã›Ã‡\s-]{1,50})$/;
        if (($(this).val() === '') || ($(this).val() === 'non renseignÃ©')) {
            $(this).css('border-color', '#ced4da').attr('placeholder', 'non renseignÃ©');
        } else if (regexCp.test($(this).val())) {
            $(this).css('border-color', 'green').css('backgroundColor', 'rgba(113, 170, 100, 0.2)');
        } else if (!regexCp.test($(this).val())) {
            $(this).val('');
            $(this).css('border-color', 'red').attr('placeholder', 'adresse invalide').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        }
    }
// regex code postal y compris corse
    function verifCp() {
        var regexCp = /^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/;
        if (regexCp.test($(this).val())) {
            $(this).css('border-color', 'green').css('backgroundColor', 'rgba(113, 170, 100, 0.2)');
        } else if ($(this).val() === '') {
            $(this).css('border-color', 'red').attr('placeholder', 'vous devez saisir un code postal').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        } else if (!regexCp.test($(this).val())) {
            $(this).val('');
            $(this).css('border-color', 'red').attr('placeholder', 'code postal invalide').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        }
    }
    function verifMobile() {
        var regexMobile = /^0[67]([-. ]?[0-9]{2}){4}$/;
        if (regexMobile.test($(this).val())) {
            $(this).css('border-color', 'green').css('backgroundColor', 'rgba(113, 170, 100, 0.2)');
        } else if ($(this).val() === '') {
            $(this).css('border-color', 'red').attr('placeholder', 'vous devez saisir un numero de tÃ©lÃ©phone').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        } else if (!regexMobile.test($(this).val())) {
            $(this).val('');
            $(this).css('border-color', 'red').attr('placeholder', 'numÃ©ro de tÃ©lÃ©phone invalide').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        }
    }
    function verifFixe() {
        var regexFixe = /^0[1-589]([-. ]?[0-9]{2}){4}$/;
        if (regexFixe.test($(this).val())) {
            $(this).css('border-color', 'green').css('backgroundColor', 'rgba(113, 170, 100, 0.2)');
            $('#mobile').css('border-color', 'green').attr('placeholder', '').css('backgroundColor', 'rgba(113, 170, 100, 0.2)');
        } else if (($(this).val() === '') || ($(this).val() === 'non renseignÃ©')) {
            $(this).css('border-color', '#ced4da').attr('placeholder', 'non renseignÃ©').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        } else if (!regexFixe.test($(this).val())) {
            $(this).val('');
            $(this).css('border-color', 'red').attr('placeholder', 'numÃ©ro de tÃ©lÃ©phone invalide').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        }
    }

    $('#email').on('blur', verifEmail);
    $('#password, #password2').on('blur', verifMdp);
    $('#nom, #prenom, #ville').on('blur', verif);
    $('#adresse').on('blur', verifAdresse);
    $('#adresseOpt').on('blur', verifAdresseOpt);
    $('#cp').on('blur', verifCp);
    $('#mobile').on('blur', verifMobile);
    $('#fixe').on('blur', verifFixe);
    // changement du formulaire et du bouton modifier en valider lors de la modif de donnÃ©ees
    $('#buttonModif').on('click', function(e) {
        e.preventDefault();
        $('input:not([type="submit"])').removeClass('form-control-plaintext').addClass('form-control');
        $(this).attr('value', 'Valider').attr('id', 'buttonValidate');
        $('.obM').append('<span class="star"> *</span>')
        $('.star').css('color', 'red').css('font-weight', 'normal');
        $('#buttonValidate').on('click', function(e2) {
            e2.preventDefault();
            $('#modifDonnees').submit();
        });
    });
    // activation d'une fenÃªtre de validation de suppression d'un produit au clic sur le bouton
    $('#supprButton').on('click', function(e) {
        e.preventDefault();
        var lien = $(this).attr('href');
        if (confirm('Voulez-vous confirmer la suppression du produit ?')) {
            alert('le produit a Ã©tÃ© supprimÃ©');
            window.location.href = lien;
        }
    });
    
    function imageZoom(imgID, resultID) {
    	  var img, lens, result, cx, cy;
    	  img = document.getElementById(imgID);
    	  result = document.getElementById(resultID);
    	  /*create lens:*/
    	  lens = document.createElement("DIV");
    	  lens.setAttribute("class", "img-zoom-lens");
    	  /*insert lens:*/
    	  img.parentElement.insertBefore(lens, img);
    	  /*calculate the ratio between result DIV and lens:*/
    	  cx = (result.offsetWidth) / lens.offsetWidth;
    	  cy = (result.offsetHeight) / lens.offsetHeight;
    	  /*set background properties for the result DIV:*/
    	  result.style.backgroundImage = "url('" + img.src + "')";
    	  result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
    	  /*execute a function when someone moves the cursor over the image, or the lens:*/
    	  lens.addEventListener("mousemove", moveLens);
    	  img.addEventListener("mousemove", moveLens);
    	  /*and also for touch screens:*/
    	  lens.addEventListener("touchmove", moveLens);
    	  img.addEventListener("touchmove", moveLens);
    	  function moveLens(e) {
    	    var pos, x, y;
    	    /*prevent any other actions that may occur when moving over the image:*/
    	    e.preventDefault();
    	    /*get the cursor's x and y positions:*/
    	    pos = getCursorPos(e);
    	    /*calculate the position of the lens:*/
    	    x = pos.x - (lens.offsetWidth / 2);
    	    y = pos.y - (lens.offsetHeight / 2);
    	    /*prevent the lens from being positioned outside the image:*/
    	    if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
    	    if (x < 0) {x = 0;}
    	    if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
    	    if (y < 0) {y = 0;}
    	    /*set the position of the lens:*/
    	    lens.style.left = x + "px";
    	    lens.style.top = y + "px";
    	    /*display what the lens "sees":*/
    	    result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
    	  }
    	  function getCursorPos(e) {
    	    var a, x = 0, y = 0;
    	    e = e || window.event;
    	    /*get the x and y positions of the image:*/
    	    a = img.getBoundingClientRect();
    	    /*calculate the cursor's x and y coordinates, relative to the image:*/
    	    x = e.pageX - a.left;
    	    y = e.pageY - a.top;
    	    /*consider any page scrolling:*/
    	    x = x - window.pageXOffset;
    	    y = y - window.pageYOffset;
    	    return {x : x, y : y};
    	  }
    	}
    
    
 // Initiate zoom effect:
 imageZoom("myimage", "myresult");

    
    
    
});

