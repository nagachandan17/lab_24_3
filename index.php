<!DOCTYPE html>

<head>
	<title>PHP - Calculate Electricity Bill</title>
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
/**
 * To calculate electricity bill as per unit cost
 */
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

<body>
	<div id="page-wrap">
		<center><h1>Electricity Bill</h1></center>
		
		<table border="1" align="center">
			<tr>
				<th>0 to 50 units</th>
				<th>rs. 3.5/units</th>
			</tr> 
			
			<tr>
				<th>51 to 150 units</th>
				<th>rs. 4/units</th>
			</tr> 
			<tr>
				<th>151 to 250 units</th>
				<th>rs. 5.2/units</th>
			</tr>
			<tr>
				<th>above 251 units</th>
				<th>rs. 6.5/units</th>
			</tr>
</table>
			<br>
		<center><form action="" method="post" id="quiz-form">
            	<input type="number" name="units" id="units" placeholder="Please enter no. of Units" />
            	<input type="submit" name="unit-submit" id="unit-submit" value="Submit" /></center>
		</form>

		<div>
		    <?php echo '<br />' . $result_str; ?>
		</div>
	</div>
</body>
</html>
