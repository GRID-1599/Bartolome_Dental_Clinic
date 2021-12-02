<!-- this only for trying -->
<?php
//  password hashing  
$br = "<br><br>";

$str = "catudio";
$str1 = "catudio";

echo $str;
echo $br;

$password =  password_hash($str, PASSWORD_DEFAULT);

echo $password;

echo $br;

echo strlen( $password);

echo $br; 

// echo 'return'.password_verify($str, $password);
echo 'return: '.password_verify($str, $password);

echo $br; 

if(password_verify($str1, $password)){
    echo "true";
}else{
    echo "false";

}
