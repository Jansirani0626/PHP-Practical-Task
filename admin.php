<!DOCTYPE html>
<html>
	<title>Admin</title>
	<head>
	 <meta http-equiv="Content-Type" content="text/html"  charset="UTF-8" />
	
   
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
				<link rel="stylesheet" href="css/admin.css">
	</head>
	<body>
					<form action="" method="post" enctype="multipart/form-data">
						<h1>Admin</h1>
						
						<div class="formcontainer">
							<div class="container">
							
								<?php include("upload.php");?>
								<label for="language">Select Language</label>
								<select name="lang" >
								    <option value="">Select</option>
									<option value="english">English </option>
									<option value="hindi">Hindi</option>
									<option value="telugu">Telugu</option>
								</select>
								<label for="pwd">Upload Excel file</label>
								<input type="file" name="filename" id="fileToUpload">
							</div>
								<button type="submit" name="submit_form">
									<strong>Upload</strong>
								</button>
						</div>
					</form>
	</body>
</html>