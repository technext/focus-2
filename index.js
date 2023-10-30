import express from "express";
import cors from "cors";
import { fileURLToPath } from 'url';
import path from 'path';

import db from "./db/connection.mjs";
import studentRouter from "./routes/student.mjs";
import adminRouter from "./routes/admin.mjs";
import modRouter from "./routes/moderator.mjs";
const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const app = express();
app.use(express.json());
app.use(cors());
app.set(express.static(path.join(__dirname,'views')));
app.use(express.static(path.join(__dirname,'public')));




app.set("view engine","ejs")

app.use("/admin",adminRouter);
app.use("/moderator",modRouter);
app.use("/student",studentRouter);




app.get('*', (req, res, next) => {
    const requestedURL = req.url;
    const error = new Error('Wrong URL ' + requestedURL + " is not existent");
    error.status = 404; // You can set the status to 404 or any other appropriate status code.
    next(error); // Pass the error to the error-handling middleware.
});
app.use((err, req, res, next) => {  
    res.status(err.status || 500).send(err.message);
});


// Development mode delete if done
app.post("/login",(req,res)=>{

    const {username,password,usertype} = req.body;

    const cmd = "SELECT userID FROM userstudents WHERE sr_code= ? AND password= SHA2(CONCAT( ? , salt),256);";
    db.query(cmd, [username,password], (err,data)=>{
        if(err) return res.json(err);
        if(data.length === 0) res.status(401).send('Unauthorized');
        res.status(200).json(data);
    });
});

// Development mode delete if done






const port = 8080;
app.listen(port, ()=> console.log(`Server is up on ${port}`))