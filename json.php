<?php

require_once 'vendor/autoload.php';
include_once 'functions/googleSheets.php';


$json_array = [
    'options' => getGoogleSheetsData('1sd277Vpeed1ljpqrZV2issFAo3_qKiw-Kn1WRY-VwG8', 'options!A:B', 'left'),
    'translations' => getGoogleSheetsData('1sd277Vpeed1ljpqrZV2issFAo3_qKiw-Kn1WRY-VwG8', 'translations!A:B', 'left'),
    'index_step' => getGoogleSheetsData('1sd277Vpeed1ljpqrZV2issFAo3_qKiw-Kn1WRY-VwG8', 'index_step!A:D', 'top'),
    'rooms_step' => getGoogleSheetsData('1sd277Vpeed1ljpqrZV2issFAo3_qKiw-Kn1WRY-VwG8', 'rooms_step!A:E', 'top'),
    'flooring_step' => getGoogleSheetsData('1sd277Vpeed1ljpqrZV2issFAo3_qKiw-Kn1WRY-VwG8', 'flooring_step!A:J', 'top'),
    'wallcovering_step' => getGoogleSheetsData('1sd277Vpeed1ljpqrZV2issFAo3_qKiw-Kn1WRY-VwG8', 'wallcovering_step!A:J', 'top'),
    'interiorpainting_step' => getGoogleSheetsData('1sd277Vpeed1ljpqrZV2issFAo3_qKiw-Kn1WRY-VwG8', 'interiorpainting_step!A:M', 'top'),
    'completerenovation_step' => getGoogleSheetsData('1sd277Vpeed1ljpqrZV2issFAo3_qKiw-Kn1WRY-VwG8', 'completerenovation_step!A:N', 'top'),
    'kitchen_step' => getGoogleSheetsData('1sd277Vpeed1ljpqrZV2issFAo3_qKiw-Kn1WRY-VwG8', 'kitchen_step!A:I', 'top'),
    'electricity_step' => getGoogleSheetsData('1sd277Vpeed1ljpqrZV2issFAo3_qKiw-Kn1WRY-VwG8', 'electricity_step!A:I', 'top'),
    'plumbing_step' => getGoogleSheetsData('1sd277Vpeed1ljpqrZV2issFAo3_qKiw-Kn1WRY-VwG8', 'plumbing_step!A:I', 'top'),
    'insulation_step' => getGoogleSheetsData('1sd277Vpeed1ljpqrZV2issFAo3_qKiw-Kn1WRY-VwG8', 'insulation_step!A:I', 'top'),
    'carpentry_step' => getGoogleSheetsData('1sd277Vpeed1ljpqrZV2issFAo3_qKiw-Kn1WRY-VwG8', 'carpentry_step!A:I', 'top'),
    'disaster_step' => getGoogleSheetsData('1sd277Vpeed1ljpqrZV2issFAo3_qKiw-Kn1WRY-VwG8', 'disaster_step!A:H', 'top'),
];

$json = json_encode($json_array);

if (file_put_contents("data.json", $json))
    echo "JSON file created successfully...";
else 
    echo "Oops! Error creating json file...";
