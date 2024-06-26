function validateForm() {
    var userv = document.forms[0].user.value;
    var pwdv = document.forms[0].pwd.value;
    var emailv = document.forms[0].email.value;
    var phv = document.forms[0].ph.value;
    
    var userReg = /^[a-zA-Z]{6,}$/;
    var emailReg = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    var phReg = /^[0-9]{10}$/;
    
    var ruser = userReg.test(userv);
    var remail = emailReg.test(emailv);
    var rph = phReg.test(phv);
    
    if (ruser && remail && rph && pwdv.length >= 6) {
        alert("All values are valid");
        return true;
    } else {
        if (!ruser) { 
            alert("Invalid username. Name should contain alphabets and be at least 6 characters long.");
            document.forms[0].user.focus();
        }
        if (pwdv.length < 6) { 
            alert("Invalid password. Password should be at least 6 characters long.");
            document.forms[0].pwd.focus();
        }
        if (!remail) { 
            alert("Invalid email. Please follow the format name@domain.com.");
            document.forms[0].email.focus();
        }
        if (!rph) { 
            alert("Invalid phone number. Phone number should contain 10 digits only.");
            document.forms[0].ph.focus();
        }
        return false;
    }
}
