const loginBtn = document.getElementById('login');
const usernameField = document.querySelector('#username');
const passwordField = document.querySelector('#password');

loginBtn.addEventListener('click', userLogin);

const baseURL = 'http://localhost:8080/';

async function userLogin(e){
    e.preventDefault();

    const res = await fetch( baseURL +'login',{
        method: 'POST',
        headers:{
            "content-type": 'application/json'
        },
        body: JSON.stringify({
            username: usernameField.value,
            password: passwordField.value
        })
    })

    if(res.status === 200){
        window.location.assign('http://localhost:5500/client/index.html');
    }
}   