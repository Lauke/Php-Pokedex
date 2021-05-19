<?php 

class User {

    // Public/Private = Access Modifier/Visibility modifier
    // If you want to restrict access (cant be changed) you set it to private or vice versa for public (able to change later on = public)
    public $username;
    private $email;

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

echo $userOne->addFriend();

/* $userOne->email = 3;

echo $userOne->email . '<br>';
echo $userTwo->email . '<br>'; */


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