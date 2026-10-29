
<?php
$conn = new mysqli("localhost", "root", "", "Contacts");

if ($conn->connect_error) {
    die("Database connection failed.");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $contact = trim($_POST["contact"] ?? "");

    $stmt = $conn->prepare(
        "INSERT INTO contact (name, email, contact)
         VALUES (?, ?, ?)"
    );

    $stmt->bind_param("sss", $name, $email, $contact);

    if ($stmt->execute()) {
        echo "Contact saved successfully!";
    } else {
        echo "Error saving contact.";
    }

    $stmt->close();
}

$conn->close();
?>
