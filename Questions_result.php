<!DOCTYPE html>
<head>
    <title> IGNOTUS </title>
    <meta name="viewport" content=" width=device-width, initial-scale= 1.0" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/bootstrap-formhelpers.min.css" rel="stylesheet" media="screen">

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

            <?php

			//Vakues are extracted from the previous form 
			$Question = $_POST['Question'];
			$options1 = $_POST['options1'];
			$options2 = $_POST['options2'];
			$check = $_POST['check'];
			$MCQ2 =  $_POST['MCQ2'];
			$title = explode(":", $_POST['title']);

			

			$file = 'I:/Qs.mct';
			$handle = fopen($file, 'w') or die('Cannot open file:  ' . $file);

			
			//Extracting each element of the 2D array for MCQs
			$var = '{"title": "'.$title[0].'","description": "'.$title[1].'", "questions": [';  
			fwrite($handle, $var);
			
			//_________________________________________ MCQ with Single Correct Answer___________________________________________________________________________________
			
			for ($i = 0; $i < sizeof($Question); $i++) {

				$k = array();

				$var = ' {"title":"", "text":"' . $Question[$i] . '",';
				fwrite($handle, $var);
				
				$var = '"options":[';
				fwrite($handle, $var);

				
				
				$answer = explode(",", $options1[$i]);
				
				
				
				for ($j = 0; $j < sizeof($answer); $j++) {
						
					$var1="";
					
					
					if($answer[$j][0]=="*" && $j!= (sizeof($answer)-1 ))
						{ $k[]="true"; $var1= '"'.substr($answer[$j],1, strlen($answer[$j])-1).'",'; echo "True ".$var1; fwrite($handle, $var1); }
					
					else if ($answer[$j][0]!="*" && $j!= (sizeof($answer)-1))
						{ $k[]="false"; $var1='"'.$answer[$j].'",'; echo "False ".$var1 ; fwrite($handle, $var1);  }
					
					else if ($answer[$j][0]=="*" && $j == (sizeof($answer)-1))
						{ $k[]="true"; $var1= '"'.substr($answer[$j],1, strlen($answer[$j])-1).'"'; echo "True ".$var1;  fwrite($handle, $var1); }
					
					else {
						$k[]="false"; $var1= '"'.$answer[$j].'"'; echo "False ".$var1; fwrite($handle, $var1);
					}
					
					
					
					echo "<br/>";

				}

				
				$var = '],"rightAnswers" : [ ';
				fwrite($handle, $var);
				
				for ($j=0; $j < sizeof($k)-1 ; $j++) { 
					$var = $k[$j].",";
					fwrite($handle, $var);
				}
				
				$var = $k[sizeof($k)-1].'],"hint":"" },';
				fwrite($handle, $var);
				
				unset($k);

			}
			
			
			// **********************************************************MCQ Single Correct *******************************************************************************
			
			
			//_________________________________________ MCQ with Multiple Correct Answers___________________________________________________________________________________
			
							
			
			 for ($i = 0; $i < sizeof($MCQ2); $i++) {
			 		
			 	$k=array();
			 	
 				$var = ' {"title":"", "text": "'.$MCQ2[$i].'",';						 
				 fwrite($handle, $var);
				$var = '  "options": [ ';						 
				 fwrite($handle, $var);
			 
			 for ($j = 0; $j < sizeof($options2[$i]); $j++) {
			 	
				echo $options2[$i][$j];
				
				if($j != sizeof($options2[$i])-1)
				$var = '"'.$options2[$i][$j].'",';
				else
			 	$var = '"'.$options2[$i][$j].'"],';
				
				fwrite($handle, $var);
				
			 }	 
 			
				$var = ' "rightAnswers": [ ';						 
				 fwrite($handle, $var);
				 $x=0;
				 
				 
				 for ($j=0; $j < 5; $j++) {
				 	
					
					
					if(isset($check[$i][$j]))
					{	
						$var = ($j != 4 )? 'true,' : 'true' ;	echo $var;					
						fwrite($handle, $var);
					}
					else{
						$var = ($j != 4) ? 'false,' : 'false' ;	echo $var;					
						fwrite($handle, $var);
					}				 	 
					 
				 }
				 
				 
				 if($i != sizeof($MCQ2[$i])-1)
						 $var = '],"hint":"" },';	
				 else
				 	{
				 		 $var = '],"hint":"" }';
				 	}					 
				 fwrite($handle, $var);
				 
			
			 }
			
			
			$var = '] }';
			fwrite($handle, $var);
			
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
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-formhelpers.js"></script>
</body>
</html>