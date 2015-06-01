<!DOCTYPE html>
<head>
    <title> IGNOTUS </title>
    <meta name="viewport" content=" width=device-width, initial-scale= 1.0" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/bootstrap-formhelpers.min.css" rel="stylesheet" media="screen">

    <script type="text/javascript">

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
            <h2><?php $exam = $_POST['exam'];
			echo $exam;
            ?>
            Question Paper</h2>

            <br />

            <form method="post" name="Questions" onsubmit="return confirmQuestion();" action="Questions_result.php" role="form">

                <?php

				$MCQ1 = $_POST['MCQ1'];
				$MCQ2 = $_POST['MCQ2'];
				$date = $_POST['date'];
				
				
				echo "<div class='well well-sm '><center>
					<label for='Title'> TITLE :</label>
					<input type='text' class='form-control' name='title' id='Question' placeholder='TITLE : DESCRIPTION'></center>
					<br/>
					
					</div><br/>";

				for ($i = 1; $i <= $MCQ1; $i++) {

					echo "
					<div class='well well-sm'>
					<label for='Question'>MCQ Question " . $i . " :</label>
					<input type='text' class='form-control' name='Question[" . ($i - 1) . "]' id='Question' placeholder='Question'>
					<br />
					<label for='options'>Choices :</label>
					<input type='text' class='form-control' name='options1[" . ($i - 1) . "]' id='options' placeholder='The Options Separated by commas \" , \"  and the CORRECT ANSWER should have * before it (no gaps like *Answer) ,5 choices '>
					</div>
					";

				}
				 

				for ($i = 1; $i <= $MCQ2; $i++) {
					echo "
					<div class='well well-sm'>
					<label for='MCQ2'>MCQ Question Multipe Correct " . $i . " :</label>
					<input type='text' class='form-control' name='MCQ2[" . ($i - 1) . "]' id='MCQ2' placeholder=' Question Here '>
					<br /> ";
					
					for ($j = 0; $j <= 4; $j++)
					{
						echo " <div class='row'>
	  					<div class='col-md-6 col-md-offset-2 '>
						<input type='text' class='form-control col-md-6 ' name='options2[" . ($i - 1) . "][".$j."]' id='MCQ2' placeholder=' Option ".($j+1)." '>
						</div>
						<div class='col-md-1  '> <input type='checkbox' name='check[" . ($i - 1) . "][".$j."]' value='true'></div>
						</div> "; 
						
					}
					
					echo "</div>";
					
					
					
					
				}
                ?>

                <button type="submit" class="btn btn-danger btn-lg btn-block">
                    Submit
                </button>

            </form>

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
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-formhelpers.js"></script>
</body>
</html>