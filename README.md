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
- Download the Apache 2.4 setup file ([Apache2.4downloadfile](https://www.apachelounge.com/download/VS17/binaries/httpd-2.4.57-win64-VS17.zip)) and save it to your computer.
- Unzip the Apache archive *.zip into the root of C:. This should make a C:\Apache24 folder.
- Open the httpd.conf file located at C:\Apache24\conf\httpd.conf with a text editor such as Notepad++.
- Find the line that defines the ServerRoot of your Apache24 folder (approx line 37), and change it to where you unzipped the file from the default "c:/Apache24".
- Save and close the file.
- Open a Windows command line as an Administrator, and change directory into your Apache24\bin directory. Run the command: httpd.
- Open up your browser of choice and type into the address bar: http://localhost or http://127.0.0.1. The browser should show a welcome page "It works!". If so, Apache is on your laptop and running.

Note: If you encounter a missing *.dll error when attempting to start the Apache server/monitor stating, "The Program can't start because MSVCR110.dll is missing from your computer. Try reinstalling the program to fix this problem," you need to download the Microsoft Visual C++ Redistributable 2010 and run it as an administrator on your laptop.

### PHP7.4 or higher
- First, you must have Apache set up to run on your laptop since PHP is a server-side programming language that requires a web server to process any *.php files.
- Download the PHP file (it's a zip file) at ([PHP7.4Zip](https://windows.php.net/downloads/releases/php-7.4.33-Win32-vc15-x64.zip))
- Unzip your PHP files into the Apache directory (default location C:\Apache24). While the php folder doesn't have to be in the Apache directory, it's easier to locate the files for future configuration changes if you place it there.
- To simplify the folder name, you can change the full PHP folder name (including the version number and the O/S it's created for) to just "php". This will make the configuration easier (less chance for typos).
- Go into the php folder and make a copy of php.ini-development and rename it to php.ini.
- Find the line in php.ini that states ";extension=mbstring" and uncomment it by removing the semicolon (;).
- Find the line in php.ini that sets the extension_dir, uncomment it, and set it to the location of the ext folder in your php folder. For example, if you unzipped and renamed the PHP to a php folder in C:\Apache24, this section should look like: extension_dir = "C:\Apache24\php\ext".
- Restart your Apache server.
- Open the httpd.conf file in the Apache24/conf folder in a text editor and find the line that shows "DirectoryIndex index.html". Change it so that it states "DirectoryIndex index.php index.html".
- Go to the bottom of the file and add the following lines:

PHPIniDir "YOUR_FILE_STRUCTURE"

LoadModule php7_module "YOUR_FILE_STRUCTURE/php7apache2_4.dll"

AddType application/x-httpd-php .phtml .php

AddType application/x-httpd-source .phps


- "YOUR_FILE_STRUCTURE" is your file structure and must be modified to where you unzipped the PHP files. For example, if you unzipped and renamed the PHP (to a php folder in C:\Apache24), the above section should look like:

PHPIniDir "C:\Apache24\php"

LoadModule php7_module "C:\Apache24\php\php7apache2_4.dll"

AddType application/x-httpd-php .phtml .php

AddType application/x-httpd-source .phps


- Start the Apache Monitor (ApacheMonitor.exe) if it's not already started.

- Save the httpd.conf file and restart the Apache server using the Apache Monitor.
