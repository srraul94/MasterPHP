var url = 'http://localhost:8888/master-php/proyecto-laravel/public/';
window.addEventListener("load", function () {

    $('.btn-like').css('cursor', 'pointer');
    $('.btn-dislike').css('cursor', 'pointer');

    $(document).on("click", ".btn-like", function (e) {
        $(this).attr('src', url+'img/heart-red.png');
        $(this).addClass('btn-dislike').removeClass('btn-like');
       

        $.ajax({
            url: url+ 'like/'+$(this).data('id'),
            type:'GET',
            success: function(response){
                if(response.like){
                    console.log('Like realizado');
                }
                else{
                    console.log('Like no realizado');
                }
                
            }

        });
    });

    $(document).on("click", ".btn-dislike", function (e) {
        $(this).addClass('btn-like').removeClass('btn-dislike');
        $(this).attr('src', url+'img/heart-black.png');

        $.ajax({
            url: url+ 'dislike/'+$(this).data('id'),
            type:'GET',
            success: function(response){
                if(response.like){
                    console.log('disLike realizado');
                }
                else{
                    console.log('disLike no realizado');
                }
                
            }

        });
    });

    //buscador
    $('#buscador').submit(function(e){
        
        $(this).attr('action',url+'gente/'+$('#buscador #search').val());
        $(this).submit();
    });
});



