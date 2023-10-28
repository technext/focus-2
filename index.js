import express from "express";
import cors from "cors";
import mysql from "mysql2";
import { fileURLToPath } from 'url';
import path from 'path';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const app = express();
app.use(express.json());
app.use(cors());
app.use(express.static(path.join(__dirname,'views')));

const db = mysql.createConnection({
    host:"localhost",
    user: 'root',
    password: '',
    database: "db_nt3102"

});

app.set("view engine","ejs")

app.get("/student",(req,res)=>{
    res.render('index');
})

const port = 8080;
app.listen(port, ()=> console.log(`Server is up on ${port}`))