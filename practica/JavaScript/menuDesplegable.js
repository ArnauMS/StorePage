/* Ens serveix per amagar el menú que hi ha adalt a la dreta de dades, i quan fem click ens mostra aquest menú */

$(document).ready(function(){
    $('.sessio').hide();

    $('#dades').click(function(){
        $('.sessio').slideToggle();
    })
})


