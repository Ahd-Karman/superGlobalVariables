<!-- $GLOBALS-->
<?php
function test() {
    $foo = "local variable";

    echo '$foo in global scope: '.$GLOBALS["foo"];
    echo "<br>";
    echo '$foo in current scope: ' . $foo . "<br>";
}

$foo = "Example content";
test();

echo '<br>' ;
?>


<!-- $_SERVER -->
<?php
echo '<br>' ;
echo "<h2>".$_SERVER['SERVER_NAME']."</h2>";
?>

<!-- 
    $_REQUEST
    $_GET
    $_POST
-->
<?php

$_GET['foo'] = 'a';
$_POST['bar'] = 'b';
var_dump($_GET) ; // Element 'foo' is string(1) "a"
echo "<br>";
var_dump($_POST) ; // Element 'bar' is string(1) "b"
echo "<br>";
var_dump($_REQUEST); // Does not contain elements 'foo' or 'bar' تحصل على قيم في الفورم 
echo "<br>" ;
?>

<!-- $_SESSION -->
<?php
echo "<br>" ;
session_start();

$_SESSION['test'] = 42;
$test = 43;
echo $_SESSION['test'];
echo "<br>" ;

?>

<!-- $_COOKIE -->
<?php
echo "<br>" ;
$_COOKIE['name'] = "Ahd Karman";
echo 'Hello ' . htmlspecialchars($_COOKIE["name"]) . '!';
echo "<br>" ;
?>

<!-- $_FILES -->
<?php

function incoming_files() {
    $files = $_FILES;
    $files2 = [];
    foreach ($files as $input => $infoArr) {
        $filesByInput = [];
        foreach ($infoArr as $key => $valueArr) {
            if (is_array($valueArr)) { // file input "multiple"
                foreach($valueArr as $i=>$value) {
                    $filesByInput[$i][$key] = $value;
                }
            }
            else { // -> string, normal file input
                $filesByInput[] = $infoArr;
                break;
            }
        }
        $files2 = array_merge($files2,$filesByInput);
    }
    $files3 = [];
    foreach($files2 as $file) { // let's filter empty & errors
        if (!$file['error']) $files3[] = $file;
    }
    return $files3;
}

$tmpFiles = incoming_files();

echo "<br>" ;
?>



<!-- $_ENV -->

<?php
echo "<br>" ;
$_ENV['USER'] = "Ahooda";
echo 'My username is ' .$_ENV["USER"] . '!';
?>