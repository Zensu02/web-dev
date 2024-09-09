<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .main {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .main h2 {
            text-align: center;
        }
        .main form {
            display: flex;
            flex-direction: column;
        }
        .main label {
            margin-bottom: 5px;
        }
        .main input {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .main button {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="main">
        <h2>Login</h2>
        <form class="format" id ="login">
            <label for="ladmin">Username:</label>
            <input class="intadd"type="text" id="ladmin" name="ladmin" required>

            <label for="lpass">Password:</label>
            <input class = "intpass" type="password" id="lpass" name="lpass" required>

            <button type="submit" id="lsub" name="lsub">Log In</button>
        </form>
    </div>
</body>
</html>