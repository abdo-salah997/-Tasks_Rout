<?php
// 1- Write program to get minimum number of giv n numbers, ex:1,2,3,4 minimum is 1, using if condition.

$num_1 = 4;
$num_2=3;
$num_3=2;
$num_4=1;

if($num_1<$num_2&&$num_1<$num_3&&$num_1<$num_4){
    echo "This Number one ="." ".$num_1;
}
elseif($num_2<$num_1&&$num_2<$num_3&&$num_2<$num_4){
    echo "This Number tow ="." ".$num_2;

}
elseif($num_3<$num_1&&$num_3<$num_2&&$num_3<$num_4){
    echo "This Number three = "." ".$num_3;

}
else{
    echo "This Number four ="." ".$num_4;

}

// 2-Write program to get middle number of given 3 numbers, ex: 2,8,6 the middle number will be 6.
echo "<br>";


$num_5 = 2;
$num_6 = 4;
$num_7 = 6;

if($num_5 > $num_6&&$num_5 < $num_7 || $num_5 < $num_6&&$num_5 > $num_7 ){
    echo "This Number five ="." ".$num_5;

}
elseif($num_6 > $num_5&&$num_6 < $num_7 || $num_6 < $num_5&&$num_6 > $num_7 ){
    echo "This Number six ="." ".$num_6;

}
else{
    echo "This Number seven ="." ".$num_7;

}
// 3-Write program to calculate 4 numbers and check if the sum of the 4 number bigger than 100 or not, if bigger than 100 echo "valid" if not echo "not valid"
echo"<br>";

$num_8 = 10;
$num_9 =20;
$num_10=30;
$num_11=40;

$num_12= $num_8 + $num_9 + $num_10 + $num_11;

if($num_12 > 100){
    echo "the Number is = Valid";
}
else{
    echo "the Number is = InValid";
}
?>
