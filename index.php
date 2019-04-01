<!-- Testing github with pull request for this second branch -->

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") { 

    if (isset($_POST["name"]) && !empty($_POST["name"])) { 
        $name = filter_input(\INPUT_POST, "name", \FILTER_SANITIZE_STRING);
    } else {
        exit('error');
    }

    $image_name = $_FILES['Upload']['name'];
    $imageTempPath = $_FILES["Upload"]["tmp_name"];
	$imageExtension = pathinfo($image_name, PATHINFO_EXTENSION);
    $extensions =  array('jpeg','png' ,'jpg');
	if(!in_array($imageExtension, $extensions) ) {
	    $upload_error = "Incorrect file type";
	}else{
	    $imageNewpath = "image/".$image_name; 
	    if (file_exists($imageNewpath)) { 
	    	$upload_error = "File already exists";
	    } else {
	    	$imageUploadSuccess = move_uploaded_file($imageTempPath, $imageNewpath);
	    	if($imageUploadSuccess){
	    		//insert the new path into your database here
	    		$file_success = "Yea, our image moved successfully.";
	    	}
	    }
	}

}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Uploading image to new folder</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	</head>
	<body>
		<div class="container" style="margin:auto; max-width:420px;">
			<h1>Hello, There!</h1>
	
			<?php if (isset($upload_error) && !empty($upload_error)) {
				echo "<div class=\"jumbotron\"><p>$upload_error</p></div>";
			} elseif (isset($file_success) && !empty($file_success))  {
				echo "<div class=\"jumbotron\"><p>$file_success.</p></div>";
			} 
			?>
					


		<form action="index.php" method="POST" role="form" enctype="multipart/form-data"> <!-- change index.php to your validation page -->
					
			<div class="form-group">
				<label for="">Name</label>
				<input type="text" name="name" class="form-control" id="" placeholder="Input field">
			</div>
			<div class="form-group">
				<label for="">Upload</label>
    			<input type="file" name="Upload"> 
			</div>
		
			<button type="submit" class="btn btn-primary" name="submit">Submit</button>
		</form>
		</div>		

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	</body>
</html>
<!-- Test again commit again  -->
