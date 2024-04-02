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
    <?php
    print_r( $_POST );
    ?>
    <div class="container">
        <div class="inner">
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