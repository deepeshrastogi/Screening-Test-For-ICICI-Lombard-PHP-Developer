<?php
/*
2) $input_arr = ['apple', 'banana', 'custard', 'denmark', 'banana', 'apple', 'banana', 'denmark',
'apple'];
a. Find the unique elements in the above array and print it one by one.
b. Create an array with the unique elements as key and its corresponding value should be
the number of times repeated in the above array
Expected Output Array : ['apple' => 3, 'banana' => 2, 'custard' => 1 , 'denmark' => 1];

*/
echo "2) input_arr = ['apple', 'banana', 'custard', 'denmark', 'banana', 'apple', 'banana', 'denmark',
'apple'];";
echo " <hr>";
echo "<strong>a. Find the unique elements in the above array and print it one by one.</strong>";
echo " <br> <br>";
$input_arr = ['apple', 'banana', 'custard', 'denmark', 'banana', 'apple', 'banana', 'denmark','apple'];
$output_arr = [];
for($i=0; $i < count($input_arr); $i++){
    if(!in_array($input_arr[$i],$output_arr)){
        $output_arr[] = $input_arr[$i];
    }
}
echo"<strong>Output</strong><br>";
print_r(($output_arr));


echo " <hr>";
echo "<strong>b. Create an array with the unique elements as key and its corresponding value should be <br>
the number of times repeated in the above array </strong> <br>
Expected Output Array : ['apple' => 3, 'banana' => 3, 'custard' => 1 , 'denmark' => 2];";
echo " <br> <br>";
$input_arr = ['apple', 'banana', 'custard', 'denmark', 'banana', 'apple', 'banana', 'denmark','apple'];
$output_arr = [];
foreach($input_arr as $inp_arr) {
    foreach($output_arr as $k => $output) {
        if(strtolower($k) == strtolower($inp_arr)) {
            $output_arr[$k]++;
            continue 2;
        }
    }
    $output_arr[$inp_arr] = 1;
}
echo"<strong>Output</strong><br>";
print_r($output_arr);