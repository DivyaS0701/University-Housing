<nav class="ts-sidebar" style="background-color:black;">
    <ul class="ts-sidebar-menu">

        <?PHP if(isset($_SESSION['id']))
				{ ?>
        <li><a href="dashboard.php"> Dashboard</a></li>
        <li><a href="student_profile.php"> Profile Settings</a></li>
        <li><a href="change-password.php"></i>Change Password</a></li>
        <li><a href="book-hostel.php">Book Room</a></li>
        <li><a href="room-details.php">Room Details</a></li>
        <li><a href="logout.php">Signout</a></li>
        <?php } else { ?>

        <li><a href="registration.php"> User Registration</a></li>
        <li><a href="index.php">User Login</a></li>
        <li><a href="admin/index.php"> Housing Manager Login</a></li>
        <?php } ?>

    </ul>
</nav>