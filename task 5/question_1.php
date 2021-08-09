<!-- 1- create function to search number in array ex: numbers = [1,2,3,4,5,6,7,8,9] try to search with 4 return yes if is existing. --> 

<form method="POST" action="">
    <input type="text" name="search" placeholder="search...">
    <button name="send">search</button>
</form>

<?php


$array = [1,2,4,5,6,7,20,23];
if(isset($_POST['send'])){
$number = $_POST['search'];
}

function search($array,$number){
    for($i=0;$i<count($array);$i++){
        if($array[$i]==$number){
            return "true";
        }
    }
    return "false";
}
echo search($array,$number);


?>