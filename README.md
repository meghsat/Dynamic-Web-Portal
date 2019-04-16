# website-on-local-host-XAMPP-usingCSSandPHP
my website was build on localhost using XAMPP with key specifications like-- CAPTCHA, sending an OTP and  link to G-MAIL if user requested for password change and 

👉✌👉kindly please read this entire document to get clarity on what my website can do

🤞 in order to make this website you need the following softwares::
1. XAMPP is enough since it contains the APACHE, MYSQL inbuilt
2. text editor like notepad++/sublime text/atom etc..,



👍👍things you should know before diving into the website-->

1. this website is build on a localhost using XAMPP:XAMPP stands for Cross-Platform (X), Apache (A), MariaDB (M), PHP (P) and Perl (P)

APACHE-->> Apache is the most widely used web server software. a web server is the software that receives your request to access a web page. It runs a few security checks on your HTTP request and takes you to the web page. Depending on the page you have requested, the page may ask the server to run a few extra modules while generating the document to serve you. It then serves you the document you requested.

PHP --->> The PHP Hypertext Preprocessor (PHP) is a programming language that allows web developers to create dynamic content that interacts with databases. PHP is basically used for developing web based software applications.


😍🤩🤩THINGS THIS WEBSITE CAN DO:
1. contains a registering page where you should register your details there are some mandatory limitations for password( it should be containing special characters and numbers) and phonenumber(must contain 10 digits).
2. later a login page will be arrived, there you have to enter your credentials and even the CAPTCHA it will raise errors if you enter any wrong credentials accordingly.
3.there will be forgot password option in the login page, if you click there it will redirect you to a new page where you have to give your email id. then a link will be sent to you email to reset your password 😍" THIS LINK WILL EXPIRE WITHIN 24 HOURS😍".
4.🤩😃IF YOU ENTER WRONG PASSWORD FOR THREE TIMES IT WILL SEND A CONFIRMATION MAIL TO YOU
5. if the user logins for 3 times he will recieve OTP for confirmation..
4. if you follow the link it will direct you to a new page where you have to give your email id and a new password.

👉👉☺☺☺follow the below steps to make the website work--->

i attached all the codes, all you need is to run them in order

what does each code do:
1. REGISTER -> generates a registration page and if you are already registered then there will be a link that takes you to login page
2. LOGIN -> generates a login page where you have to enter your credentials.
3. INDEX -> once you entered your credentials you will be directed to a new welcome index page here, you can logout by killing the session.
4. ERRORS -> all the error combinations like 
                                            a. empty username, emails etc..
                                            b. entered passwords not matching.
                                            c. trying to register again with an already existing username or email
5. CAPTCHA -> helps to generate a new password everytime when ever the page reloads 
6. MAILFORNEWPASSWORD -> whenever you click "forgot password" in login page it will redirect you to this page where you have to enter your email address to recieve the link to set a new password
7. NEWPASSWORD -> this page arrises when you click the link that came to your email this allows you to reset your password
8. SENDMAIL -> this contains the recievers e-mail id who requested for password reset , and the link of the passwowrd reset page.
9. SERVER -> this contains all the server related part like
                                            a. retrieving data, inserting new users data.
                                            b. error checking.
10. style_new3 -> contains all the CSS part. 
11. CONGRATS NEW REGISTER --> when ever a new user registers this page will arise greeting you for new registration.
12. LINKEXPIRE --> the password resetting link that was send to your mail will expire after 24 hrs.
13. MAIL_SUSPECTSENT --> whenever the user enters wrong password for more than 3 times this page will be arrived and asks you to enter the email that was used during registration to send you the "confirmation link "
14. SENDMAIL_SUSPECTENTRY --> after giving your e-mail in suspect entry page this page sends an e-mail for confirmation.


STEPS TO FOLLOW IN ORDER:
step1-> download xampp and a text editor
step2-> first run the register code using -- localhost/websiteproject/register.php
