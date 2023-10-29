const usernameField = document.querySelector('#username');
const passwordField = document.querySelector('#password');
const loginBtn = document.getElementById('login');
//Variable for incorrect attempt of password
var loginAttempt = 0;
//getting the usertype
const userType = document.getElementById('loginForm').getAttribute("data-usertype");
loginBtn.addEventListener('click', LoginProcess);
async function LoginProcess(e){

    e.preventDefault();

    //Set Request to /login
    const loginResponse = await fetch('/login',{
        method: 'POST',
        headers: {
            "content-type": 'application/json'
        },
        body: JSON.stringify({
            username: usernameField.value,
            password: passwordField.value,
            usertype: userType
        })
    });

    //200 = HTTP OK
    if(loginResponse.status == 200){
        console.log('Login Successful');
    }
    //401 = HTTP Unauthorized
    if(loginResponse.status == 401){
        usernameField.style.border = "1px solid red";
        passwordField.style.border = "1px solid red";
        loginAttempt++;
    }

    //Triggers when loginAttempt reaches above 5
    if(loginAttempt>5){
        loginAttempt = DisableLogin(loginBtn);
    }
}



const DisableLogin = (LoginButton) => {
    // Disables the button temporarily
    LoginButton.disabled = true;
  
    // Use a function within setTimeout to re-enable the button after a delay
    setTimeout(() => {
      LoginButton.disabled = false;
    }, 5000);
    //resets the login attempt
    return 0;
  }