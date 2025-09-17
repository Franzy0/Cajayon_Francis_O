<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            color: #fff;
            background: linear-gradient(180deg, #121212, #181818);
        }

        /* Spotify vibe background */
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
            max-width: 960px;
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
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            padding: 16px 20px;
            border-bottom: 1px solid #333;
            background: #202020;
        }

        .title {
            margin: 0;
            font-size: 22px;
            color: #fff;
            font-weight: 700;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .search-box {
            display: flex;
            gap: 8px;
        }

        .search-input {
            padding: 10px 14px;
            border-radius: 50px;
            border: 1px solid #333;
            font-size: 14px;
            min-width: 220px;
            background: #121212;
            color: #fff;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            text-decoration: none;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            transition: all .2s ease;
            cursor: pointer;
            border: none;
        }

        .btn:active { transform: scale(0.97); }

        .btn-primary {
            background: #1DB954;
            color: white;
        }
        .btn-primary:hover { background: #1ed760; }

        .btn-edit {
            background: #535353;
            color: white;
        }
        .btn-edit:hover { background: #6a6a6a; }

        .btn-delete {
            background: #b91c1c;
            color: white;
        }
        .btn-delete:hover { background: #dc2626; }

        .table-wrapper {
            overflow-x: auto;
            animation: fadeIn .6s ease .15s both;
            background: #181818;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border-bottom: 1px solid #333;
            padding: 14px 16px;
            text-align: left;
        }

        th {
            background: #202020;
            font-weight: 600;
            color: #b3b3b3;
        }

        td {
            color: #eaeaea;
        }

        tr { transition: background .2s ease; }
        tr:hover td { background: #282828; }

        .empty {
            padding: 24px;
            text-align: center;
            color: #999;
            font-style: italic;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .pagination {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 6px;
            margin: 20px 0;
            padding: 0;
        }

        .pagination li a {
            display: block;
            padding: 8px 14px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 600;
            color: #fff;
            background: #333;
            transition: background .2s ease;
        }

        .pagination li a:hover { background: #444; }
        .pagination li.active a { background: #1DB954; color: white; }
        .pagination li.disabled a { color: #666; background: #222; pointer-events: none; }

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
                <h1 class="title">Users</h1>
                <div class="actions">
                    <form method="get" action="<?= site_url('users/view') ?>" class="search-box">
                        <input type="text" name="q" class="search-input" placeholder="Search users..."
                               value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                    <?php if (!empty($_GET['q'])): ?>
                        <a href="<?= site_url('users/view') ?>" class="btn btn-primary">Back</a>
                    <?php else: ?>
                        <a href="<?= site_url('users/create') ?>" class="btn btn-primary">Create User</a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="table-wrapper">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                    <?php if (!empty($users)): ?>
                        <?php foreach($users as $user): ?>
                            <tr>
                                <td><?= $user['id'] ?></td>
                                <td><?= htmlspecialchars($user['username']) ?></td>
                                <td><?= htmlspecialchars($user['email']) ?></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="<?= site_url('users/update/' . $user['id']) ?>" class="btn btn-edit">Edit</a>
                                        <a href="<?= site_url('users/delete/' . $user['id']) ?>" class="btn btn-delete">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="empty">No users found.</td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>

            <!-- Pagination -->
            <?php if (!empty($page)): ?>
                <ul class="pagination">
                    <?= $page; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
