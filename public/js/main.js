

window.addEventListener("load", function(){
	$('.btn-like').css('cursor','pointer');
	$('.btn-dislike').css('cursor','pointer');
	$(document).on("click", ".btn-dislike", function(e){
		$(this).addClass('btn-like').removeClass('btn-dislike');
		$(this).attr('src', '/img/heart-red.png');

        let idimage = $(this).data('id');
        let number = parseInt(document.getElementById('image-' + idimage).innerHTML); 
        document.getElementById('image-' + idimage).innerHTML = number + 1;


        $.ajax({
            url: '/like/'+idimage,
            type: 'GET',
            success: function(response){
                if(response.like){
                    console.log('has dado like a la publicacion');
                }else {
                    console.log('error al dar like');
                }
            }
        });

	});
	$(document).on("click", ".btn-like", function(e){
		$(this).addClass('btn-dislike').removeClass('btn-like');
		$(this).attr('src', '/img/heart-black.png');

        let idimage = $(this).data('id');
        let number = parseInt(document.getElementById('image-' + idimage).innerHTML); 
        document.getElementById('image-' + idimage).innerHTML = number - 1;

        $.ajax({
            url: '/dislike/'+idimage,
            type: 'GET',
            success: function(response){
                if(response.like){
                    console.log('has dado dislike a la publicacion');
                }else {
                    console.log('error al dar dislike');
                }
            }
        });

	});

    // BUSCADOR
    $('#buscador').submit(function(){
        $(this).attr('action', '/people/'+$('#buscador #search').val());
    })
});