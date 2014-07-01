<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP</title>
</head>

<body>

<?php

// Comentário
# Comentário também
/*
Comentário com mais de uma linha
*/

$variavel1 = 'string';
$variavel2 = 10.0;
$variavel3 = true;
$variavel4 = false;

echo "text $variavel1";
echo '<br>';
$a = 4;
$b = 6;
echo $a + $b;
echo '<br>';
print("$a");
echo '<br>';

$n1 = 1;
$n2 = 2;

echo "$n1 = $n2? " . ($n1 == $n2 ? 'SIM' : 'NÃO') . "<br>";

if ($n1 > $n2) {
	echo 'É maior';
} else if ($n1 == $n2) {
	echo 'É igual';
} else {
	echo 'É menor';
}
echo '<br>';

$array = ['a', 'b', 1, 2, 3, true];

echo count($array);

echo '<ul>';
$i = 0;

echo $i;
for ($i = 0; $i < count($array); ++$i) {
	echo '<li>' . $array[$i] . '</li>';
	if ($array[$i] == 1) {
		
		break;
		#die("É um");
	}
}
echo $i;
echo '</ul>';

switch ($a) {
	case 40:
		echo 'É quatro';
		break;
	case 2:
		echo 'É 2';
		break;
	default:
		echo 'É outro';
		break;
}

echo date('d/m/Y');


?>

</body>

</html>

