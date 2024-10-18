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
    $conn = mysqli_connect("localhost", "root", "", "college_complaint_management_scet");
    ?>
4. Import the database (college_complaint_management_scet.sql) from the db folder into your MySQL database.
5. Start a local server (using XAMPP, WAMP, or similar) and run the project.

# New User Login
![New_User_Login](https://github.com/user-attachments/assets/6bc34a9f-565e-426c-bc38-5f02ab3a2f97)

# Login Principal
![Index_Principal](https://github.com/user-attachments/assets/43dce9f3-cff0-4dd0-a2e5-0ef93bb43194)

# Login Faculty
![Index_Faculty](https://github.com/user-attachments/assets/fa853240-5baf-40b3-9cb7-67aa185eaa46)

# Login Student
![Index_Student](https://github.com/user-attachments/assets/d033b19b-3a41-4f8c-a582-63cd205a80bd)

# Dashboard Principal
![Principal_Dashboard](https://github.com/user-attachments/assets/98c72a9f-3d87-42fc-ba33-b35570ba25b8)

# Dashboard Faculty
![Faculty_Dashboard](https://github.com/user-attachments/assets/0408dfc0-14be-4cb4-bd88-29f57dc45aa3)

# Dashboard Student
![Student_Dashboard](https://github.com/user-attachments/assets/774ef635-811d-4607-bb6b-93c505069c0a)

# Profile Principal
![Principal_Profile](https://github.com/user-attachments/assets/cf27db01-9756-4aea-b2da-c3e990b575aa)

# Profile Faculty
![Faculty_Profile](https://github.com/user-attachments/assets/0e0f133b-de2f-4805-90ee-65375f4f65cb)

# Profile Student
![Student_Profile](https://github.com/user-attachments/assets/94bfc87c-7b9e-49a7-91f3-d84f93917273)

# Sample Profile
![Sample Complaint](https://github.com/user-attachments/assets/cc5ab1bc-1344-40db-934d-be026f70803f)

# Complaint Process Student Side
![Complaint_Status_Interface_Student](https://github.com/user-attachments/assets/c601a31f-3d13-4358-9227-9d9bd4b7c0f7)

# Complaint Process Faculty Side
![Complaint_Status_Interface_Faculty](https://github.com/user-attachments/assets/8642f879-6e75-4444-9f28-663fa99f1a8e)
