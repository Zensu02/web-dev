$(document).on('click','#lsub',function(e){
	e.preventDefault();
	var info = $('#login').serializeArray();

	data = {}

	for (var i = 0; i < info.length; i++){
		data[info[i].name] = info[i].value
	}

	$.post("login.php",data,function(response){
		var reply = JSON.parse(response);

		if(reply.status){
			$("#lresponse").text(reply.message);
			window.location.href = 'index.php';
			$("#lresponse").text(reply.message)
		}

	});
})