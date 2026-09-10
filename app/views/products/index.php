<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7f5;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        h1 {
            margin: 0;
        }

        .add-btn {
            display: inline-block;
            padding: 10px 16px;
            background: #198754;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #146c43;
            color: white;
        }

        .empty {
            text-align: center;
            padding: 25px;
        }

        .edit-btn,
        .delete-btn {
            padding: 6px 10px;
            border-radius: 5px;
            text-decoration: none;
        }

        .edit-btn {
            background: #d1e7dd;
            color: #0f5132;
        }

        .delete-btn {
            background: #f8d7da;
            color: #842029;
            border: 1px solid #f5c2c7;
            cursor: pointer;
        }
        .logout-btn {
    display: inline-block;
    margin-left: 10px;
    padding: 10px 16px;
    background: #dc3545;
    color: white;
    text-decoration: none;
    border-radius: 6px;
}

        form {
            display: inline;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <div>
            <h1>Product Management</h1>
            <p>Manage products stored in Aiven MySQL.</p>
        </div>

        <a href="/products/create" class="add-btn">
            + Add Product
        </a>
        <a href="/logout" class="logout-btn">
            Logout
        </a>
    </div>

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>

        <?php if (!empty($products)): ?>

            <?php foreach ($products as $product): ?>

                <tr>
                    <td><?= htmlspecialchars($product['id']) ?></td>

                    <td>
                        <?= htmlspecialchars($product['product_name']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($product['description'] ?? '') ?>
                    </td>

                    <td>
                        <?= number_format((float) $product['price'], 2) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($product['quantity']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($product['created_at']) ?>
                    </td>

                    <td>

                        <a
                            href="/products/edit/<?= htmlspecialchars($product['id']) ?>"
                            class="edit-btn"
                        >
                            Edit
                        </a>

                        <form
                            action="/products/delete/<?= htmlspecialchars($product['id']) ?>"
                            method="POST"
                            onsubmit="return confirm('Delete this product?');"
                        >
                            <button type="submit" class="delete-btn">
                                Delete
                            </button>
                        </form>

                    </td>
                </tr>

            <?php endforeach; ?>

        <?php else: ?>

            <tr>
                <td colspan="7" class="empty">
                    No products found.
                </td>
            </tr>

        <?php endif; ?>

        </tbody>
    </table>

</div>

</body>
</html>