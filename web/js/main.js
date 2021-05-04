;(function(){
	$(document).on('keyup', '#fillterBooks input', function(){
		fillterBooks();
	});

	$(document).on('change', '#fillterBooks select', function(){
		fillterBooks();
	});

	function fillterBooks() {
		var form = $('#fillterBooks');
    	var url = form.attr('action');

    	$.ajax({
           type: "GET",
           url: url,
           data: form.serialize(),
           success: function(data)
           {
               $('#books').html(data);
           }
        });
	}

})()