<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Note Taking App</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container" id="login-section" >
     <form action="/handle_login" method="POST">
    <h2>Login</h2>
    <?php if (isset($errors['name'])): ?>
        <label> <?php
            echo $errors['name'];
            ?>
        </label>
    <?php endif; ?>
    <input type="text" id="username" name="name" placeholder="Username" />

    <?php if (isset($errors['password'])): ?>
        <label> <?php
            echo $errors['password'];
            ?>
        </label>
    <?php endif; ?>
    <input type="password" id="password" name="psw" placeholder="Password" />
    <button id="login-btn">Login</button>
    <p>Don't have an account? <a href="https://codepen.io/thesecondcatfish/pen/dPydJML">Register here</a></p>
    <p id="login-error-message" class="error-message"></p>
     </form>
</div>

<script src="login.js"></script>
</body>
</html>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Arial', sans-serif;
        background-color: #f7f7f7;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: #333;
    }

    .container {
        width: 100%;
        max-width: 400px;
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        font-size: 1.8rem;
        text-align: center;
        margin-bottom: 20px;
        color: #5e5e5e;
    }

    input, textarea {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 1rem;
        color: #333;
    }

    input:focus, textarea:focus {
        border-color: #4CAF50;
        outline: none;
    }

    button {
        width: 100%;
        padding: 12px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1.1rem;
        cursor: pointer;
        margin-top: 10px;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #45a049;
    }

    button:disabled {
        background-color: #ccc;
        cursor: not-allowed;
    }

    #error-message {
        color: red;
        font-size: 0.9rem;
        text-align: center;
        margin-top: 10px;
    }

    #login-section, #register-section, #note-section {
        display: block;
    }

    textarea {
        min-height: 200px;
        resize: vertical;
    }

    #note-section h2 {
        font-size: 1.6rem;
        margin-bottom: 15px;
        color: #333;
    }

    #note-section button {
        background-color: #f44336;
    }

    #note-section button:hover {
        background-color: #e53935;
    }

</style>
