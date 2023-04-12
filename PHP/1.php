<?php
echo"Considering a vehicle can be uniquely identified by one of the following three combinations:";
echo"<br>";
echo" a) Registration number (reg_num).";
echo"<br>";
echo "b) Engine number (engine_num) and Chassis Number (chassis_num) combination";
echo"<br>";
echo "c) Vin number (vin_num)";
echo"<br>";
echo "Write a function in core PHP which will take these four identifiers of a vehicle as input <br>
and return the id of the vehicle it matches based on any one of the above three criterias <br>
(return the id on first matching criteria, no need to check further) or return false <br>
otherwise.";

echo"<hr>";

function vehicleIdentifying($reg_num,$engine_num,$vin_num,$dataArray){
    $keys = array();
    $keys2 = array();
    foreach ($dataArray as $key => $cur_value) {
        if ($cur_value['reg_num'] == $reg_num) {
            if (isset($cur_value['engine_num']) && isset($engine_num)) {
                if ($cur_value['engine_num'] == $engine_num) {
                    $keys[] = $cur_value['id'];
                }else if ($cur_value['chassis_num'] == $engine_num) {
                    $keys[] = $cur_value['id'];
                }

            }

            if (isset($cur_value['vin_num']) && isset($vin_num)) {
                if ($cur_value['vin_num'] == $vin_num) {
                    $keys2[] = $cur_value['id'];
                }
            } else {
                $keys2[] = $cur_value['id'];
            }
        }
    }
    $keys = !empty($keys2) ? array_unique(array_merge($keys,$keys2)) : $keys;
    return $keys;
}

$vachileArray = [
    [
        'id' => 1,
        'reg_num' => 'reg_num_1',
        'engine_num' => 'engine_num_1',
        'chassis_num' => 'chassis_num_1',
        'vin_num' => 'vin_num_1'
    ],
    [
        'id' => 2,
        'reg_num' => 'reg_num_2',
        'engine_num' => 'engine_num_2',
        'chassis_num' => 'chassis_num_2',
        'vin_num' => 'vin_num_2'
    ],
    [
        'id' => 3,
        'reg_num' => 'reg_num_3',
        'engine_num' => 'engine_num_3',
        'chassis_num' => 'chassis_num_3',
        'vin_num' => 'vin_num_3'
    ],
];

$keys = vehicleIdentifying('reg_num_2','chassis_num_2','vin_num_2',$vachileArray);
echo"<strong>Output</strong> <br>";
print_r($keys);