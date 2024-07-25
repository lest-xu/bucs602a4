<?php

// Fill in the code for the following four functions

// Single
function incomeTaxSingle($taxableIncome) {
    $incTax = 0.0;

    if ($taxableIncome > 0 && $taxableIncome <= 9700) {
        # 10% of income
        $incTax = $taxableIncome * 0.1;
    } else if ($taxableIncome > 9700 && $taxableIncome <= 39475) {
        # 12% of income + 970
        $incTax = $taxableIncome * 0.12 + 970;
    } else if ($taxableIncome > 39475 && $taxableIncome <= 84200) {
        # 22% of income + 4543
        $incTax = $taxableIncome * 0.22 + 4543;
    } else if ($taxableIncome > 84200 && $taxableIncome <= 160725) {
        # 24% of income + 14382
        $incTax = $taxableIncome * 0.24 + 14382;
    } else if ($taxableIncome > 160725 && $taxableIncome <= 204100) {
        # 32% of income + 32748
        $incTax = $taxableIncome * 0.32 + 32748;
    } else if ($taxableIncome > 204100 && $taxableIncome <= 510300) {
        # 35% of income + 46628
        $incTax = $taxableIncome * 0.35 + 46628;
    }  else if ($taxableIncome > 510300) {
        # 37% of income + 46628
        $incTax = $taxableIncome * 0.37 + 153798;
    } 

    return $incTax;
}

// Married Failling Jointly or Qualifying Widow (Windower)
function incomeTaxMarriedJointly($taxableIncome) {
    $incTax = 0.0;
    
    if ($taxableIncome > 0 && $taxableIncome <= 19400) {
        # 10% of income
        $incTax = $taxableIncome * 0.1;
    } else if ($taxableIncome > 19400 && $taxableIncome <= 78950) {
        # 12% of income + 1940
        $incTax = $taxableIncome * 0.12 + 1940;
    } else if ($taxableIncome > 78950 && $taxableIncome <= 168400) {
        # 22% of income + 9086
        $incTax = $taxableIncome * 0.22 + 9086;
    } else if ($taxableIncome > 168400 && $taxableIncome <= 321450) {
        # 24% of income + 28765
        $incTax = $taxableIncome * 0.24 + 28765;
    } else if ($taxableIncome > 321450 && $taxableIncome <= 408200) {
        # 32% of income + 65497
        $incTax = $taxableIncome * 0.32 + 65497;
    } else if ($taxableIncome > 408200 && $taxableIncome <= 612350) {
        # 35% of income + 93257
        $incTax = $taxableIncome * 0.35 + 93257;
    }  else if ($taxableIncome > 612350) {
        # 37% of income + 164709
        $incTax = $taxableIncome * 0.37 + 164709;
    } 
    
    return $incTax;

}

// Married Filling Separately
function incomeTaxMarriedSeparately($taxableIncome) {
    $incTax = 0.0;
    
    if ($taxableIncome > 0 && $taxableIncome <= 9700) {
        # 10% of income
        $incTax = $taxableIncome * 0.1;
    } else if ($taxableIncome > 9700 && $taxableIncome <= 39475) {
        # 12% of income + 970
        $incTax = $taxableIncome * 0.12 + 970;
    } else if ($taxableIncome > 39475 && $taxableIncome <= 84200) {
        # 22% of income + 4543
        $incTax = $taxableIncome * 0.22 + 4543;
    } else if ($taxableIncome > 84200 && $taxableIncome <= 160725) {
        # 24% of income + 14382.5
        $incTax = $taxableIncome * 0.24 + 14382.5;
    } else if ($taxableIncome > 160725 && $taxableIncome <= 204100) {
        # 32% of income + 32748.5
        $incTax = $taxableIncome * 0.32 + 32748.5;
    } else if ($taxableIncome > 204100 && $taxableIncome <= 306175) {
        # 35% of income + 46628.5
        $incTax = $taxableIncome * 0.35 + 46628.5;
    }  else if ($taxableIncome > 306175) {
        # 37% of income + 82354.75
        $incTax = $taxableIncome * 0.37 + 82354.75;
    } 
    
    return $incTax;

}

// Head of Household
function incomeTaxHeadOfHousehold($taxableIncome) {
    $incTax = 0.0;
    
    if ($taxableIncome > 0 && $taxableIncome <= 13850) {
        # 10% of income
        $incTax = $taxableIncome * 0.1;
    } else if ($taxableIncome > 13850 && $taxableIncome <= 52850) {
        # 12% of income + 1385
        $incTax = $taxableIncome * 0.12 + 1385;
    } else if ($taxableIncome > 52850 && $taxableIncome <= 84200) {
        # 22% of income + 6065
        $incTax = $taxableIncome * 0.22 + 6065;
    } else if ($taxableIncome > 84200 && $taxableIncome <= 160700) {
        # 24% of income + 12962
        $incTax = $taxableIncome * 0.24 + 12962;
    } else if ($taxableIncome > 160700 && $taxableIncome <= 204100) {
        # 32% of income + 31322
        $incTax = $taxableIncome * 0.32 + 31322;
    } else if ($taxableIncome > 204100 && $taxableIncome <= 510300) {
        # 35% of income + 45210
        $incTax = $taxableIncome * 0.35 + 45210;
    }  else if ($taxableIncome > 510300) {
        # 37% of income + 152380
        $incTax = $taxableIncome * 0.37 + 152380;
    } 

    return $incTax;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HW4 Part1 - XU</title>

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

            // get income from input
            $inputIncome = number_format($_POST['netIncome'],2);
            echo "<p>With a net taxable income of".$inputIncome
            // calculate the income
            $resultSingle = incomeTaxSingle($inputIncome);
            $resultSingle = number_format($resultSingle,2);
            $resultMarriedJ = number_format(incomeTaxMarriedJointly($inputIncome),2);
            $resultMarriedS = number_format(incomeTaxMarriedSeparately($inputIncome),2);
            $resultHead= number_format(incomeTaxHeadOfHousehold($inputIncome),2);

            // create html table for results
            echo "<table class='table table-striped'>"
            echo    "<thead> <tr> <th>Status</th> <th>Tax</th> </tr> </thead>"
            echo    "<tbody> <tr> <td>Single</td> <td>".$resultSingle."</td> </tr> </tbody>"
            echo    "<tbody> <tr> <td>Married Failling Jointly</td> <td>".$resultMarriedJ."</td> </tr> </tbody>"
            echo    "<tbody> <tr> <td>Married Filling Separately</td> <td>".$resultMarriedS."</td> </tr> </tbody>"
            echo    "<tbody> <tr> <td>Head of Household</td> <td>".$resultHead."</td> </tr> </tbody>"
            echo "</table>"

        }

    ?>

</div>

</body>
</html>