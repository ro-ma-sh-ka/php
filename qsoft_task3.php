<?php
$cars = [
    ['name' => 'Такси 1', 'position' => rand(0, 1000), 'isFree' => (bool) rand(0, 1)],
    ['name' => 'Такси 2', 'position' => rand(0, 1000), 'isFree' => (bool) rand(0, 1)],
    ['name' => 'Такси 3', 'position' => rand(0, 1000), 'isFree' => (bool) rand(0, 1)],
    ['name' => 'Такси 4', 'position' => rand(0, 1000), 'isFree' => (bool) rand(0, 1)],
    ['name' => 'Такси 5', 'position' => rand(0, 1000), 'isFree' => (bool) rand(0, 1)],
];

$passenger = rand(0, 1000);
echo 'Passenger is here: '.$passenger.'<br>';
$positions = array_column($cars, 'position', 'name');
$who_is_free = array_column($cars, 'isFree', 'name');
$min = 1001;
$min_key = null;

foreach ($positions as $key => $value)
{
    if (abs($value - $passenger) < $min and $who_is_free[$key] == 0)
    {
        $min = $value;
        $min_key = $key;
    }
}	

foreach ($cars as $taxi)
{
	$distance = abs($taxi['position'] - $passenger);
	switch ($taxi['isFree'])
	{
	case 0:
		$free_or_not = 'свободно';
		break;
	case 1:
		$free_or_not = 'занято';
		break;
	}

	if ($taxi['name'] == $min_key)
	{
		$passenger_taxi = ' - едет это такси';
	} else $passenger_taxi = '';

	echo $taxi['name'].', стоит на '.$taxi['position'].' км, до пассажира '.$distance.' км ('.$free_or_not.')'.$passenger_taxi.'<br>';
}

?>