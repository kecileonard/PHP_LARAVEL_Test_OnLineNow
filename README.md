
## App Description 

The system can be accessed by Users and Admin  .

-Admin role and User role can access their corresponding dashboard pages.  
-The admin can create user roles and also perform CRUD on them .

Admin credentials-   
username: adminleonard or email: adminleonard@gmail.com  
password: 12345678

User cerdentials    
username: userleonard or email: userleonard@gmail.com  
password: 12345678

-The guest users can sign up and after that be redirected to the user dashboard. 

-The Layouts are created using Bootstrap . 

-Admin/CustomAuthController handles the authentication . 
 It's composed by
 Login/Logout and Register sections . 
 These sections  handles authenticating users  for the application and
 redirecting them based on their roles to the user-dashboard or admin-dashboard .
    

-Admin/UserController manage the CRUD operations for users. It handles also the registration roles of new users as well as their validation .  

-Admin/CategoryController handles the category page and can  be accessed only by authenticated users .       
