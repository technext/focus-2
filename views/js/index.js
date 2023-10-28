const loginBtn = document.getElementById('login');
const adminLoginBtn = document.getElementById('login');
const usernameField = document.querySelector('#username');
const passwordField = document.querySelector('#password');

loginBtn.addEventListener('click', UserLogin);

const baseURL = 'http://localhost:8080/';

async function UserLogin(e){
    e.preventDefault();

    const LoginResponse = await fetch('/login',{
        method: 'POST',
        headers:{
            "content-type": 'application/json'
        },
        body: JSON.stringify({
            username: usernameField.value,
            password: passwordField.value
        })
    })

    if(LoginResponse.status === 200){
        window.location.assign('/student');

            const StudentResponse = await fetch('/student', {
                method: 'GET',
                headers: {
                    "Content-Type": 'application/json'
                }
            });

    }
}       