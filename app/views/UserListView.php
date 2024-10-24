<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Users List</h1>

        <!-- Button trigger modal for Add User -->
        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addUserModal">
            Tambah Data
        </button>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td>
                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#userDetailModal"
                            data-id="<?php echo $user['id']; ?>"
                            data-name="<?php echo $user['name']; ?>"
                            data-email="<?php echo $user['email']; ?>">
                                Detail
                            </button>
                            <a href="index.php?action=edit&id=<?php echo $user['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="index.php?action=delete&id=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal for Add User -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addUserModalLabel">Tambah Data Pengguna</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="index.php?action=add" method="POST">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="userDetailModal" tabindex="-1" aria-labelledby="userDetailModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="userDetailModalLabel">User Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p><strong>ID:</strong> <span id="modalUserId"></span></p>
            <p><strong>Name:</strong> <span id="modalUserName"></span></p>
            <p><strong>Email:</strong> <span id="modalUserEmail"></span></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <script>
        var userDetailModal = document.getElementById('userDetailModal');
        userDetailModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var userId = button.getAttribute('data-id');
            var userName = button.getAttribute('data-name');
            var userEmail = button.getAttribute('data-email');
            
            document.getElementById('modalUserId').textContent = userId;
            document.getElementById('modalUserName').textContent = userName;
            document.getElementById('modalUserEmail').textContent = userEmail;
        });
    </script>
</body>
</html>
