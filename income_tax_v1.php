<?php

// Fill in the code for the following four functions


function incomeTaxSingle($taxableIncome) {
    $incTax = 0.0;
    if ($taxableIncome > 0 && $taxableIncome <= 9700) {
        # 10% of income
        return $incTax = $taxableIncome * 0.1;
    } else if ($taxableIncome > 9700 && $taxableIncome <= 39475) {
        # 12% of income + 970
        return $incTax = $taxableIncome * 0.12 + 970;
    } else if ($taxableIncome > 39475 && $taxableIncome <= 84200) {
        # 22% of income + 4543
        return $incTax = $taxableIncome * 0.22 + 4543;
    } else if ($taxableIncome > 84200 && $taxableIncome <= 160725) {
        # 24% of income + 14382
        return $incTax = $taxableIncome * 0.24 + 14382;
    } else if ($taxableIncome > 160725 && $taxableIncome <= 204100) {
        # 32% of income + 32748
        return $incTax = $taxableIncome * 0.32 + 32748;
    } else if ($taxableIncome > 204100 && $taxableIncome <= 510300) {
        # 35% of income + 46628
        return $incTax = $taxableIncome * 0.35 + 46628;
    }  else if ($taxableIncome > 510300) {
        # 37% of income + 46628
        return $incTax = $taxableIncome * 0.37 + 153798;
    } 

    return $incTax;
}

function incomeTaxMarriedJointly($taxableIncome) {
    $incTax = 0.0;

    
    return $incTax;

}

function incomeTaxMarriedSeparately($taxableIncome) {
    $incTax = 0.0;

    
    return $incTax;

}

function incomeTaxHeadOfHousehold($taxableIncome) {
    $incTax = 0.0;

    
    return $incTax;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HW4 Part1 - LastName</title>

  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

    <h3>Income Tax Calculator</h3>

    <form class="form-horizontal" method="post">

        
        <div class="form-group">
            <label class="control-label col-sm-2" for="netIncome">Your Net Income:</label>
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



        }

    ?>

</div>

</body>
</html>