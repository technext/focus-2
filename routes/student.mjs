import express from "express";
import session from 'express-session';
const router = express.Router();
import db from "../db/connection.mjs";
import crypto from 'crypto';
import bcrypt from 'bcrypt';


router.get("/dashboard" ,(req,res)=>{
    const Menu = [
        {
            "Menu" : [
                {
                    Title : "Main Menu",
                    Class : "nav-label first",
                    Dropdown : "Home",
                    Icon : "icon icon-single-04",
                    Subitem : [
                        { Name : "Dashboard", Route : "dashboard"}
                    ]
                },
                {
                    Title : "Events Manager",
                    Class : "nav-label",
                    Dropdown : "Events",
                    Icon : "icon icon-form",
                    Subitem : [
                        { Name : "List View", Route : "eventslist"},
                        { Name : "Calendar View", Route : "calendar"}
                    ]
                },
            ]
        }
    ]
    res.render('./students/dashboard',{
        path: "student",
        Menu : Menu
    });
});
router.get("/" ,(req,res)=>{
    res.render('./students/index');
});

router.post('/login', function(request,response){
    
    //names of the input text fields in the views/index.ejs
    const username = request.body.username;
    const password = request.body.password;
    // Query the MySQL database for the student user record
    const query = 'SELECT userID,password,salt FROM userstudents WHERE sr_code = ?';
    db.query(query,[username], function(error,result){
         // If the user is found, return the user's record
        if (result.length > 0) {
            //checking of password and salt
            for(var passCount = 0; passCount < result.length; passCount++){
                const salt = result[passCount].salt;
                const passwordHash = password+salt;
                const dbPassword = result[passCount].password;
                const has = crypto.createHash('sha256');
                // Update the hash with the data
                has.update(passwordHash);
                // Calculate the hexadecimal hash
                const hashedSaltAndPass = has.digest('hex')
                if (dbPassword == hashedSaltAndPass) {
                    console.log("Login Successful!!!");
                    response.redirect("dashboard");
                } else {
                    //Start of debugging of SHA
                    console.log("Wrong Password");
                }
            }
        }else{
            console.log("Wrong email or No emails found")
            console.log(error);
        }
        response.end();
        }); 
  });
export default router;