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
    $rates = [];
    $ranges = [];
    $minTax = [];

	// check the status
    switch ($status) {
      case 'Single':
        $rates = TAX_RATES['Single']['Rates'];
        $ranges = TAX_RATES['Single']['Ranges'];
        $minTax = TAX_RATES['Single']['MinTax'];
        break;
     case 'Married_Jointly':
        $rates = TAX_RATES['Married_Jointly']['Rates'];
        $ranges = TAX_RATES['Married_Jointly']['Ranges'];
        $minTax = TAX_RATES['Married_Jointly']['MinTax'];
        break;
     case 'Married_Separately':
        $rates = TAX_RATES['Married_Jointly']['Rates'];
        $ranges = TAX_RATES['Married_Jointly']['Ranges'];
        $minTax = TAX_RATES['Married_Jointly']['MinTax'];
        break;
     case 'Head_Household':
        $rates = TAX_RATES['Married_Jointly']['Rates'];
        $ranges = TAX_RATES['Married_Jointly']['Ranges'];
        $minTax = TAX_RATES['Married_Jointly']['MinTax'];
        break;
    default:
        break;
    }

	// check the income in the range
	foreach ($ranges as $key => $value) {
	    $nextKey = array_key_exists($key+1, $ranges) ? $ranges[$key+1] : null;
    	
    	if ($nextKey) {
    	    //echo "\n key: ". $key ." value: " . $value . " - " . $ranges[$key+1] . " > " . $taxableIncome;
    	    if ($taxableIncome > $value && $taxableIncome <= $ranges[$key+1]) {
    			 # $incTax = ($taxableIncome - 970) * 0.12 + 970;
    			 echo $incTax." = (".$taxableIncome." - ".$value.") * ".($rates[$key] / 100)." + " . $minTax[$key];
        		//echo "key: ". $key ." value: " . $value;
                
    			$incTax = (($taxableIncome - $value) * ($rates[$key] / 100)) + $minTax[$key];
		    }
    	} else {
    	    if ($taxableIncome > $value ) {
    			# $incTax = ($taxableIncome - 970) * 0.12 + 970;
        		//echo "key: ". $key ." value: " . $value;
                
    			$incTax = (($taxableIncome - $value) * ($rates[$key] / 100)) + $value;
		    }
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

            echo "Results...";

            echo TAX_RATES['Single']['Ranges'];


        }

    ?>



		<h3>2019 Tax Tables</h3>

		<?php

      // Fill in the code for Tax Tables display

      echo "Tax Tables...";

    ?>



	</div>

</body>

</html>