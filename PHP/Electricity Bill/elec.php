<head>
	<title> Electricity Bill</title>
    <style>
        #page-wrap{
            align:center;
        }
    </style>
</head>

<?php
$result_str = $result = '';
if (isset($_POST['unit-submit'])) {
    $units = $_POST['units'];
    if (!empty($units)) {
        $result = calculate_bill($units);
        $result_str = 'Total amount of ' . $units . ' - ' . $result;
    }
}

function calculate_bill($units) {
    $unit_cost_first = 3.50;
    $unit_cost_second = 4.00;
    $unit_cost_third = 5.20;
    $unit_cost_fourth = 6.50;

    if($units <= 50) {
        $bill = $units * $unit_cost_first;
    }
    else if($units > 50 && $units <= 100) {
        $temp = 50 * $unit_cost_first;
        $remaining_units = $units - 50;
        $bill = $temp + ($remaining_units * $unit_cost_second);
    }
    else if($units > 100 && $units <= 200) {
        $temp = (50 * 3.5) + (100 * $unit_cost_second);
        $remaining_units = $units - 150;
        $bill = $temp + ($remaining_units * $unit_cost_third);
    }
    else {
        $temp = (50 * 3.5) + (100 * $unit_cost_second) + (100 * $unit_cost_third);
        $remaining_units = $units - 250;
        $bill = $temp + ($remaining_units * $unit_cost_fourth);
    }
    return number_format((float)$bill, 2, '.', '');
}

?>

<body bgcolor="grey">
	<div id="page-wrap">
		<h1 align="center">Electricity Bill Calculator</h1>
        <h3>Calculated based on the following way : </h3>
        <p>If no:of units is <b>less than 50.</b> Units * 3.50</p>
        <p>If no:of units is <b>greater than 50 & less than or equal to 100.</b>From total units calculate value for 50 units. 50 Units * 3.50. Remaining units is calculated reducing 50 from it. then calculate the number of units by multiplying it with 4</p>
        <p>If no:of units is <b>greater than 100 & less than or equal to 200.</b>From total units calculate value for 50 units.[50 Units * 3.50].From rest calculate value for 100 units. [100 * 4] Remaining units is calculated by reducing (50 + 100) 150 from it. then calculate the number of units by multiplying it with 5.20. Add all 3 values together!</p>
        <p>If no:of units is <b>greater than 200.</b> 
           From total units calculate value for 50 units.[50 Units * 3.50].
           From rest calculate value for 200 units. [100 * 4 + 100 * 4]
           Remaining units is calculated by reducing (50 + 200) 250 from it. 
           Then calculate the number of units by multiplying it with 6.20. 
           Add all three values together.</p>
		<form action="" method="post" id="quiz-form" align="center">
            	<input type="number" name="units" id="units" placeholder="Please enter no. of Units" />
            	<input type="submit" name="unit-submit" id="unit-submit" value="Submit" />
		</form>

		<div align="center">
		    <?php echo '<br />' . $result_str; ?>
		</div>
	</div>
</body>
</html>