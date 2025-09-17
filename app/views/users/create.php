<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
    <style>
        * { box-sizing: border-box; }
        body { 
            margin: 0; 
            font-family: Arial, Helvetica, sans-serif; 
            color: #fff; 
            background: linear-gradient(160deg, #121212, #000000); 
        }

        /* Background Effect */
        .bg-decor { 
            position: fixed; 
            inset: 0; 
            z-index: -1; 
            pointer-events: none; 
            background: radial-gradient(600px 600px at 0% 0%, rgba(30,215,96,.15), transparent 60%),
                        radial-gradient(600px 600px at 100% 0%, rgba(25,20,20,.25), transparent 60%),
                        radial-gradient(600px 600px at 0% 100%, rgba(25,20,20,.25), transparent 60%),
                        radial-gradient(600px 600px at 100% 100%, rgba(30,215,96,.15), transparent 60%);
            animation: floatBg 18s ease-in-out infinite alternate; 
        }

        .container { max-width: 640px; margin: 60px auto; padding: 0 16px; }

        .card { 
            background: #181818; 
            border-radius: 14px; 
            box-shadow: 0 8px 28px rgba(0,0,0,.6); 
            overflow: hidden; 
            transform: translateY(10px); 
            opacity: 0; 
            animation: cardIn .7s ease-out forwards; 
        }

        .card-header { 
            padding: 18px 22px; 
            border-bottom: 1px solid #282828; 
            background: linear-gradient(135deg, #1DB954 0%, #1ed760 100%); 
        }

        .title { 
            margin: 0; 
            font-size: 22px; 
            color: #fff; 
            font-weight: 700; 
        }

        .card-body { 
            padding: 24px; 
            animation: fadeIn .6s ease .2s both; 
            background: #181818; 
        }

        .form-group { margin-bottom: 18px; }
        label { 
            display: block; 
            margin-bottom: 6px; 
            font-weight: 600; 
            color: #b3b3b3; 
        }

        input[type="text"], input[type="email"] { 
            width: 100%; 
            max-width: 420px; 
            padding: 12px 14px; 
            border: none; 
            border-radius: 8px; 
            background: #282828; 
            color: #fff; 
            font-size: 15px;
            transition: all .3s ease; 
        }

        input[type="text"]:focus, input[type="email"]:focus { 
            outline: none; 
            background: #333; 
            box-shadow: 0 0 0 3px rgba(30,215,96,.4); 
        }

        .actions { display: flex; gap: 12px; margin-top: 16px; }

        .btn { 
            display: inline-block; 
            padding: 12px 22px; 
            text-decoration: none; 
            border-radius: 50px; 
            border: none; 
            font-size: 15px; 
            font-weight: 600; 
            cursor: pointer; 
            transition: transform .1s ease, background-color .2s ease; 
        }

        .btn:active { transform: scale(0.97); }

        .btn-primary { 
            background: #1DB954; 
            color: #fff; 
        }

        .btn-primary:hover { 
            background: #1ed760; 
        }

        .btn-secondary { 
            background: #282828; 
            color: #fff; 
        }

        .btn-secondary:hover { 
            background: #3e3e3e; 
        }

        /* Animations */
        @keyframes cardIn { to { transform: translateY(0); opacity: 1; } }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes floatBg { 
            0% { background-position: 0% 0%, 100% 0%, 0% 100%, 100% 100%; } 
            100% { background-position: 10% 5%, 90% 10%, 5% 90%, 95% 95%; } 
        }
    </style>
</head>
<body>
    <div class="bg-decor"></div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="title">Create User</h1>
            </div>
            <div class="card-body">
                <form action="<?= site_url('users/create') ?>" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                    <div class="actions">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="<?= site_url('users/view') ?>" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
