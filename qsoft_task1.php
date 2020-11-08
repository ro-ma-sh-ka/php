<?php
$data = [
    'question' => ['почему', 'как', 'зачем', 'столько'],
    'animals' => [
        'birds' => [
            [
                'name' => 'грачи',
            ],
            [
                'name' => 'воробьи',
            ],
        ],
        'others' => [
            [
                ['name' => 'кошки'],
                ['name' => 'рыбы'],
                ['name' => 'собаки'],
            ],
        ],
    ],
    'parts' => [
        'hands' => 'рук',
        'feathers' => 'перьев',
        'eyes' => 'глаз',
    ],
];

foreach ($data as $key => $layer)
	{
		echo $layer[0].' ';
	}

foreach ($data['animals'] as $layer)
	{
		foreach ($layer as $key => $value)
			{
				if ($value['name'] == 'грачи') echo $value['name'].' ';
			}
		
	}
foreach ($data['animals']['others'] as $layer)
{
	foreach ($layer as $key => $value)
	{
		if ($value['name'] == 'кошки') echo 'не '.$value['name'].' ';
	}
}

echo 'и зачем им столько '.$data['parts']['feathers'];

?>