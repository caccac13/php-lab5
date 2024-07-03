<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <style>
        .main {
            width: 1200px;
            margin: auto;
        }

        .tb-header {
            background-color: #344a6a;
            display: flex;
            justify-content: space-between;
            padding: 16px 32px;
        }

        .tb-header .name {
            color: #fff;
            font-weight: bold;
            font-size: 20px;
        }
        .table i {
            padding:  0 12px;
            color: yellow;
            cursor: pointer;
        }
        .table .fa-trash {
            color: red;
        }

    </style>
</head>

<body>
    <div class="main">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "php-lab5-ex1";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        ?>

        <div class="tb-header">
            <p class="name">
                Manage Employee
            </p>
            <div class="action">
                <button type="button" class="btn btn-danger">Delete</button>
                <button class="btn btn-success" type="submit">Add new employee</button>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"><input type="checkbox" name="" id=""></th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                $sql = "SELECT * FROM `employee`";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo '
                    <tr>
                        <th scope="row"><input type="checkbox" name="" id=""></th>
                        <td>' . $row['name'] . '</td>
                        <td>' . $row['email'] . '</td>
                        <td>' . $row['address'] . '</td>
                        <td>' . $row['phone'] . '</td>
                        <td><i class="fa-solid fa-pen"></i><i class="fa-solid fa-trash"></i></td>
                    </tr>
                    ';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>