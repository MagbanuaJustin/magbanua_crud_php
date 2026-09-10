<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7f5;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 650px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
        }

        h1 {
            margin-top: 0;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            box-sizing: border-box;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .actions {
            margin-top: 20px;
        }

        button {
            padding: 10px 16px;
            background: #198754;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .cancel-btn {
            display: inline-block;
            margin-left: 8px;
            padding: 10px 16px;
            background: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Add Product</h1>

    <form action="/products/store" method="POST">

        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input
                type="text"
                id="product_name"
                name="product_name"
                maxlength="100"
                required
            >
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea
                id="description"
                name="description"
            ></textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input
                type="number"
                id="price"
                name="price"
                min="0"
                step="0.01"
                required
            >
        </div>

        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input
                type="number"
                id="quantity"
                name="quantity"
                min="0"
                step="1"
                required
            >
        </div>

        <div class="actions">
            <button type="submit">Save Product</button>

            <a href="/products" class="cancel-btn">
                Cancel
            </a>
        </div>

    </form>

</div>

</body>
</html>