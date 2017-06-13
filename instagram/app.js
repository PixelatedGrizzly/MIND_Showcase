function stopRKey(evt) {
  var evt = (evt) ? evt : ((event) ? event : null);
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
}

document.onkeypress = stopRKey;

window.Instagram = {
    /**
     * Store application settings
     */
    config: {},

    BASE_URL: 'https://api.instagram.com/v1',

    init: function( opt ) {
        opt = opt || {};

        this.config.access_token = opt.access_token;
    },

    /**
     * Get a list of recently tagged media.
     */
    tagsByName: function( name, callback ) {
        var endpoint = this.BASE_URL + '/tags/' + name + '/media/recent?access_token=' + this.config.access_token;
        this.getJSON( endpoint, callback );
    },

    getJSON: function( url, callback ) {
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'jsonp',
            success: function( response ) {
                if ( typeof callback === 'function' ) callback( response );
            }
        });
    }
};

Instagram.init({
    access_token: '5588470137.e821d32.7934167dc002480b9cf9bfd5542adfa7'
});


$( document ).ready(function() {

    $( '#search' ).on('change', function( e ) {
        e.preventDefault();

        var tagName = $( '#search' ).val();
        Instagram.tagsByName(tagName, function( response ) {
            var $instagram = $( '#instagram' );
                $instagram.html('');
            if(response.data.length==0){
                $instagram.css("width","100%");
                $instagram.css("height","50px");
                $instagram.append('Aucun valeur correspandante à la recherche!');
            }else{
                for ( var i = 0; i < response.data.length; i++ ) {
                    imageUrl = response.data[i].images.low_resolution.url;
                    $instagram.css("width","100%");
                    $instagram.css("height","500px");
                    $instagram.append( '<div class="thumb" style="display:block; background-image: url(' + imageUrl + '" />' );
                }
            }
        });
    });

    function choisir(photo){
        var url=$(photo).css("background-image");
        $("#photo_choisi").val(url);
        $(photo).css("border","solid black 2px");
    }

    $('#instagram').on("click",".thumb",function(){
        $(".thumb").css("border","none");
        choisir(this);
    })

    $("#ajouter_upload").on("click",function(){
        $("#les_photos").append("<input class='form' type='file' name='photos[]' >");
    })


});


