
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
            <a class="button">Logout</a>
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