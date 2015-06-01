<!DOCTYPE html>
<head>
    <title> IGNOTUS </title>
    <meta name="viewport" content=" width=device-width, initial-scale= 1.0" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

</head>
<body>

    <div class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-brand">
                IGNOTUS
            </div>
        </div>

    </div>

    <div class="container">
        <div class="jumbotron">
            <center>
                <h3> FILE Sharing </h3>
            </center>

            <?php
			$target_path = "I:/";

			$target_path = $target_path . basename($_FILES['file']['name']);

			if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
				echo "The file " . basename($_FILES['file']['name']) . " has been uploaded";
			} else {
				echo "There was an error uploading the file, please try again!";
			}
            ?>
        </div>

    </div>

    <div class="navbar navbar-default navbar-fixed-bottom">
        <div class="container">
            <p class="navbar-text pull-right">
                Jyotish Avinash Rajesh
            </p>
        </div>

    </div>
    <script src="jquery-2.1.3.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>