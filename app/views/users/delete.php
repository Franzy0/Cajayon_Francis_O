<!DOCTYPE html>
<html>
<head>
    <title>Delete User</title>
    <style>
        * { box-sizing: border-box; }
        body { 
            margin: 0; 
            font-family: Arial, Helvetica, sans-serif; 
            color: #fff; 
            background: linear-gradient(180deg, #121212, #000000); 
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

        .container { max-width: 560px; margin: 100px auto; padding: 0 16px; }

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
            padding: 16px 20px; 
            border-bottom: 1px solid #282828; 
            background: linear-gradient(135deg, #1DB954 0%, #1ed760 100%); 
        }

        h1 { 
            margin: 0; 
            font-size: 22px; 
            color: #fff; 
            font-weight: 700; 
        }

        .card-body { 
            padding: 24px; 
            animation: fadeIn .6s ease .2s both; 
            text-align: center; 
            background: #181818; 
        }

        p { 
            color: #b3b3b3; 
            font-size: 16px; 
            line-height: 1.6; 
        }

        strong { 
            color: #ffffff; 
            font-weight: 600; 
        }

        .actions { 
            display: flex; 
            justify-content: center; 
            gap: 14px; 
            margin-top: 24px; 
        }

        .btn { 
            padding: 12px 22px; 
            text-decoration: none; 
            border-radius: 50px; 
            border: none; 
            font-size: 15px; 
            font-weight: 600; 
            transition: transform .1s ease, background-color .2s ease; 
            cursor: pointer; 
        }

        .btn:active { transform: scale(0.97); }

        .btn-confirm { 
            background: #1DB954; 
            color: #fff; 
        }

        .btn-confirm:hover { 
            background: #1ed760; 
        }

        .btn-cancel { 
            background: #282828; 
            color: #fff; 
        }

        .btn-cancel:hover { 
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
                <h1>Delete User</h1>
            </div>
            <div class="card-body">
                <p>Are you sure you want to delete <strong><?= $user['username'] ?></strong> (<?= $user['email'] ?>)?</p>
                <form action="<?= site_url('users/delete/' . $user['id']) ?>" method="POST">
                    <div class="actions">
                        <button type="submit" class="btn btn-confirm">Yes, Delete</button>
                        <a href="<?= site_url('users/view') ?>" class="btn btn-cancel">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
