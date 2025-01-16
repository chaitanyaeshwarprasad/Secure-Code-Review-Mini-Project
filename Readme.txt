# Secure-Code-Review-Mini-Project

## Overview

This project involves a secure code review and configuration process, where a practical lab was developed and made available to subscribers. The lab includes testing for vulnerabilities such as SQL Injection and Cross-Site Scripting (XSS), followed by the identification and fixing of the issues. The development stack includes HTML, PHP, and MySQL, with tools such as XAMPP and Sublime Text used for building and editing the code.

## Introduction

This project is a practical exercise that demonstrates how to secure web applications by reviewing and fixing code vulnerabilities. The focus is on identifying common vulnerabilities such as SQL Injection and XSS and applying fixes to make the application secure.

## Technologies Used

- **HTML**: Frontend of the application
- **PHP**: Backend logic for user authentication and interaction with the database
- **MySQL**: Database used for storing user information
- **XAMPP**: Local development environment for running the project on your machine
- **Sublime Text**: Code editor for developing and editing the project


This project involved a secure code review and configuration process, where a practical lab was created from scratch and made available to subscribers. It included testing for vulnerabilities, followed by fixing the issues identified. The lab was developed using HTML, PHP, and MySQL, with tools such as XAMPP and Sublime Text.

Create the database ----> acep ----> import the acep.sql

SQL Injection
Bypass Statements
Username: admin' OR '1'='1
Password: anything

XSS
<script>alert(1)</script>

