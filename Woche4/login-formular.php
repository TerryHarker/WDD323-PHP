<?php
// sessionnamen ändern, nicht den bekannten standard verwenden - so ist das auslesen der Session ID aus dem Cookie einiges schwieriger:
session_name( md5('MEINEIGENERSESSIONNAME') ); 

session_start(); // session Zugriff gewähren - erst nach session_name, aber vor dem ersten Session Zugriff!

$username = 'Terry';
$password = 'test1234';
$password_hash = '$2y$10$IoWdMwwFOw6jJekEjz0DcO7yhMC2yES362CgPMgp3vTxKJcA2y.4u'; // hash von 'test1234'


if( isset($_POST['username']) && isset($_POST['password']) ){
    $usernameKorrekt = ($_POST['username']==$username);
    $passwordKorrekt = password_verify($_POST['password'], $password_hash);
    if( $usernameKorrekt && $passwordKorrekt ){

        // erfolgreich eingeloggt - wir speichern ein paar Werte in der Session zur Überprüfung
        $_SESSION['isloggedin'] = true; // login status
        $_SESSION['userip'] = $_SERVER['REMOTE_ADDR']; // IP Speichern für prüfung
        $_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT']; // IP Speichern für prüfung
        $_SESSION['timestamp'] = time(); // Timestamp für Zeiteinschränkung

        header("location: geschuetzter-bereich.php"); // zum Adminbereich

    }else{
        $errorMessage = 'Username oder Passwort nicht korrekt';
    }
}
echo '<pre>';
echo 'POST: ';
print_r( $_POST );

echo 'SESSION: ';
print_r($_SESSION);

echo '</pre>';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        .container>div {

            margin: 16px;
        }
        .container {
            width: 300px;
            background-color: white;
            margin: 0 auto;
            margin-top: 100px;
            border: 1px solid black;
            border-radius: 4px;
        }
        input[type=text], input[type=password] {
            width:100%;
            width:-webkit-fill-available;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: block;
            border: none;
            background: #f1f1f1;
        }
        button,
        a.button {
            background-color: #e27018;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
            text-decoration:none;
        }
        button:hover, .button:hover {
            opacity:1;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="inner">
            <?php
            if( isset($errorMessage) ){
                echo '<p style="color:red">'.$errorMessage.'</p>';
            }
            ?>
            <form method="POST" action="">
                
                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Benutzernamen eingeben" name="username" required>
                
                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Passwort eingeben" name="password" required>
                
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>