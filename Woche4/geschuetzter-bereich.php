<?php
// sessionnamen ändern, nicht den bekannten standard verwenden - so ist das auslesen der Session ID aus dem Cookie einiges schwieriger:
session_name( md5('MEINEIGENERSESSIONNAME') ); 
session_start(); // session Zugriff gewähren - erst nach session_name, aber vor dem ersten Session Zugriff!

$session_lifetime = 10 * 60; // sekunden
$isLoggedIn = false; // Status Variable für die Entscheidung, ob der Adminbereich besucht werden darf oder nicht

echo '<pre>';
echo 'SESSION: ';
print_r($_SESSION);
echo '</pre>';




// Prüfen
if( isset($_SESSION['isloggedin']) &&  $_SESSION['isloggedin'] === true){
    // user ist eingeloggt
    $isLoggedIn = true;

    // Logout-Mitteilung in URL prüfen - ist der GET Parameter vorhanden?
    if( isset($_GET['logout']) && $_GET['logout'] == true ){
        // Vorhanden: user will sich ausloggen
        $isLoggedIn = false;
    }
    
    // IP Prüfen - gespeicherte IP mit aktueller IP vergleichen
    if( $_SESSION['userip'] != $_SERVER['REMOTE_ADDR'] ){
        $isLoggedIn = false;
    }

    // User Agent Prüfen  - gespeicherte User Agent mit aktuellem vergleichen
    if( $_SESSION['useragent'] != $_SERVER['HTTP_USER_AGENT']){
        $isLoggedIn = false;
    }

    // Zeit einschränken:
    $zeitjetzt = time(); // Vergangene Sekunden seit letzter Aktivität / letztem Page load
    if( $zeitjetzt-$_SESSION['timestamp'] > $session_lifetime ){
        $isLoggedIn = false; // Zu lange inaktiv
    }

}


if($isLoggedIn === false){
    // user darf nicht zugreifen
    
    // Session zurücketzen, indem die gespeicherten Informationen gelöscht werden - logout:
    unset( $_SESSION['isloggedin'] );
    unset( $_SESSION['userip'] );
    unset( $_SESSION['useragent'] );
    unset( $_SESSION['timestamp'] );
    
    // zum Formular umleiten
    header("location: login-formular.php");
    exit;
}

// neue session ID für den nächsten Aufruf - so wird eine eventuell geklaute Session ID bei jedem neuen page load ungültig
session_regenerate_id();
$_SESSION['timestamp'] = time(); // timestamp erneuern bei jedem page load (NACH allen Überprüfungungen!)
?>
<!DOCTYPE html>
<html>
<head>
    <title>Geschützter Bereich</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        .container-lg>div {

            margin: 16px;
        }
        .container-lg {
            width: 800px;
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
            opacity: 0.9;
            text-decoration:none;
            display:inline-block;
        }
        button:hover, .button:hover {
            opacity:1;
        }
        .flex {
            display: flex;
        } 
        .flex-left { 
            width:80%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }
        .flex-right { 
            width:20%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            justify-content: flex-end;
        }
    </style>
</head>
<body>
    <div class="container-lg navbar flex">
        <div class="inner flex-left">
            <strong>Adminbereich</strong>
        </div>
        <div class="inner flex-right">
            <a class="button" href="geschuetzter-bereich.php?logout=true">Logout</a>
        </div>
    </div>
    <div class="container-lg">
        <div class="inner">
           <h1>Willkommen im Adminbereich</h1>
           <p>Hier dürfen nur diejenigen rein, die erfolgreich angemeldet sind.</p>
        </div>
    </div>
</body>
</html>