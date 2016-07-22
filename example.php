<html>
<head>
	<title>Example TimeSince</title>
</head>
<body>
<h1>Example TimeSince</h1>

<?php 
// include timeSince function
include($_SERVER["DOCUMENT_ROOT"] . "/timeSince/timeSince.php");

$timenow = strtotime('now');
$birthday = strtotime("5 January 1993");
$age = $timenow - $birthday;


$all = array('year','month','week','day','hour','minute','second'); 

// displays all
echo timeSince($age).'<br/>';
echo timeSince($age,$all).'<br/>';

//only the highest value
echo timeSince($age,$all,1).'<br/>';

//only the values in the array one
$ex1 = array('year','month'); 
echo timeSince($age,$ex1).'<br/>';

$ex2 = array('month','day'); 
echo timeSince($age,$ex2).'<br/>';

$ex3 = array('hour','minute','second'); 
echo timeSince($age,$ex3).'<br/>';

//only the values in the array with the highest value
$ex4 = array('day','hour','minute','second'); 
echo timeSince($age,$ex4,1).'<br/>';

?>

</body>
</html>
