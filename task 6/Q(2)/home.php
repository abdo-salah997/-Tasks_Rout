<?php
class signUp
{

    private $Data = [
        ['abdo@gmail.com', '11121112'], ['ali@gamil.com', '22112211'], ['hema@gamil.com', '11551155'],
        ["abdllah@gamil.com", '12121212'], ['hany@gamail.com', '51515151']
    ];

    private $user;
    private $chackData = true;


    public function __construct($email, $password)
    {
        $this->user = [$email, $password];
    }

    public function register()
    {
        foreach ($this->Data as $user) {
            if ($user[0] == $this->user[0]) {
                echo "This Email used";
                $this->chackData = false;
            }
        }
        if ($this->chackData == true) {

            array_push($this->Data, $this->user);
        }

        return $this->Data;
    }
}

if (isset($_POST['send'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if (strlen($password) >= 8) {
            if ($password == $_POST['re-password']) {

                $newUser = new signUp($email, $password);
                $reternData = $newUser->register();
            } else {
                echo '<br>' . 'Password does not matchPassword does not match';
            }
        } else {
            echo '<br>' . "Password is less than 8 characters";
        }
    } else {
        echo '<br>' . $email . 'is not a valid email address';
    }
}

?>
<table>
    <tr>
        <th>E-mail</th>
        <th>Pssword</th>
    </tr>

    <?php
    foreach ($reternData as $value => $key) {
    ?>
        <tr>
            <?php
            foreach ($key as $user) {
            ?>
                <td border="1px"><?php echo $user ?></td>
            <?php
            }
            ?>
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