## MRC Studio Operations Management System(New Device Software Setup)

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
- First, you must have Apache set up to run on your laptop.
- Download the PHP file (it's a zip file) at ([PHP7.4Zip](https://windows.php.net/downloads/releases/php-7.4.33-Win32-vc15-x64.zip))
- Unzip your PHP files into the Apache directory (default location C:\Apache24). 
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

Note:If you receive an error pop-up that states "The requested operation has failed", check the Event Viewer in the Control Panel → Administrative Tools and look for errors under "Windows Logs" → Applications to determine the cause.

If there is an error stating that the phpapache2_4.dll file cannot be found, ensure that the file is located where the httpd.conf file is pointing. If the file is in the correct location, you might need to install the .NET Framework 4 Client Profile and/or Visual C++ Redistributable for Visual Studio 2015 (which are required to run all PHP 5.3+ versions). You can download and run the setup files for these components (x86) and attempt to restart Apache through the Apache Monitor once they are installed.

- If you receive no errors, you can verify that PHP is working correctly by creating a new text file named tester.php and saving it in your Apache DocumentRoot (C:/Apache24/htdocs if you used the default setup values for Apache, or your working directory if you changed the location). Add the following code to the tester.php file:

`<?php phpinfo(); ?>`

- Save the tester.php file and open a web browser. Type the following into the address bar: http://localhost/tester.php. If PHP is configured correctly, your browser will display pages of data describing the Apache/PHP configuration on your laptop.


### MySQL and MySQL Worbench
- Go to the following link to download the setup file : ([Mysql-installer](https://opentech.durhamcollege.org/pufferd/webd5201/software/mysql-installer-web-community-5.7.15.0.msi) )
- Double-click on the setup file once it's done downloading.
- Click "Yes" when prompted if you want to update the Installer.
- Accept the GNU license agreement by selecting the "I accept the license terms" option and clicking "Next".
- The installer will verify that your laptop has all the required software pre-loaded to make the MySQL server and its tools work. If you're missing the NET Framework 4 Client Profile and/or Visual C++ Redistributable for Visual Studio 2013, download and run the corresponding files.
- Select the "Custom Option" when prompted for the "Choosing Setup Type", and then click "Next".
- Under "MySQL Servers -> MySQL Server -> MySQL Server 8.0.21 - X64", select that option and hit the right-arrow to push that product into the "Products/Features to be installed". Do the same under "Applications -> MySQL Workbench -> MySQL Workbench 8.0 -> MySQL Workbench 8.0.21 - X64". When both components are in the right-hand frame, click "Next".
- If you have a path conflict with the default file locations, you might already have a version of MySQL loaded on your laptop. If this is the case, you might want to back out of the install and re-assess if you need to load MySQL. If this is leftover from removing a previous version of MySQL, click "Next", and then click "Yes" on the warning pop-up.
- On the Installation form, click "Execute". The products selected will begin to download and then install. This should take about a minute and requires that you keep your laptop connected to the web while it occurs.
- On the Product Configuration form, click "Next".
- On the Type and Networking form, accept the default values (TCP/IP on Port 3306 and "Open Firewall port for network access"), and then click "Next".
- Enter a password and confirm it. Remember what you made the password, as it will be required to connect to the MySQL database service through the workbench.
- On the Windows Service form, accept the default values ("Configure MySQL Server as a Windows Service", Windows Service Name of "MYSQL80", and "Start the MySQL Server at System Startup" with "Standard System Account" toggled), and then click "Next".
-On the Plugins and Extensions form, do not select anything, and then click "Next".
-On the Apply Server Configuration form, click "Execute". Click "Finish". Click "Next", leave "Start MySQL Workbench after Setup", and then click "Finish". The MySQL Workbench should open.

Notes: If you encounter the error message "MySQL install taking longer than expected..." and your server fails to start, there are a few steps you can take to resolve the issue. Firstly, you need to uninstall both the MySQL Server and Workbench. After that, navigate to your Control Panel, then Administrative Tools, and Services. From there, turn off the "Windows Firewall". Once you've completed these steps, restart the installation process and accept the prompt to use the upgraded installer.

However, if the above step still does not work, you can try opening a Windows DOS window as an administrator by running cmd.exe. Then, navigate to your MySQL bin folder by typing "cd C:\Program Files\MySQL\MySQL Server X.X\bin" (replace X.X with your MySQL version). Finally, run the command "mysqld --initialize". If you are still experiencing issues, open your php.ini file and uncomment the line ";extension=php_pdo_mysql.dll" (remove the semicolon before the word extension). After saving the changes, try restarting the MySQL server.

- Open your php.ini file, and find the line that states:

;extension=pdo_mysql

(approximately line 886) and uncomment it. i.e. remove the semi-colon ( ; )

- Save the php.ini file.


### Visual Studio Code
- Go to the official Visual Studio Code website at https://code.visualstudio.com/.
- Click on the "Download for Windows" button, which will download the VS Code installer for Windows.
- Once the installer is downloaded, locate it in your Downloads folder or wherever you saved it, and double-click on it to start the installation process.
- A security warning may appear asking if you want to allow the installer to make changes to your device. Click "Yes" to continue.
- Read the license agreement, and if you agree to the terms, click the checkbox next to "I accept the agreement" and then click "Next".
- Choose the installation location where you want to install VS Code. By default, it is installed under C:\Users{Username}\AppData\Local\Programs\Microsoft VS Code. You can also choose to add VS Code to your PATH environment variable, which will allow you to easily run it from the command prompt. Click "Next" to continue.
- Choose the start menu folder where you want to add a shortcut for VS Code, and click "Next".
- Choose whether you want to create a desktop icon for VS Code, and click "Next".
- Click "Install" to begin the installation process. This will only take a minute.
- Once the installation is complete, you can choose to launch VS Code by clicking the checkbox next to "Launch Visual Studio Code" and then clicking "Finish". If you don't want to launch it right away, simply uncheck the box and click "Finish".


