<?php 

class User {

    public $username;
    public $email;

    // Constructor function
    public function __construct($username, $email){
        $this->username = $username;
        $this->email = $email;
    }

    // $this keyword refers to this instance of the class
    public function addFriend() {
        return "$this->email added a new friend";
    }

}

// Looks at the user class and makes a new object based on the user class
// We store it in a variable to use it later on
// = Instantiating a class (we creating a new instance of the user class = a single occurence of something)

$userOne = new User('mario', 'mario@thenetninja.co.uk');
$userTwo = new User('luigi', 'luigi@thenetninja.co.uk');

echo $userOne->username . '<br>';
echo $userOne->email . '<br>';
echo $userOne->addFriend() . '<br>';

$userTwo->username . '<br>';
$userTwo->email . '<br>';

echo $userTwo->username . '<br>';
echo $userTwo->email . '<br>';
echo $userTwo->addFriend() . '<br>';


/* print_r (get_class_vars('User'));
print_r (get_class_methods('User')); */

?>


<html lang="en">
<head>
    <title>Pokedex</title>
</head>

<body>

</body>

</html>