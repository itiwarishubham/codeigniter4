<!DOCTYPE html>
<html>
<head>
    <title>Update Car</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 300px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
        }

        button[type="submit"] {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Edit Car</h1>
    <form action="<?= '/car/update/' . $car['_id'] ?>" method="post" autocomplete="off">
        <label>Brand:</label>
        <input type="text" name="brand" value="<?php echo $car['brand']; ?>" required>
        <label>Model:</label>
        <input type="text" name="model" value="<?php echo $car['model']; ?>" required>
        <label>Year:</label>
        <input type="text" name="year" value="<?php echo $car['year']; ?>" required>
        <label>Price:</label>
        <input type="text" name="price" value="<?php echo $car['price']; ?>" required>
        <input type="hidden" name="car_id" value="<?php echo $car['_id']; ?>">
        <button type="submit">Update</button>
    </form>
</body>
</html>
