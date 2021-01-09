function addFav(event){
    const btn = event.target;
	const id = event.target.getAttribute('data-id');

    $.ajax({
        url: 'functions/function_add_favorie.php',
        data: {
            filmID: id
        },
        dataType: 'json',
        type: 'get',
        success: function( data, textStatus, jQxhr ){
            btn.setAttribute('disabled','disabled');
        },
        error: function( jqXhr, textStatus, errorThrown ){
            console.log( errorThrown );
        }
    });
}