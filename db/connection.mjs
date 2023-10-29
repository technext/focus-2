import mysql from "mysql2";

const connection= mysql.createConnection({
    host:"localhost",
    user: 'root',
    password: '',
    database: "db_nt3102"

});

export default connection;