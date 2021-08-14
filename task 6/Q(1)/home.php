<?php

// 1- create a Login Form with inputs [email - password] and check if email and password exists in static data in an array, using class and function.

class signIn
{

    private $Data = [
        ['abdo@gmail.com', '1112'], ['ali@gamil.com', '2211'], ['hema@gamil.com', '1155'],
        ["abdllah@gamil.com", '1212'], ['hany@gamail.com', '5151']
    ];

    private $user;


    public function __construct($email, $password)
    {
        $this->user = [$email, $password];
    }

    public function signin()
    {
        if (in_array($this->user, $this->Data)) {

            return "Hello " . $this->user[0];
        }

        return 'Not Found';
    }
}


if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $Login = new signIn($email, $password);

    echo $Login->signin();
}

?>