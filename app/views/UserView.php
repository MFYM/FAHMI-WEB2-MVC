<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Users Details</h1>
        <ul class="list-group">
            <li class="list-group-item"><strong>ID:</strong> <?php echo $user['id']; ?></li>
            <li class="list-group-item"><strong>Name:</strong> <?php echo $user['name']; ?></li>
            <li class="list-group-item"><strong>Email:</strong> <?php echo $user['email']; ?></li>
        </ul>
        <a href="index.php" class="btn btn-secondary mt-3">Back to List</a>
    </div>
</body>
</html>
