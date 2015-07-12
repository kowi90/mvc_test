$(function () {
	
var site_folder = $('#site_folder').val();

	$("#login").click(function (e) {
		e.preventDefault();

		inputname = $("#inputname").val();
		inputpass = $("#inputpass").val();

		$.ajax({
				url: 'login',
				type: 'post',
				data: {
					inputname : inputname,
					inputpass : inputpass
				},
				success: function (data) {
					if (data.indexOf('0') > -1)
					{
						$('.login-input').css('border-color','red');
					}
					else
					{
						location.reload();
					}
				}
			});

	});

	$("#logout").click(function (e) {
		
		$.ajax({
				url: 'logout',
				type: 'post',
				data: {},
				success: function (d) {
					location.reload();
				}
			});

	});

$("#register").click(function () {
		
		$(".content").load("./register", function() {});

	});


$("#menu_stats").click(function () {
		
		$(".content").load(window.location.origin+"/"+site_folder+"/stats", function() {});

	});

$("#menu_users").click(function (e) {
		
		$(".content").load(window.location.origin+"/"+site_folder+"/users", function() {});

	});

});