<!DOCTYPE html>
<html>
    <head>

    <link rel="stylesheet" href="style.css">
    </head>
<body>



<form action="index.php" method="get">
    
<h1>Тримесечия</h1>
Задайте стойност на първото тримесечие:<input type="number" name="firstQuarter"><br>
Задайте стойност на второто тримесечие:<input type="number" name="secondQuarter"><br>
Задайте стойност на третото тримесечие:<input type="number" name="thirdQuarter"><br>
Задайте стойност на четвъртото тримесечие:<input type="number" name="forthQuarter"><br>
<input type="submit" name="submit" value="Потвърдете">

</form>
<br>


<?php 
$firstQuarter = "";
$secondQuarter = "";
$thirdQuarter = "";
$forthQuarter = "";

// Gets values from inputs
if(isset($_GET['submit'])){
if (isset($_GET['firstQuarter'])) {
    $firstQuarter = $_GET['firstQuarter'];
}
if (isset($_GET['secondQuarter'])) {
    $secondQuarter = $_GET['secondQuarter'];
}
if (isset($_GET['thirdQuarter'])) {
    $thirdQuarter = $_GET['thirdQuarter'];
}
if (isset($_GET['forthQuarter'])) {
    $forthQuarter = $_GET['forthQuarter'];

}
}


?>

<?php 
$allQuarters = array(1 => $firstQuarter,2 => $secondQuarter,3 => $thirdQuarter,4 => $forthQuarter);

$minQuarter = min($allQuarters);
$maxQuarter = max($allQuarters);

$allQuartersKeys = array_keys($allQuarters);
$arraySearchMinKey = array_search($minQuarter , $allQuarters);
$arraySearchMaxKey = array_search($maxQuarter , $allQuarters);


if(isset($_GET['submit'])){
echo "Стойности по тримесечия: ", implode(' ; ', $allQuarters), "<br/><br/>"; // Prints all values
echo "минималната стойност е = ", $minQuarter, " с индекс = ", $arraySearchMinKey, "<br/><br/>"; // Prints the minimal value and the index (key) of the value 
echo "максималната стойност е = ", $maxQuarter  , " с индекс = ", $arraySearchMaxKey, "<br/><br/>"; // Prints the maximum value and the index (key) of the value 

$sortedQuarters = sort($allQuarters); // Sorts the array with all quarters

// Get array length
$length = count($allQuarters);

// Divide length by 2
$second_half_length = $length / 2;

// Subtract 1 from $second_half_length
$first_half_length = $second_half_length - 1;

// Get index values
$first_half = $allQuarters[$first_half_length];
$second_half = $allQuarters[$second_half_length];

// Get average of these values
$median = ($first_half + $second_half) / 2;



echo "средната стойност е = ", $median, "<br/><br/>"; // Prints median



echo "След сортиране: ", implode(' ; ', $allQuarters); // sorts all values from the array with all quarters 
echo "<br/><br/>";


echo "по тримесечия: ";
// replaces all sorted values from the lines above with their keys
$allQuarters = array(1 => $firstQuarter,2 => $secondQuarter,3 => $thirdQuarter,4 => $forthQuarter);
asort($allQuarters);
$sql_val = array();
foreach ($allQuarters as $key => $value) {
    $sql_val[] = $key ;
}
$sql_val = implode(' ; ', $sql_val);
echo $sql_val;
echo "<br/>";
}
?>


<br>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="submit" name="reset" value="Изчисти">
</form>


</body>
</html>