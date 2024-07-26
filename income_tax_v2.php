<?php

define('TAX_RATES',
  array(
    'Single' => array(
      'Rates' => array(10,12,22,24,32,35,37),
      'Ranges' => array(0,9700,39475,84200,160725,204100,510300),
      'MinTax' => array(0, 970,4543,14382,32748,46628,153798)
      ),
    'Married_Jointly' => array(
      'Rates' => array(10,12,22,24,32,35,37),
      'Ranges' => array(0,19400,78950,168400,321450,408200,612350),
      'MinTax' => array(0, 1940,9086,28765,65497,93257,164709)
      ),
    'Married_Separately' => array(
      'Rates' => array(10,12,22,24,32,35,37),
      'Ranges' => array(0,9700,39475,84200,160725,204100,306175),
      'MinTax' => array(0, 970,4543,14382.50,32748.50,46628.50,82354.75)
      ),
    'Head_Household' => array(
      'Rates' => array(10,12,22,24,32,35,37),
      'Ranges' => array(0,13850,52850,84200,160700,204100,510300),
      'MinTax' => array(0, 1385,6065,12962,31322,45210,152380)
      )
    )
);

// Fill in the code for the following function

function incomeTax($taxableIncome, $status) {

    $incTax = 0.0;
   // get rates from constant array
   $rates = TAX_RATES[$status]['Rates'];
   // get ranges from constant array
   $ranges = TAX_RATES[$status]['Ranges'];
   // get min tax from constant array
   $minTax = TAX_RATES[$status]['MinTax'];
   
   // loop through the ranges from the highest to the lowest to find the income tax range
   for ($i = count($ranges) - 1; $i >= 0; $i--) {

		// find the income in the tax range
	   if ($taxableIncome > $ranges[$i]) {
		   echo $incTax." = (".$taxableIncome." - ".$ranges[$i].") * ".($rates[$i] / 100)." + " . $minTax[$i];
		   // calculate the income tax
		   $incTax =  (($taxableIncome - $ranges[$i]) * ($rates[$i] / 100)) + $minTax[$i];
		   break;
	   }
   }
    
    return $incTax;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>HW4 Part2 - XU</title>

	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>

<body>

	<div class="container">

		<h3>Income Tax Calculator</h3>

		<form class="form-horizontal" method="post">

			<div class="form-group">
				<label class="control-label col-sm-2">Enter Net Income:</label>
				<div class="col-sm-10">
					<input type="number" step="any" name="netIncome" placeholder="Taxable  Income" required autofocus>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>

		</form>

		<?php

        // Fill in the rest of the PHP code for form submission results

        if(isset($_POST['netIncome'])) {

             // get income from input
			 $inputIncome = $_POST['netIncome'];
			 echo "<p>With a net taxable income of $". number_format($inputIncome,2) ."</p>";
			 // calculate the income
			 $resultSingle = number_format(incomeTax($inputIncome, 'Single'),2);
			 $resultMarriedJ = number_format(incomeTax($inputIncome, 'Married_Jointly'),2);
			 $resultMarriedS = number_format(incomeTax($inputIncome, 'Married_Separately'),2);
			 $resultHead= number_format(incomeTax($inputIncome, 'Head_Household'),2);
 
			 // create html table for results
			 echo "<table class='table table-striped'>";
			 echo    "<thead> <tr> <th>Status</th> <th>Tax</th> </tr> </thead><tbody>";
			 echo    "<tr> <td>Single</td> <td>$".$resultSingle."</td> </tr>";
			 echo    "<tr> <td>Married Failling Jointly</td> <td>$".$resultMarriedJ."</td> </tr>";
			 echo    "<tr> <td>Married Filling Separately</td> <td>$".$resultMarriedS."</td> </tr>";
			 echo    "<tr> <td>Head of Household</td> <td>$".$resultHead."</td> </tr>";
			 echo "</tbody></table>";

        }

    ?>



		<h3>2019 Tax Tables</h3>

		<?php

    	// Fill in the code for Tax Tables display

    	echo "Tax Tables...";

	  
		foreach (TAX_RATES as $key => $value) {
			echo "\n\n Key: ". $key ." Value Length: " . count($value);
			 // create html table for results
			echo "<h4>".$key."</h4>";
			echo "<table class='table table-striped'>";
			echo    "<thead> <tr> <th>Texable Income</th> <th>Tax Rate</th> </tr> </thead><tbody>";
			foreach ($value as $subKey => $subVal) {
				// echo "\n SubKey: ". $subKey ." SubValue Length: " . count($subVal);
					
				if ($subKey == 'Ranges') {
					$nextKey = array_key_exists($key+1, $ranges) ? $ranges[$key+1] : null;
					
					if ($nextKey) {
						if ($key == 0) {
							echo    "<tr> <td>".$ranges[$key]." - ".$ranges[$key+1]."</td> <td>".$rates[$key]."%</td> </tr>";
						} else {
							echo    "<tr> <td>".$ranges[$key]. " - ".$ranges[$key+1]."</td> <td>$".$minTax[$key]." plus ".$rates[$key]."% of the amount over $".$ranges[$key]."</td> </tr>";
						}
					} else {
						echo    "<tr> <td>".$ranges[$key]. " or more </td> <td>$".$minTax[$key]." plus ".$rates[$key]."% of the amount over $".$ranges[$key]."</td> </tr>";
					}
					
					// foreach ($subVal as $subKey2 =>$subVal2) {
					// 	echo "\n val: " . $subVal[$subKey2];
					// }
				}
			}
			
		}
	

    ?>



	</div>

</body>

</html>