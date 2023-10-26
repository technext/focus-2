var http = require('http');
var fs = require('fs');
const path = require('path');
const express = require('express');
const app = express();




app.use(express.static(__dirname));

app.get('/', function(req, res){
  res.sendFile(path.join(__dirname + '/userLogin.html'));
  res.writeHead(200, {'Content-type' : 'text/css'});
var fileContents = fs.readFileSync('./css/style.css', {encoding: 'utf8'});
res.write(fileContents);

  res.end();

}
);

app.listen(3333);
console.log('Server running at http://127.0.0.1:3333/')
