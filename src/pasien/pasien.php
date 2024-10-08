<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="../css/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Krona+One&family=League+Spartan:wght@100..900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap');

        h1 {
            font-family: Lexend;
            font-weight: 500;
            font-size: 60px;
        }

        h6 {
            font-family: Lexend;
            font-weight: 200;
            font-size: 14px;
        }

        p {
            font-family: Lexend, sans-serif;
            font-weight: 100;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <?php include '../template/sidebar.php'; ?>
    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            <div class="flex items-center justify-between">
                <h1>Pasien</h1>
                <a href="/grancy/src/admin/adminrooms_create.php" class="bg-blues opacity-95 text-white btn hover:bg-blues hover:opacity-100">Add Room</a>
            </div>
            <div class="overflow-x-auto">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr class="bg-blues2 ">
                            <th>No</th>
                            <th>Room Number</th>
                            <th>Rooms Type</th>
                            <th>Floor</th>
                            <th>Availability</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>' . $row['room_id'] . '</th>
                            <td>' . $row['room_number'] . '</td>
                            <td>' . $row['type_name'] . '</td>
                            <td>' . $row['floor'] . '</td>
                            <td>' . $row['status'] . '</td>
                            <td class="flex gap-x-4 justify-center">
                                <a href="/grancy/src/admin/adminrooms_edit.php?id=' . $row['room_id'] . '" class="btn bg-yellow hover:shadow-md hover:bg-yellow group">
                                    <i class="bi bi-pencil-square  transition-all"></i>
                                </a>
                                <a class="btn bg-red hover:shadow-md hover:bg-red group">
                                    <i class="bi bi-trash-fill  transition-all"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

</body>


</html>