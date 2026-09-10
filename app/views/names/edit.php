<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Name</title>

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
            max-width: 600px;
            margin: 60px auto;
        }

        /* PAGE HEADER */
        .page-header {
            margin-bottom: 25px;
        }

        .page-header h1 {
            margin: 0;
            color: #14532d;
            font-size: 32px;
        }

        .page-header p {
            margin: 8px 0 0;
            color: #6b7280;
            font-size: 14px;
        }

        /* FORM CARD */
        .form-card {
            background: white;
            border: 1px solid #dfe7e2;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }

        /* RECORD BADGE */
        .record-info {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 14px;
            margin-bottom: 25px;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 8px;
            color: #166534;
            font-size: 13px;
        }

        .record-id {
            background: #dcfce7;
            color: #166534;
            padding: 5px 9px;
            border-radius: 6px;
            font-weight: bold;
        }

        /* FORM */
        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #374151;
            font-size: 14px;
            font-weight: bold;
        }

        .required {
            color: #dc2626;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: #ffffff;
            color: #1f2937;
            font-size: 14px;
            outline: none;
            transition: 0.2s;
        }

        input[type="text"]:hover {
            border-color: #86efac;
        }

        input[type="text"]:focus {
            border-color: #16a34a;
            box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.12);
        }

        /* ACTIONS */
        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 28px;
        }

        .update-btn {
            border: none;
            background: #16a34a;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
            box-shadow: 0 4px 12px rgba(22, 163, 74, 0.20);
        }

        .update-btn:hover {
            background: #15803d;
            transform: translateY(-1px);
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 20px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: white;
            color: #4b5563;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            transition: 0.2s;
        }

        .back-btn:hover {
            background: #f3f4f6;
            border-color: #9ca3af;
        }

        /* FOOTER */
        .footer-text {
            margin-top: 18px;
            text-align: center;
            font-size: 13px;
            color: #9ca3af;
        }

        /* MOBILE */
        @media (max-width: 600px) {
            .container {
                width: 92%;
                margin: 30px auto;
            }

            .form-card {
                padding: 22px;
            }

            .page-header h1 {
                font-size: 27px;
            }

            .form-actions {
                flex-direction: column;
            }

            .update-btn,
            .back-btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="page-header">
            <h1>Edit Name</h1>
            <p>Update the information for this name record.</p>
        </div>

        <div class="form-card">

            <div class="record-info">
                <span>You are editing an existing record.</span>

                <span class="record-id">
                    ID #<?= htmlspecialchars($name['id']) ?>
                </span>
            </div>

            <form
                action="/names/update/<?= htmlspecialchars($name['id']) ?>"
                method="POST"
            >

                <div class="form-group">

                    <label for="last_name">
                        Last Name <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="last_name"
                        name="last_name"
                        value="<?= htmlspecialchars($name['last_name']) ?>"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="first_name">
                        First Name <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="first_name"
                        name="first_name"
                        value="<?= htmlspecialchars($name['first_name']) ?>"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="middle_name">
                        Middle Name <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="middle_name"
                        name="middle_name"
                        value="<?= htmlspecialchars($name['middle_name']) ?>"
                        required
                    >

                </div>


                <div class="form-actions">

                    <button type="submit" class="update-btn">
                        Update Name
                    </button>

                    <a href="/names" class="back-btn">
                        Back to Names List
                    </a>

                </div>

            </form>

        </div>

        <div class="footer-text">
            LavaLust CRUD Application
        </div>

    </div>

</body>
</html>