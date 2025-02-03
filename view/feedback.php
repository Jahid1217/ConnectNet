<?php
   require '../control/feedback_control.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback & Issue Submission</title>
  <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
  <div class="feedback-container">
    <h1>Feedback & Issue Submission</h1>
    <p>We value your feedback! Please let us know about your experience or any issues you're facing.</p>

    <form action="" method="POST"  enctype="multipart/form-data">
      <table>
        <!-- User ID Field (Auto-filled) -->
        <tr>
          <td>User Name:</td>
          <td> <input type="text" name="user_name" id="user_name" value=" "></td>
        </tr>

        <!-- Name Field -->
        <tr>
          <td>Name:</td>
          <td><input type="text" id="name" name="name" placeholder="Enter your name" ></td>
          <td><?php echo $NameError; ?></td>
          </tr>

        <!-- Email Field -->
        <tr>
            <td>Email:</td>
            <td><input type="text" id="email" name="Email" placeholder="Email" ></td>
            <td><?php echo $emailerror; ?></td>
            </tr>

        <!-- Issue Type Field -->
        <tr>
          <td>Issue Type:</td>
          <td>
            <select id="issueType" name="issuetype">
              <option value="" disabled selected>Select an option</option>
              <option value="technical">Technical Issue</option>
              <option value="billing">Billing Issue</option>
              <option value="feedback">General Feedback</option>
              <option value="other">Other</option>
            </select>
          </td>
          <td><?php echo $issueTypeerror; ?></td>
        </tr>

        <!-- Message Field -->
        <tr>
          <td><label for="message">Message:</label></td>
          <td><textarea id="message" name="message" rows="5" placeholder="Describe your issue or feedback"></textarea></td>
          <td><?php echo $messageerror; ?></td>
        </tr>

        <!-- Submit Button -->
        <tr>
          <td colspan="2" style="text-align: center;">
            <button class="button" type="submit">Submit</button>
          </td>
        </tr>
      </table>
      <script src= "../js/myScript.js"></script>
    </form>
  </div>

  
</body>
</html>