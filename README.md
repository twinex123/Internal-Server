<h1 style="text-align: center; font-family: Helvetica; margin-top: 10px; border: 1px solid black; padding: 20px 30px; border-radius: 15px;">Internal Server Website</h1>
<h2 style="margin-left: 10px;">By Twinex &copy; 2022</h2>
<br>
<h4>Features:</h4>
<ul style="list-style-type: none; font-size: 20px;">
    <li>Planning</li>
    <li>News</li>
    <li>Administration Page</li>
    <li>Search disponibility for each user</li>
</ul>
<br>
<h2>Administration</h2>
<p style="margin-top: 10px;">
Username : admin
Password : admin
Keyword  : Yes

WARNING : After the first connection, change this.
<br>
Place the folder InternalServer into localhost, then, activate mysql and apache, 
go on phpmyadmin, create database planning and "dej". Insert sql files into each database => readme/planning.sql and => readme/dej.sql
Paste this line into the sql console to add admin account :
<br>
INSERT INTO `users`(`username`, `email`, `password`, `job`, `admin`) VALUES ('admin','','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Administrator','Yes')
<br>
You have to connect with a specific account who has admin permissions.<br>On the admin page, you can see the list of users who are registered. You can search their disponibility that they have informed in advance on the schedule. <br>You can post article that everyone can sees with the little icon on the right of the title (admin page). Cookie will be created when you're connecting for the first time on the admin page. Next time you just need to fill in the keyword. The keyword is shown on the admin page. You can't modify it. You can modify the name of the server on the admin page's navbar.</p>
<br>
<h2>Users</h2>
<p style="margin-top: 10px;">You need to create an account and login, but if you are already registered (by an admin), just connect. You can change your password, delete your account and more. Enter your job in the admin page. The website uses cookies to help you; click on the "Remember me" when you're connecting, and a cookie will be create, indicate that you don't have to login to access on the website. </p>#   P e r s o n n a l - M a n a g e m e n t  
 