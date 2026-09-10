<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7f5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            background: #ffffff;
            padding: 32px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.10);
        }

        h1 {
            margin-top: 0;
            margin-bottom: 8px;
            color: #166534;
        }

        .subtitle {
            margin-top: 0;
            margin-bottom: 24px;
            color: #666666;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 11px 12px;
            border: 1px solid #cccccc;
            border-radius: 6px;
            font-size: 15px;
        }

        input:focus {
            outline: none;
            border-color: #166534;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background: #16a34a;
            color: #ffffff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #15803d;
        }

        .error-message {
            margin-bottom: 18px;
            padding: 10px 12px;
            background: #fee2e2;
            color: #991b1b;
            border-radius: 6px;
        }
    </style>
</head>

<body>

<div class="login-container">

    <h1>Login</h1>

    <p class="subtitle">
        Sign in to access the management system.
    </p>

    <?php if (!empty($login_error)): ?>

    <div class="error-message">
        <?= htmlspecialchars($login_error) ?>
    </div>

    <?php endif; ?>

    <form action="/login/authenticate" method="POST">

        <div class="form-group">

            <label for="username">Username</label>

            <input
                type="text"
                id="username"
                name="username"
                required
                autocomplete="username"
            >

        </div>

        <div class="form-group">

            <label for="password">Password</label>

            <input
                type="password"
                id="password"
                name="password"
                required
                autocomplete="current-password"
            >

        </div>

        <button type="submit">
            Login
        </button>

    </form>

</div>

</body>
</html>