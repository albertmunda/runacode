<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Run a Code</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/bootstrap-filestyle.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript">
			$(":file").filestyle();
			$(document).ready(function () {
				$("#result").hide();
				$("#btnSubmit").click(function (event) {
				//stop submit the form, we will post it manually.
				event.preventDefault();
				// Get form
				var form = $('#codeform')[0];
				// Create an FormData object
				var data = new FormData(form);
				// If you want to add an extra field for the FormData
				// data.append("CustomField", "This is some extra data, testing");
				// disabled the submit button
				$("#btnSubmit").prop("disabled", true);
				$.ajax({
					type: "POST",
					enctype: 'multipart/form-data',
					url: "server/process.php",
					data: data,
					processData: false,
					contentType: false,
					cache: false,
					timeout: 600000,
					success: function (data) {
						$(":file").filestyle('clear');
						$("#result").show().html(data);
						console.log("SUCCESS : ", data);
						$("#btnSubmit").prop("disabled", false);
					},
					error: function (e) {
						$("#result").text(e.responseText);
						console.log("ERROR : ", e);
						$("#btnSubmit").prop("disabled", false);

					}
				});

			});

		});

	</script>
	</head>
	<body>
		<div class="container">
				<h1>Run a Code!</h1>
				<div class="panel panel-primary">
					<div class="panel-heading">Upload a Code</div>
					<div class="panel-body">
						<form id="codeform">
								<input type="file" name="codefile" class="filestyle" data-placeholder='No file' data-buttonText="&nbsp;Browse" >
								<button id="btnSubmit" type="submit" class="btn btn-primary center-block btn-md" style="margin-top: 3px;">
		 					 		<span class="glyphicon glyphicon-upload"></span> Upload
	   							</button>
						</form>
					</div>

				</div>
				<div id="result" class="panel panel-primary"></div>
		</div>
	</body>
</html>
