<!-- create form to get 5 subject degree to calculate student result, so u will check if subject degree bigger than or equal 50 u will push it in new array, and if subject degree less than 50 u will push it in different array and show result table.
ex: subject_1 = 30, subject_2 = 50, subject_3=90, subject_4 =10, subject_5= 100.
successful_subjects = [50,90,100].
fails_subjects = [30,10].
------------------------
subjects result | status 
------------------------
50                        | successful
90                       | successful
100                     | successful
30                     | failed
10                    | failed
Kindly use functions   -->

<form method="POST">

    <input type="number" name="arabic" placeholder="Arabic  Degree"><br><br>
    <input type="number" name="english" placeholder="English Degree"><br><br>
    <input type="number" name="mathe" placeholder="Mathe Degree"><br><br>
    <input type="number" name="chemistry" placeholder="Chemistry Degree"><br><br>
    <input type="number" name="physics" placeholder="Physics Degree"><br><br>

    <button name="sendDegree">Degree</button>
</form>

<?php
function estimate($array)
{
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] >= 50) {
            echo $array[$i] . "   " . "| successful" . '<br>';
        } else {
            echo $array[$i] . "   " . "| failed" . '<br>';
        }
    }
}

if (isset($_POST['sendDegree'])) {
    $arabic = $_POST['arabic'];
    $english = $_POST['english'];
    $mathe = $_POST['mathe'];
    $chemistry = $_POST['chemistry'];
    $physics = $_POST['physics'];

    $array = [$arabic, $english, $mathe, $chemistry, $physics];
    estimate($array);
}
?>