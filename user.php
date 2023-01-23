<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1">
		<title>Login</title>
       
		<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"  type="text/css">
        <script  type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
	</head>
	<body>
	<?php
	require("config.php");
	if(!empty($_GET['lang']))
	{
		$lang=$_GET['lang'];
		if($lang == "en"){ $check = "select lang_id,english from languages order by id desc"; $langnm="english"; }
		if($lang == "hi"){ $check = "select lang_id,hindi from languages";$langnm="hindi"; }
		if($lang == "te"){ $check = "select lang_id,telugu from languages";$langnm="telugu"; }	
	} 
	else
	{
	$check = "select lang_id,english from languages"; $langnm="english";
	}
	$datas = mysqli_query($conn, $check); ?>
	 <div class="container mt-4">
    <!-- Create the drop down filter -->
    <div class="category-filter">
		<label for="language">Select Language</label>
			<select  class="form-select form-select-lg mb-3" name="lang" id="select_lang">
				<option value="">Select</option>
				<option value="user.php?lang=en">English </option>
				<option value="user.php?lang=hi">Hindi</option>
				<option value="user.php?lang=te">Telugu</option>
			</select>
	</div>
								
		<table id="example" class="display" style="width:100%">
			<thead>
				<tr>
					<th>Language ID</th>
					<th>Words in <?php echo $langnm;?></th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach ($datas as $words) { ?>
				<tr>
					 <td><?php echo $words["lang_id"];?></td>
					<td><?php echo $words[$langnm];?></td>
				   
				</tr>
			   <?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<th>Language ID</th>
					<th>Words in English</th>
				</tr>
			</tfoot>
		</table>
</div>
	
	<script type="text/javascript">
    $(document).ready(function () {
		$('#example').DataTable();
	});
	</script>
	<script>
    $(function(){
      
      $('#select_lang').on('change', function () {
          var url = $(this).val(); 
          if (url) { 
              window.location = url;
          }
          return false;
      });
    });
	</script>
   </body>
</html>