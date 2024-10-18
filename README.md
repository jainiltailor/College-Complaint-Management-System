# College Complaint Management System

This is a web-based application that allows students and faculty to submit, manage, and resolve complaints efficiently. The system provides options for students to file complaints with selected recipients (Faculty, Principal, or All), and also allows faculty members to escalate complaints to the principal. The platform supports feedback and resolution submissions by the faculty and principal.

## Features

- **Student Complaint Filing**: Students can file complaints and select recipients (Faculty, Principal, or All).
- **Faculty Complaint Submission**: Faculty can escalate complaints to the principal and submit complaints directly.
- **Complaint Resolution**: Faculty and the principal can resolve complaints with detailed feedback.
- **User Authentication**: Secure login for students and faculty, ensuring appropriate role access.
- **Photo Uploads**: Users can upload photos as evidence while submitting complaints.

## How to Install

1. Clone the repository from GitHub:
   ```bash
   git clone https://github.com/jainiltailor/College-Complaint-Management-System.git
2. Navigate to the project folder:
   ```bash
   cd complaint-management-system
3. Configure the database connection in config.php
    ```php
    <?php
    // config.php
    $conn = mysqli_connect("localhost", "root", "", "complaint_management");
    ?>
4. Import the database (college_complaint_management_scet.sql) from the db folder into your MySQL database.
5. Start a local server (using XAMPP, WAMP, or similar) and run the project.
