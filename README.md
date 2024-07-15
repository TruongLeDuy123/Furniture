# 1. INSTALLING REQUIRED ENVIRONMENTS

*Note: The installation guide below is applicable for the Windows operating system.*

## 1.1 Install XAMPP - Including Apache, PHP, MySQL

1. Download and install the XAMPP software package from [XAMPP Installers and Downloads](https://www.apachefriends.org/index.html).

2. After installation, open the XAMPP Control Panel to manage services.

![XAMPP](https://github.com/TruongLeDuy123/Furniture/blob/main/readme%20source/img/xampp1.png)

3. The XAMPP Control Panel will display services such as:

   - **Apache:** Web server service.
   - **MySQL:** Database management system.
   - (Other services if available).
4. Start Apache and MySQL through the XAMPP Control Panel (Actions Start on the XAMPP Control Panel).

5. Open a web browser and check the URL http://localhost:3000.

![XAMPP](https://github.com/TruongLeDuy123/Furniture/blob/main/readme%20source/img/xampp2.png)
**Note:** Adjust the port according to your device.

## 1.2 Install Composer

1. Download and run the Composer-Setup.exe file to install Composer on your computer via the link: [Composer](https://getcomposer.org/)

2. After installation, check the installation via the Windows Command Line or Git Bash with the command 'composer'.

![Composer Installation Success](https://github.com/TruongLeDuy123/Furniture/blob/main/readme%20source/img/composer1.png)
*Composer Installation Success*

## 1.3 Install Related Extensions on VS Code

Install 2 PHP support extensions for VS Code as follows:

![Extension](https://github.com/TruongLeDuy123/Furniture/blob/main/readme%20source/img/extension1.png)
![Extension](https://github.com/TruongLeDuy123/Furniture/blob/main/readme%20source/img/extension2.png)

# 2. SETUP PROJECT AND RUN
## 2.1. Setup Project:
### 2.1.1. Setup Data on MySQL via XAMPP

In the XAMPP Control Panel, run the Admin mode of MySQL after 'starting' MySQL by clicking the Admin button on the XAMPP Control Panel.

![](https://github.com/TruongLeDuy123/Furniture/blob/main/readme%20source/img/xampp3.png)

On the browser, with the URL localhost, the screen will appear as follows:

![](https://github.com/TruongLeDuy123/Furniture/blob/main/readme%20source/img/phpadmin1.png)

Create a new database with the following steps:
1. Select New, then enter the database name and choose Create to create a new Database.

![](https://github.com/TruongLeDuy123/Furniture/blob/main/readme%20source/img/phpadmin2.png)

2. After successfully creating the database, select the SQL item on the taskbar to import the data file downloaded from the link: [oneDrive_IS207.O12_Nhom15](https://uithcm-my.sharepoint.com/:u:/g/personal/20521825_ms_uit_edu_vn/EbVoMIbxcWhPlCmj7U7OFAUBhdubm-MLDvPNPu8HNg6ghA?e=gyxTUn), or access the link (https://uithcm-my.sharepoint.com/:u:/g/personal/20521825_ms_uit_edu_vn/EbVoMIbxcWhPlCmj7U7OFAUBhdubm-MLDvPNPu8HNg6ghA?e=gyxTUn) if an error occurs. Then, select Go to execute the SQL commands.

![](https://github.com/TruongLeDuy123/Furniture/blob/main/readme%20source/img/phpadmin3.png)

The database, after being successfully imported, will have a structure with 13 tables as follows:

![](https://github.com/TruongLeDuy123/Furniture/blob/main/readme%20source/img/phpadmin4.png)

### 2.1.2. Setup Source Code of the Project

Clone the project from the team's Github Repository: [IS207.O12_Nhom15](https://github.com/TruongLeDuy123/Furniture)

![](https://github.com/TruongLeDuy123/Furniture/blob/main/readme%20source/img/setup1.png)

## 2.2. Run the Web Application

In the VS Code Terminal, run the command 'php artisan serve' to start running the web application. The URL of the web application when started will be displayed on the terminal. Hold down the Ctrl key and click on the URL to open the web application in the browser.

![](https://github.com/TruongLeDuy123/Furniture/blob/main/readme%20source/img/setup2.png)

The web application after starting:

![](https://github.com/TruongLeDuy123/Furniture/blob/main/readme%20source/img/web1.png)

Switching between admin and customer interfaces is done by logging in. On the landing page, select the user icon to go to the login page. If the user logs in with an admin account, the web application will go to pages specific to the admin role. If the user logs in with a customer account, the web application will continue in the customer role.

![](https://github.com/TruongLeDuy123/Furniture/blob/main/readme%20source/img/web2.png)

Here is the screen when the user is in the admin role after logging in with an admin account:

![](https://github.com/TruongLeDuy123/Furniture/blob/main/readme%20source/img/web3.png)

# 3. SYSTEM LOGIN ACCOUNTS
## 3.1. Admin Accounts

| Login Email | Password | 
|-------|-------|
| tthieu@gmail.com | 20520508 | 
| tnmphuong@gmail.com | 20521779 |
| dtquynh@gmail.com | 20521825 | 
| ldtruong@gmail.com | 20522083 | 

## 3.2. Customer Accounts

| Login Email | Password | 
|-------|-------|
| nga.duongtthu@gmail.com | 12345678 | 
| ngoxuanbinh54@gmail.com | 12345678 |
| phuong@ptcrance.com.vn | 12345678 | 

# 4. SUMMARY OF FUNCTIONS IN PROJECT
## 4.1. Customer’s Function:
-	Login and Register.
-	Display outstanding information including: product categories, best-selling products.
-	Displays a list of available store products, including functions such as lookup, filtering, classification, etc...
-	Display product details, and a list of similar products.
-	Display shopping and staff information.
-	Display the customer's shopping cart.
-	Display bill details before payment and select promotions.
-	Payment with Paypal.
-	Display user information, function to update user profile, change password, view order information and log out of the system.
-	The contact between admin and users using chatbot.
## 4.2. Admin’s Function:
-	Login.
-	Product information management: show, create, detail, edit, delete.
-	Customer information management:  show, detail.
-	Staff information management: show, create, detail, edit, delete.
-	Promotion information management: show, create, detail, edit, delete.
-	Bill information management: show, detail, edit, export bill list to excel
-	Represent shopping revenue through a chart.
-	The contact between admin and users using chatbot.

# Video demo

Access to this (https://drive.google.com/file/d/10LEg-9Zi3JUrQN0ggkx_7EELY5or9j0O/view?usp=sharing) for our demo
