$(function () {
	
	$('#savebtn').on('click', function () {
		
		var title =  $("#post_title").val();
		var text  =  $("#post_text").val();
		var posted_by = $("#posted_by").val();
		var id = $("#id").val();

		if (!title.length || !text.length)
		{
			alert('You can\'t post without a title or content!');
		}
		else
		{
			$.ajax({
						url: '../savepost',
						type: 'post',
						data: {
							title:title,
							text:text,
							posted_by:posted_by,
							id:id
						},
						success: function (data) {
							window.location='../';
						}
					});	
		}

	});

});