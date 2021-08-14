<?php

class student{

    private $subjects; 
    public $subSucsess = [];
    public $subFiled = [];

    public function __construct($sub1,$sub2,$sub3,$sub4,$sub5)
    {
        $this->subjects = [$sub1,$sub2,$sub3,$sub4,$sub5];
    }

    public function dgrees(){
       
        return $this->subjects;
    }


}

if(isset($_POST['submit'])){

    $arabic = $_POST['arabic'];
    $english = $_POST['english'];
    $mathe = $_POST['mathe'];
    $chemistry = $_POST['chemistry'];
    $physics = $_POST['physics'];

    $stdDgree = new student($arabic,$english,$mathe,$chemistry,$physics);
    $degStd =  $stdDgree -> dgrees();

}
?>
<table>
<tr>
    <th>subject</th>
    <th>status</th>
</tr>
<?php
$valuation = 'Sucsess';
foreach($degStd as $degree){
    if($degree < 50){
        $valuation = 'Filed';
    }
    ?>
    <tr>

    <td><?php echo $degree ?></td>
    <td><?php echo $valuation?></td>

    </tr>
<?php
}
?>
</table>

<style>
    th,
    td,
    table {
        border: solid 2px #000; 
        padding: 2px;
    }
</style>