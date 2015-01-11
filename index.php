<!DOCTYPE html>
<html>
<head>
	<title>Spoj User Info</title>
	<link href="assets/favicon.png" rel="shortcut icon" type="image/x-icon">

	<meta name="og:title" content="Spoj UserInfo API" />
	<meta name="description" content="A simple, application to get Spoj User Info" />
	<meta name="og:description" content="A simple, application to get Spoj User Info" />
	<meta name="author" content="Faizan Ayubi" />
	<meta name="twitter:creator" content="@faizanayubi" />

	<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
</head>
<body>
	<h1>Spoj User Info</h1><hr><br>
	<p>An Application to find User Details from Spoj. Your Data will appear below as a table. </p>
	<p>Please file all bugs [in the issue tracker](https://github.com/faizanayubi/HotelsCrawler/issues).</p>
	<form id="user_info">
		<table style="float:center">
			<tr>
				<td>Enter UserName: </td>
				<td><input type="text" id="username" required=""></td>
				<td><button type="submit" id="submit">Find</button></td>
			</tr>
		</table>
	</form>
	<hr>
	<h2>Details</h2>
	<table id="output" style="float:center"></table>

<script type="text/javascript">
$(document).ready(function() {
	$('#user_info').submit(function(e) {
		e.preventDefault();
		$('#submit').html('Fetching...<img src="assets/ajax.gif">');
		var user = $('#username').val();
		$.ajax({
			url: 'action.php',
			data: {action: 'user_info', user: user}
		})
		.done(function(data) {
			console.log("success");
			$.each(data, function(property, val) {
				$('#output').append('<tr><td>'+property+'</td><td>'+val+'</td></tr>');
			});
		})
		.fail(function(data) {
			console.log("error");
			$('#output').html('Error. Please Try later');
		})
		.always(function() {
			$('#submit').html('Find');
			console.log("complete");
		});
	});
});
</script>
</body>
</html>