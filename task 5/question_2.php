<!-- 2-create function to convert each even number to odd number. -->
<form method="POST" action="">
    <input type="text" name="changeNum" placeholder="search...">
    <button name="send">search</button>
</form>

<?php
if(isset($_POST['send'])){
    $number = $_POST['changeNum'];
    }
function evenFun($number){
    if($number %2 ==0){
        return $number+1;
    }
    return $number;
}
echo evenFun($number);
?>