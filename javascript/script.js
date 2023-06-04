function ValidateForm() {
    // Retrieve the form inputs
    var userName = document.getElementById('adm_username').value;
    var contactNum = document.getElementById('adm_cnumber').value;
    var userPass = document.getElementById('adm_password').value;
    var firstName = document.getElementById('adm_fname').value;
    var lastName = document.getElementById('adm_lname').value;

    // Regular expression patterns
    var namePattern = /^[a-zA-Z0-9 ]+$/; // Only alphabets,numbers, and spaces allowed
    var contactPattern = /^\d{11}$/; // Exactly 11 digits allowed
    var fnamePattern = /^[a-zA-Z ]+$/; // Only alphabets are allowed
    var lnamePattern = /^[a-zA-Z ]+$/; // Only alphabets are allowed
    var passPattern = /^[a-zA-Z0-9!@#$%^&*]{6,16}$/; // Should include special characters, numbers, Capital letters, minimum of 8 characters and maximum of 20 characters

    // var passPattern = /^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/; // Should include special characters, numbers, Capital letters, minimum of 8 characters and maximum of 20 characters

    // Validate User Name
    if (!namePattern.test(userName)) {
        alert('Please enter a valid User Name (Only alphabets and numbers are allowed!)');
        return false;
    }

    // Validate Contact Number
    if (!contactPattern.test(contactNum)) {
        alert('Please enter a valid Contact Number (Exactly 11 digits are allowed)');
        return false;
    }

    // Validate First Name
    if (!fnamePattern.test(firstName)) {
        alert('Please enter a valid First Name (Only alphabets are allowed!)');
        return false;
    }

    // Validate Last Name
    if (!lnamePattern.test(lastName)) {
        alert('Please enter a valid Last Name (Only alphabets are allowed!)');
        return false;
    }

    //Validate Password
    if (!passPattern.test(userPass)) {
        alert('Password does not meet the Requirements \n \n (Include special characters, small/capital letters, numbers, and should have a minimum of 8 characters)');
        return false;
    }

    return true; // Allow form submission
}
