<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            color: #fff;
            background: linear-gradient(180deg, #121212, #181818);
        }

        .bg-decor {
            position: fixed;
            inset: 0;
            z-index: -1;
            pointer-events: none;
            background: radial-gradient(circle at 20% 30%, rgba(30,215,96,.15), transparent 60%),
                        radial-gradient(circle at 80% 70%, rgba(255,255,255,.1), transparent 70%);
            animation: floatBg 14s ease-in-out infinite alternate;
        }

        .container {
            max-width: 720px;
            margin: 40px auto;
            padding: 0 16px;
        }

        .card {
            background: #181818;
            border: 1px solid #282828;
            border-radius: 14px;
            box-shadow: 0 8px 24px rgba(0,0,0,.5);
            overflow: hidden;
            transform: translateY(8px);
            opacity: 0;
            animation: cardIn .6s ease-out forwards;
        }

        .card-header {
            padding: 16px 20px;
            border-bottom: 1px solid #333;
            background: #202020;
        }

        .title {
            margin: 0;
            font-size: 20px;
            color: #fff;
            font-weight: 700;
        }

        .card-body {
            padding: 20px;
            animation: fadeIn .6s ease .15s both;
            background: #181818;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #b3b3b3;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            max-width: 420px;
            padding: 12px 14px;
            border: 1px solid #333;
            border-radius: 50px;
            background: #121212;
            color: #fff;
            transition: border-color .3s ease, box-shadow .3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            outline: none;
            border-color: #1DB954;
            box-shadow: 0 0 0 3px rgba(30,215,96,.25);
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 16px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            transition: all .2s ease;
        }

        .btn:active { transform: scale(0.97); }

        .btn-primary {
            background: #1DB954;
            color: white;
        }
        .btn-primary:hover { background: #1ed760; }

        .btn-secondary {
            background: #333;
            color: #fff;
        }
        .btn-secondary:hover { background: #444; }

        @keyframes cardIn { to { transform: translateY(0); opacity: 1; } }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes floatBg {
            0% { background-position: 0% 0%, 100% 0%; }
            100% { background-position: 10% 10%, 90% 90%; }
        }
    </style>
</head>
<body>
    <div class="bg-decor"></div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="title">Update User</h1>
            </div>
            <div class="card-body">
                <form action="<?= site_url('users/update/' . $user['id']) ?>" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" value="<?= $user['username'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?= $user['email'] ?>" required>
                    </div>
                    <div class="actions">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="<?= site_url('users/view') ?>" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
