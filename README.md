# SD-3101 [Medical Appointment System]

![Medical Appointment System](<Screenshots/Screenshot (1).png>)

## Table of Contents
- [Introduction](#introduction)
- [Project Overview](#project-overview)
- [Objectives](#objectives)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Setup and Installation](#setup-and-installation)
- [Usage Instructions](#usage-instructions)
- [Project Structure](#project-structure)
- [Contributors](#contributors)
- [Chagelog](#changelog)
- [Acknowledgments](#acknowledgments)
- [License](#license)

---

## Introduction
  This Medical Appointment System is a streamlined web-based solution designed to facilitate e-channeling for medical appointments using PHP, HTML, and CSS. This innovative system enables clients or patients to request appointments online with medical establishments, including clinics and hospitals. It also assists doctors in managing their schedules efficiently.

  The system organizes patient appointments by allowing them to submit requests to their chosen doctors. It features three primary roles: administrator, doctor, and patient. The system administrator is responsible for listing doctors, their specialties, and managing system credentials. Patients can browse the website to find doctors based on their specialties, review their weekly schedules, and select suitable appointment times. Doctors can then view and manage their appointments and patient requests seamlessly.

## Project Overview
**Background**
```bash
This Medical Appointment System is a web-based project developed to streamline the process of scheduling medical appointments. Utilizing PHP, HTML, and CSS, this system was created to address the inefficiencies and inconveniences associated with traditional appointment booking methods. By digitizing the appointment process, this system aims to enhance the overall experience for both patients and healthcare providers.
```
**Target Audience**

The primary users of this Medical Appointment System include:
```bash
-Patients: Individuals seeking medical consultations who can benefit from the convenience of online appointment scheduling.

-Doctors: Medical professionals who need an organized system to manage their appointments and patient interactions.

-Administrators: Personnel responsible for maintaining the system, updating doctor information, and managing user credentials.
```
**Real-World Applications**

This Medical Appointment System has several practical applications:
```bash
Clinics and Hospitals: Medical establishments can implement Edoc to offer their patients a seamless appointment booking experience.

Private Practices: Individual doctors or small practices can use Edoc to manage their schedules more efficiently.

Healthcare Networks: Larger healthcare networks can integrate Edoc to provide a unified appointment system across multiple facilities.
```
**Potential Impact**

The implementation of this system can lead to significant improvements in the healthcare sector:
```bash
Enhanced Patient Experience: Patients can easily find and book appointments with doctors that meet their specific needs, reducing wait times and improving satisfaction.

Improved Efficiency: Doctors can manage their schedules more effectively, leading to better time management and increased productivity.

Administrative Ease: System administrators can effortlessly update and maintain doctor information, ensuring that the system remains current and accurate.
  
This Medical Appointment System represents a step forward in the digital transformation of healthcare, offering a practical solution to modernize and optimize the appointment scheduling process.
```
## Objectives
The main objectives are:
```bash
- To develop a solution for inefficient appointment scheduling: Create a web-based system that simplifies and streamlines the process of booking medical appointments for patients and managing schedules for doctors.
```
```bash
-To implement features to enhance user experience: Integrate functionalities such as appointment request submission, and schedule management to ensure a user-friendly interface for patients, doctors, and administrators.
```
## Features
```bash
Admin
  -Admin can add doctors, edit doctors, delete doctors
  -Schedule new doctors sessions, remove sessions
  -View patients details
  -View booking of patients
```
```bash
Doctors
  -View their Appointment
  -View their scheduled sessions
  -View details of patients
  -Delete account
  -Edit account settings
```
```bash
Patients(Clients)
  -Make appointment online
  -Create accounts themselves
  -Delete account
  -Edit account settings
```
## Technologies Used

Technologies used in the project are:
```bash
- Programming Languages: PHP,HTML,CSS
- Databases: MySQL
- Other Tools: XAMPP,phpMyAdmin
```
## Setup and Installation
Follow these step-by-step instructions to set up the project locally:

1.Clone the Repository:
```bash
git clone https://github.com/HashenUdara/edoc-doctor-appointment-system-main/
```
2.Start XAMPP:
```bash
Open your XAMPP Control Panel.

Start the Apache and MySQL services.
```
3.Extract the Source Code:
```bash
Extract the downloaded source code zip file.
```
4.Move the Source Code:
```bash
Copy the extracted source code folder.

Paste it into the XAMPP’s htdocs directory.
```
5.Set Up the Database:
```bash
Open your browser and navigate to PHPMyAdmin.

Create a new database named edoc.
```
6.Import the SQL File:
```bash
In PHPMyAdmin, select the edoc database.

Import the provided SQL file (DATABASE edoc.sql) located inside the source code root folder.
```
7.Access the Application:
```bash
Open your browser and navigate to Doctor’s Appointment System.
```
By following these steps, you should have the project up and running on your local machine. 

## Usage Instructions

To access the application use this information:

**Admin Dashboard**

![Admin Dashboard](<Screenshots/Screenshot (3).png>)

```bash
Email: admin@edoc.com

Password: 123
```
**Doctor Dashboard**

![Doctor Dashboard](<Screenshots/Screenshot (6).png>)

```bash
Email: doctor@edoc.com

Password: 123
```
**Patient Dashboard**

![Patient Dashboard](<Screenshots/Screenshot (9).png>)

```bash
Email: patient@edoc.com

Password: 123
```

## Project Structure

```bash
.
└── edoc-doctor-appointment-system-main/
    ├── admin/
    │   ├── add-new.php
    │   ├── add-session.php
    │   ├── appointment.php
    │   ├── delete-appointment.php
    │   ├── delete-doctor.php
    │   ├── delete-session.php
    │   ├── doctors.php
    │   ├── edit-doc.php
    │   ├── index.php
    │   ├── patient.php
    │   └── schedule.php
    ├── ccs/
    │   ├── fonts/
    │   │   └── inter
    │   ├── admin.ccs
    │   ├── animations.ccs
    │   ├── font-inter.ccs
    │   ├── index.ccs
    │   ├── login.ccs
    │   ├── main.ccs
    │   ├── patient.ccs
    │   └── signup.ccs
    ├── doctor/
    │   ├── appointment.php
    │   ├── delete-appointment.php
    │   ├── delete-session.php
    │   ├── doctors.php
    │   ├── edit-doc.php
    │   ├── index.php
    │   ├── patient.php
    │   ├── schedule.php
    │   └── settings.php
    ├── img
    ├── patient
    ├── Screenshots
    ├── connection.php
    ├── create-account.php
    ├── index.html
    ├── LICENSE.txt
    ├── login.php
    ├── logout.php
    ├── README.md
    ├── SECURITY.md
    ├── signup.php
    └── SQL_Database_edoc.sql
```

## Contributors

List all the team members involved in the project. Include their roles and responsibilities:

- **Jericho Lintija**: Lead Developer, Backend Developer
- **Grace Villanueva**: Frontend Developer, UI/UX Designer
- **Gerald Villaran**: Project Manager, Tester

## Project Timeline

Outline the project timeline, including milestones or deliverables. Example:

- **Week 1-2**: Collaborative Barainstorming for Feature Development

  - September 15, 2024
  - Meeting Recording: https://youtu.be/-joPkUy2A9s
  - Proposes Features

    - Profile Picture Upload
    - Show Medical History
    - Group Doctors by Specialty
    - Group Doctors by Specialty
    - Display Doctor Consultation Fees Upfront
    - Option to Save Appointment Details as PDF
    - Downloadable Prescription After Consultation
    - Document Upload
    - Feedback
    - Health Calculator


- **Week 3-5**: Design and setup.
- **Week 6-10**: Implementation.
- **Week 11-12**: Testing and debugging.
- **Week 13-14**: Final presentation and documentation.

## Changelog

### [Version 1.0.0] - 2024-09-07
- Initial release of the project.
- Added basic functionality for [Feature 1], [Feature 2], and [Feature 3].

### [Version 1.1.0] - 2024-09-14
- Improved user interface for [Feature 1].
- Fixed bugs related to [Feature 2].
- Updated project documentation with setup instructions.

## Acknowledgments


This project was built from [Open Source Doctor Appointment Booking System using PHP](https://github.com/HashenUdara/edoc-doctor-appointment-system), created by HashenUdara. You can view the original repository [here](https://github.com/HashenUdara/edoc-doctor-appointment-system).

## License

MIT License
