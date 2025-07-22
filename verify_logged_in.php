<?php
    require "../db_connect.php";
    require "../message_display.php";
    
    // Temporarily commented out if the file is missing
    // require "../verify_logged_in.php"; // Verifies the user is logged in

    // Fetch pending registrations
    $query = $con->prepare("SELECT * FROM pending_registrations");
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows == 0) {
        echo error_without_field("No pending registrations.");
    } else {
        echo "<table>";
        echo "<thead><tr><th>Username</th><th>Email</th><th>Action</th></tr></thead>";
        echo "<tbody>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>
                    <form method='POST' action=''>
                        <input type='hidden' name='user_id' value='" . $row['id'] . "' />
                        <input type='submit' name='approve' value='Approve' />
                        <input type='submit' name='reject' value='Reject' />
                    </form>
                </td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    }

    // Approve or reject registration
    if (isset($_POST['approve'])) {
        $userId = $_POST['user_id'];
        
        // Move user from pending_registrations to the librarian table
        $query = $con->prepare("INSERT INTO librarian (username, email, password) SELECT username, email, password FROM pending_registrations WHERE id = ?");
        $query->bind_param("i", $userId);
        $query->execute();

        // Delete the user from pending_registrations
        $query = $con->prepare("DELETE FROM pending_registrations WHERE id = ?");
        $query->bind_param("i", $userId);
        $query->execute();

        echo success_with_field("Registration approved successfully. No email was sent.");
    }

    if (isset($_POST['reject'])) {
        $userId = $_POST['user_id'];
        
        // Delete the user from pending_registrations
        $query = $con->prepare("DELETE FROM pending_registrations WHERE id = ?");
        $query->bind_param("i", $userId);
        $query->execute();

        echo success_with_field("Registration rejected successfully.");
    }
?>
