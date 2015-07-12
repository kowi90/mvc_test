$(function () {
	
	var userNameOK 		= 	false;
	var nameIsLong 		= 	false;
	var nameIsFree 		= 	false;
	var passwordlong 	= 	false;
	var passwordmatch 	= 	false;

	$('#regbtn').prop('disabled', true);


	setInterval(function(){ 

		console.log(userNameOK +'-'+ passwordlong +'-'+ passwordmatch );
		if (userNameOK && passwordlong && passwordmatch )
		{
			$('#regbtn').prop('disabled', false);
		}
		else
		{
			$('#regbtn').prop('disabled', true);
		}
	 }, 100);

	$("#regname").on('keyup', function () {
	
		
		if ($("#regname").val().length > 5) {nameIsLong = true;}

		$.ajax({
				url: 'namechange',
				type: 'post',
				async: false,
				data: 	{
					regname : $("#regname").val()
						},
				success: function (data) 
				{
					if(data.indexOf("exists") > -1)
						{
								nameIsFree = false;
								alert('This username already exists!');
						}
					else
					{
						nameIsFree = true;
					}
				}


			});
		
		if (nameIsLong && nameIsFree) 
		{

			$("#regname").css("border-color","green");
			userNameOK = true;
			
		}
		else
		{
			console.log("islong:"+nameIsLong);
			console.log("isfree:"+nameIsFree);
			$("#regname").css("border-color","red");
			userNameOK = false;
		}
	});


$("#regpass").on('keyup', function () 
{
	if($("#regpass").val().length > 5) 
		{
			passwordlong = true;
			$("#regpass").css("border-color","green");
		}
	else
		{
			passwordlong = false;
			$("#regpass").css("border-color","red");
		}
});

$("#regpass2").on('keyup', function () 
{
	if($("#regpass").val() === $("#regpass2").val()) 
		{
		
			passwordmatch = true;
			$("#regpass2").css("border-color","green");
		}
	else
		{
			passwordmatch = false;
			$("#regpass2").css("border-color","red");
		}
});


$("#regbtn").on('click', function()
	{
		var regname = $("#regname").val();
		var regpass = $("#regpass").val();
		var regauth = $("#authlevel").val();

		$.ajax({
				url: 'regtry',
				type: 'post',
				data: {
					regname : regname,
					regpass : regpass,
					regauth : regauth
				},
				success: function (data) {
					if (data.indexOf("ERR") == -1)
					{
						alert('Registration successful!');

					}
					else
					{
						alert('Error:'+data);	
					}
					location.reload();

				}
			});
	});


});