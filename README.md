## MRC Studio Operations Management System(New Device Setup)

### Description:
The MRC Studio Operations Management System has been developed to assist the studio in managing its projects, personnel, and industry partners. This system has integrated all the information to enable data viewing in the form of queries and reports. Significant inquiries such as the number of students who worked for the MRC Studio in a given year, the number of projects completed within a certain period, the total number of completed VR projects, the number of hours allocated to an employee within a specific month, and the availability of personnel for particular projects can be easily answered through the system.By centralizing the data and making it more accessible and easy to query, the project management efficiency of the studio is expected to improve and consequently lead to better services provided to the industry partners.

### System Requirements:
- Operating System: Windows 10 or higher
- RAM: 4GB or higher
- Disk Space: 500MB or higher
- Web Browser: Google Chrome, Mozilla Firefox, or Microsoft Edge

### Required Software
- Apache2.4
- PHP 7.4 or higher
- MySQL version 8.0 or higher
- MySQL Workbench
- Visual Studio Code.

### Apache2.4
- Download the Apache 2.4 setup file([Apache2.4downloadfile](httpd-2.4.57-win64-VS17.zip))and save it to your computer.
- Unzip the Apache archive *.zip into the root of C:. This should make a C:\Apache24 folder.
- Open the httpd.conf file located at C:\Apache24\conf\httpd.conf with a text editor such as Notepad++.
- Find the line that defines the ServerRoot of your Apache24 folder (approx line 37), and change it to where you unzipped the file from the default "c:/Apache24".
- Save and close the file.
- Open a Windows command line as an Administrator, and change directory into your Apache24\bin directory. Run the command: httpd.
- Open up your browser of choice and type into the address bar: http://localhost or http://127.0.0.1. The browser should show a welcome page "It works!". If so, Apache is on your laptop and running.


