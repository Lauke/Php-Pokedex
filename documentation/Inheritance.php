

<?php 

// Inheritance = one class inherits properties & methods from another 

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


    // Getters (=class method)
    // Will get a private property and return it to us
    public function getEmail(){
        return $this->email;
    }

    // Setters (=class method)
    // Will change/set a private property for us
    public function setEmail($email){
        //strpos = php function = checks the position of a certain character in a string
        //if it's not in the string it will return a -1 so we check if its bigger than -1
        if (strpos($email, '@') > -1){
        $this->email = $email;
        }
    }

}

// Looks at the user class and makes a new object based on the user class
// We store it in a variable to use it later on
// = Instantiating a class (we creating a new instance of the user class = a single occurence of something)

$userOne = new User('mario', 'mario@thenetninja.co.uk');
$userTwo = new User('luigi', 'luigi@thenetninja.co.uk');

/* $userOne->email = 3;

echo $userOne->email . '<br>';
echo $userTwo->email . '<br>'; */


/* print_r (get_class_vars('User'));
print_r (get_class_methods('User')); */

$userOne->setEmail('yoshi@thenetninja.co.uk');
echo $userOne->getEmail() . '<br>';
echo $userTwo->getEmail() . '<br>';


?>


<html lang="en">
<head>
    <title>Pokedex</title>
</head>

<body>

</body>

</html>