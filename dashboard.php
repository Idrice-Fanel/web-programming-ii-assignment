
<?php
$conn = new mysqli("localhost", "root", "", "Contacts");

if ($conn->connect_error) {
    die("Database connection failed.");
}

$sql = "SELECT id, name, email, contact FROM contact ORDER BY id ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts Dashboard</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
            overflow-wrap: anywhere;
        }

        th {
            background-color: #eeeeee;
        }
    </style>
</head>
<body>

    <h2>Contacts Dashboard</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
        </tr>

        <?php if ($result): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars((string)$row["id"]) ?></td>
                    <td><?= htmlspecialchars($row["name"]) ?></td>
                    <td><?= htmlspecialchars($row["email"]) ?></td>
                    <td><?= htmlspecialchars($row["contact"]) ?></td>
                </tr>
            <?php endwhile; ?>
        <?php endif; ?>
    </table>

    <?php
    $conn->close();
    ?>

</body>
</html>
