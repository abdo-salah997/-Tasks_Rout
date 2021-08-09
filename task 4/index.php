<!-- 1- create login form to take email and password and u should check if password bigger than 8 charts and check if email format is correct without using "email" type in html, make it with yourself. -->

<!-- <form method="POST" action="">
    <input type="text" name="email" placeholder="E-mail"><br><br>
    <input type="text" name="password" placeholder="Password"><br><br>
    <button name="send">Send</button>
</form> -->


<!-- 2- create form to take 3 input from user [first name - last name - phone number] and check if first name and last name bigger than 3 charts and number must be 11 charts. -->
<!-- <form method="POST">
    <input type="text" name="fName" placeholder="First Name"><br><br>
    <input type="text" name='lName' placeholder="Last Name"><br><br>
    <input type="number" name="phone" placeholder="Your Phone"><br><br>
    <button type="submit" name="submit">Send</button>
</form> -->
<?php

/*if (isset($_POST['send'])) {
    $email = $_POST['email'];
    $password =  $_POST['password'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        echo '<br>' . $email  . 'is a valid email address';
    }
    else{
        echo '<br>' . $email . 'is not a valid email address';
    }

    if(strlen($password)>=8){
        echo '<br>' . $password . 'is a valid password address';
    }

    else{
        echo '<br>' . $password . 'is not a valid password address';
    }

}*/

// if (isset($_POST['submit'])) {
//     $fName = $_POST['fName'];
//     $lName = $_POST['lName'];
//     $phone = $_POST['phone'];

//     if ( strlen($lName) >= 3 && strlen($phone) == 11) {
//         echo "true";
//     }
// }

?>