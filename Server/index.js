import express from "express";
import cors from "cors";
import mysql from "mysql2";


const app = express();
app.use(express.json());
app.use(cors());

const db = mysql.createConnection({
    host:"localhost",
    user: 'root',
    password: '',
    database: "db_nt3102"

})

app.post("/login", (req,res) =>{

    const { username, password } = req.body;
    //console.log(`${username}, ${password}`);
    const sql = "SELECT * FROM userstudents where sr_code = ? and password = SHA2(CONCAT( ? ,salt),256)";

    //res.send(sql);
    db.query(sql,[username, password],(err,data)=>{
            if(err) return res.json(err);

            if(data.length === 0){
                return res.status(401).send('Login failed'); // User not found
            }

            return res.json({ message: 'Login successful' });

           
            
    });

});


const port = 8080;
app.listen(port, ()=> console.log(`Server is up on ${port}`))