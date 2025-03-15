
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern DataTable</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="../css/table.css"/>
    <link rel="stylesheet" href="../css/index.css"/>
</head>

<body>
    <div class="table-container">
    <div class="header">
        <h4>User Table</h4>
        <div class="header-button">
            <a href="../views/insert_record.php?get_id=1">
                <button class="btn btn-primary" id="add-new">Add New User</button>
            </a>
        </div>
    </div>
        <!-- this is for menu -->
        <div class="sidebar">
        </div>
        <div class="content-wrapper">
            <table id="myTable" class="display">
        <?php
        require_once "../config/database.php";
        $sql    = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0): ?>
                <thead>
                    <tr>
                        <th>ID #</th>
                        <th>Name</th>
                        <th>Date of Birth</th>
                        <th>Age</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($result)):
                $name   = ucwords($row["first_name"] ." ". $row["middle_name"]." ". $row["last_name"]);
                $current_year = date("Y");
                $birth_year   = date("Y", strtotime($row["dob"]));
                $age          = $current_year - $birth_year;   
            ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo ($birth_year); ?></td>
                        <td><?php echo $age; ?></td>  
                        <td>
                            <!-- <form action="edit_record.php" method="POST">
                                <input type="hidden" name="user_id" value="<?php echo $row["id"]; ?>">
                                <button type="submit" class="btn edit-btn">
                                Edit
                                </button>
                            </form> -->
                            <div class="action-buttons" style="display: flex; gap: 10px;">
                                <button class="edit-btn btn">
                                    <a class="dropdown-item d-flex align-items-center" href="update_record.php?id=<?php echo $row['id']; ?>">
                                        <i class="bi bi-pencil-fill me-2"></i>
                                        Edit
                                    </a>
                                </button>

                                <form action="../controllers/controllers.php" method="POST" onsubmit="return confirm('Are you sure?');">
                                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" class="btn delete-btn">Delete</button>
                                </form>
                            </div>          
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
                <?php endif; ?>
            </table>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="../js/countries.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
</html>