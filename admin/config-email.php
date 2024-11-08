<?php
    require_once '../inlcudes/config.php';  // Load config file
    require_once '../vendor/autoload.php';  // Load Composer's autoloader
    use PHPMailer\PHPMailer\PHPMailer;//Imports the PHPMailer class
    use PHPMailer\PHPMailer\Exception;// Imports the Exception class for error handling
        $mail = new PHPMailer(true);
        $id = $_GET['id'] ?? '';
        // Initializes a variable to store an email sending status message
        $msg = '';
        // SQL query to retrieve data from the users table
        $sql_cl = "SELECT * FROM admissions WHERE id = '$id'";
        $result_cl = $conn->query($sql_cl);// Executes the query using a database connection object assumed to be available in
        $row = [];//Initializes an empty array to store the retrieved applicant data.
        // Check if any rows were returned
        if ($result_cl->num_rows > 0) {
            // Output data of each row
            $row = $result_cl->fetch_assoc();// If rows exist, fetches the first row as an associative array and stores it in $row.
        }
    try{
        $mail->isSMTP(); //Sets the mail sending method to SMTP                                           // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'sumairanoori624@gmail.com';               // SMTP username
        $mail->Password   = 'ymhy btfq xsih begs';                  // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to
        //Recipients
        $mail->setFrom('sumairanoori624@gmail.com', 'Islamic School');
        $mail->addAddress($row['useremail'] ?? '', $row['username'] ?? '');     // Add a recipient
        $mail->addReplyTo('sumairanoori624@gmail.com', 'Sumaira Noori');
        $email_message = "Dear " . $row['username'] . ",<br><br>
                        I am pleased to inform you that you have been shortlisted for <b>" . ucfirst($row['subject']) . "</b> at <b><a href='" . url() . "'>ISLAMIC SCHOOL</a></b>.
                        To proceed with your application, please submit the following documents within the next 15 days:<br><br>
                        1. Domicile 2 Copy<br>
                        2. CNIC 2 Copy<br>
                        3. Pastport Size Photo 2 <br>
                        4. All Educational Documents
                        <br><br>
                        Please ensure all documents are complete and submitted by [Submission Deadline: 15 days from today’s date]. 
                        <br>
                        You can submit your documents via [submission method, e.g., email, online portal, etc.]. 
                        <br>
                        Should you have any questions or need further assistance, feel free to contact us at [contact information].
                        <br><br>
                        Congratulations once again, and we look forward to receiving your documents.
                        <br><br>
                        Best regards,
                        <br><br>
                        Administration <br> 
                        <a href='" . url() . "'>ISLAMIC SCHOOL</a><br>";

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Congratulations! You Have Been Shortlisted';
        $mail->Body    = $email_message;
        $mail->AltBody = $email_message;//????
        if ($mail->send()) {
            $status = 'success';
            $msg = 'Email has been sent';
        } else {
            $status = 'danger';
            $msg =  'Email not sent';
        }
    } catch (Exception $e) {//This is a try-catch block used for error handling
        $status = 'danger';
         $msg = "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    header("Location: new-admissions.php?msg=".$msg. '&status='.$status);
