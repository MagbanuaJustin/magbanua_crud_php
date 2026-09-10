<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Names List</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f0f7f2;
            color: #1f2937;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 60px auto;
        }

        /* HEADER */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .title-section h1 {
            margin: 0;
            color: #14532d;
            font-size: 32px;
        }

        .title-section p {
            margin: 8px 0 0;
            color: #6b7280;
            font-size: 14px;
        }

        /* ADD BUTTON */
        .add-btn {
            display: inline-block;
            background: #16a34a;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            transition: 0.2s;
            box-shadow: 0 4px 12px rgba(22, 163, 74, 0.25);
        }

        .add-btn:hover {
            background: #15803d;
            transform: translateY(-2px);
        }

        /* TABLE CARD */
        .table-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #dfe7e2;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #166534;
        }

        th {
            padding: 16px 20px;
            text-align: left;
            color: white;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 16px 20px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 14px;
            vertical-align: middle;
        }

        tbody tr {
            transition: background 0.2s;
        }

        tbody tr:hover {
            background: #f0fdf4;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        /* ID BADGE */
        .id-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 34px;
            height: 34px;
            padding: 0 8px;
            background: #dcfce7;
            color: #166534;
            border-radius: 7px;
            font-weight: bold;
        }

        /* ACTION BUTTONS */
        .actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .edit-btn {
            text-decoration: none;
            color: #15803d;
            background: #ecfdf5;
            border: 1px solid #bbf7d0;
            padding: 8px 14px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: bold;
            transition: 0.2s;
        }

        .edit-btn:hover {
            background: #dcfce7;
            border-color: #86efac;
        }

        .delete-form {
            margin: 0;
        }

        .delete-btn {
            background: #fff;
            color: #dc2626;
            border: 1px solid #fecaca;
            padding: 8px 14px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .delete-btn:hover {
            background: #fef2f2;
            border-color: #fca5a5;
        }

        /* EMPTY TABLE */
        .empty-state {
            text-align: center;
            padding: 50px;
            color: #6b7280;
        }

        /* FOOTER */
        .footer-text {
            margin-top: 18px;
            text-align: center;
            font-size: 13px;
            color: #9ca3af;
        }

        /* MOBILE */
        @media (max-width: 768px) {
            .container {
                width: 94%;
                margin: 30px auto;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 18px;
            }

            .table-card {
                overflow-x: auto;
            }

            table {
                min-width: 800px;
            }
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="header">

            <div class="title-section">
                <h1>Super Names List</h1>
                <p>Manage your super name records using the super CRUD system.</p>
            </div>

            <a href="/names/create" class="add-btn">
                + Add New Record
            </a>

        </div>


        <div class="table-card">

            <table>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    <?php if (!empty($names)): ?>

                        <?php foreach ($names as $name): ?>

                            <tr>

                                <td>
                                    <span class="id-badge">
                                        <?= htmlspecialchars($name['id']) ?>
                                    </span>
                                </td>

                                <td>
                                    <?= htmlspecialchars($name['last_name']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($name['first_name']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($name['middle_name']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($name['created_at']) ?>
                                </td>

                                <td>

                                    <div class="actions">

                                        <a
                                            href="/names/edit/<?= htmlspecialchars($name['id']) ?>"
                                            class="edit-btn"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="/names/delete/<?= htmlspecialchars($name['id']) ?>"
                                            method="POST"
                                            class="delete-form"
                                        >

                                            <button
                                                type="submit"
                                                class="delete-btn"
                                                onclick="return confirm('Are you sure you want to delete this record?');"
                                            >
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="6" class="empty-state">
                                No records found.
                            </td>
                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

        <div class="footer-text">
            LavaLust CRUD Application
        </div>

    </div>

</body>
</html>