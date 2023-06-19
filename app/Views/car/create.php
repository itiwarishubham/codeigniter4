<!DOCTYPE html>
<html>
<head>
    <title>Add Car</title>
</head>
<body>
    <h1>Add Car</h1>
    <form action="/car/store" method="post">
        <label>Brand:</label>
        <input type="text" name="brand" required><br>
        <label>Model:</label>
        <input type="text" name="model" required><br>
        <label>Year:</label>
        <input type="text" name="year" required><br>
        <label>Price:</label>
        <input type="text" name="price" required><br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
