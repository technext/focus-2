import express from "express";
import cors from "cors";
import { fileURLToPath } from 'url';
import path from 'path';

import db from "./db/connection.mjs";
const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const app = express();
app.use(express.json());
app.use(cors());
app.set(express.static(path.join(__dirname,'views')));
app.use(express.static(path.join(__dirname,'public')));




app.set("view engine","ejs")

app.get("/admin",(req,res)=>{
    res.render('./admin-moderator/index',{
        usertype: "Administrator" //DON'T REMOVE
    });
   
});
app.get("/moderator",(req,res)=>{
    res.render('./admin-moderator/index',{
        usertype: "Moderator" //DON'T REMOVE
    });
   
});
app.get("/student",(req,res)=>{
    res.render('./students/index');
});

app.post("/login",(req,res)=>{


})

const port = 8080;
app.listen(port, ()=> console.log(`Server is up on ${port}`))