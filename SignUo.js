function inputs() {
  
    //Name
    const Fullname = document.getElementById('fullname');
    const nameValue = Fullname.value;
  
    // Email
    const Email = document.getElementById('email');
    const emailValue = Email.value;
  
    // Password
    const Password = document.getElementById('password');
    const passValue = Password.value;
  
    // Confirm password
    const Conpass = document.getElementById('confirm-password');
    const conpassValue = Conpass.value;
  
    // Log the input values
    if(Password.value != Conpass.value){

        alert('YOUR PASSWORD DOESNT MATCH')
    }
    else
     {
    console.log( nameValue);
    console.log(emailValue);
    console.log( passValue);
    }
  }