<!DOCTYPE html>
<html>
<head>
    <title>Car Rental Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        a.button {
            display: inline-block;
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .action-buttons {
            display: flex;
        }

        .action-buttons a {
            margin-right: 8px;
            text-decoration: none;
        }

        .action-buttons a {
            padding: 4px 8px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .action-buttons a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Car Rental Application</h1>
    <a href="/car/create" class="button">Add Car</a>
    <table>
        <thead>
            <tr>
                <th>Brand</th>
                <th>Model</th>
                <th>Year</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cars as $car): ?>
                <tr>
                    <td><?php echo $car['brand']; ?></td>
                    <td><?php echo $car['model']; ?></td>
                    <td><?php echo $car['year']; ?></td>
                    <td><?php echo $car['price']; ?></td>
                    <td class="action-buttons">
                        <a class="button" href="<?= '/car/update/' . $car['_id'] ?>">Update</a>
                        <a class=" button" href="<?= '/car/delete/' . $car['_id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
