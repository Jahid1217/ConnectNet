<?php
require '../control/employee_profile_control.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="../styles/styles.css">
    <title>Document</title>
</head>
<body >
    <div class="navbar">
        <div class="logo">
            <a href="employeeDashboard.php">Home</a>
        </div>
        <div class="nav-links">
            <a href=""></a>
            <a href="employee_profile.php?username=<?php echo($_SESSION['user_name']); ?>">Profile</a>
            <a href="employee_setting.php?username=<?php echo($_SESSION['user_name']); ?>">Settings</a>
        </div>
    </div>
<div class="profile_container">
    <h1>Employee Profile</h1>
    
    <label for="profile">
        <?php if (!empty($employeeDetails['picture'])): ?>
            <img src="../uploads/<?php echo htmlspecialchars($employeeDetails['picture']); ?>" alt="Profile Picture" >
        <?php else: ?>
            <p>No profile picture uploaded.</p>
        <?php endif; ?>
    </label>
    
    <div class="profile_field"><label for="employee_id">Employee ID:</label> <span class="value"><?php echo htmlspecialchars($employeeDetails['employee_Id']); ?></span></div>
    <div class="profile_field"><label for="name">Name:</label> <span class="value"><?php echo htmlspecialchars($employeeDetails['name']); ?></span></div>
    <div class="profile_field"><label for="email">Email:</label> <span class="value"><?php echo htmlspecialchars($employeeDetails['email']); ?></span></div>
    <div class="profile_field"><label for="username">Username:</label> <span class="value"><?php echo htmlspecialchars($employeeDetails['username']); ?></span></div>
    <div class="profile_field"><label for="dob">Date of Birth:</label> <span class="value"><?php echo htmlspecialchars($employeeDetails['DOB']); ?></span></div>
    <div class="profile_field"><label for="phoneNumber">Phone Number:</label> <span class="value"><?php echo htmlspecialchars($employeeDetails['phoneNumber']); ?></span></div>
    <div class="profile_field"><label for="employee_role">Employee Role:</label> <span class="value"><?php echo htmlspecialchars($employeeDetails['employee_role']); ?></span></div>
    <div class="profile_field"><label for="department">Department:</label> <span class="value"><?php echo htmlspecialchars($employeeDetails['department']); ?></span></div>
    <div class="profile_field"><label for="location">Location:</label> <span class="value"><?php echo htmlspecialchars($employeeDetails['location']); ?></span></div>
    <div class="profile_field"><label for="employeeType">Employee Type:</label> <span class="value"><?php echo htmlspecialchars($employeeDetails['employeeType']); ?></span></div>
    <div class="profile_field"><label for="supervisor">Supervisor:</label> <span class="value"><?php echo htmlspecialchars($employeeDetails['supervisor']); ?></span></div>

</div>

</body>
</html>