$(function () {
	

$("#postbtn").on('click', function () {
	var title =  $("#post_title").val();
	var text  =  $("#post_text").val();
	var posted_by = $("#posted_by").val();

	if (!title.length || !text.length)
		{
			alert('You can\'t post without a title or content!');
		}

	else
		{
			$.ajax({
						url: './createpost/',
						type: 'post',
						data: {
							title:title,
							text:text,
							posted_by:posted_by
						},
						success: function (data) {
							$('.content').html(data);
						}
					});	
		}
});


$(".readmore").on('click', function () {
	
	var alias = $(this).data('alias');
	window.location = "./getpost/"+alias;
	
});

$(".postedit").on('click', function () {
	
	var alias = $(this).data('alias');
	window.location = "./editpost/"+alias;
	
});

$(".postdelete").on('click', function () {
	
	var alias = $(this).data('alias');
	
	
	$.ajax({
			url: "./deletepost/"+alias,
			type: 'get',
			data: {},
			success: function (data) {
				$('.content').html(data);
			}
		});
	
});

});