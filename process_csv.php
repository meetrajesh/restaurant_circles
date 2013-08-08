<?php

$lines = file('excel_dump.csv');
unset($lines[0]);

foreach ($lines as $line) {
	$parts = preg_split('/\t/', $line, 5);
	$parts[0] = preg_replace('/\s+(TORONTO|OAKVILLE)/', '', $parts[0]);
	$parts[1] = str_replace('$', '', $parts[1]);
	$parts[3] = trim($parts[3]);
	$pairs[] = array_combine(array('name', 'sum', 'count', 'address'), $parts);
}

//var_dump($pairs);
echo json_encode($pairs) . "\n";
