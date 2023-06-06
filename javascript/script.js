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

function ValidateFormCust() {
    // Retrieve the form inputs
    var contactNum = document.getElementById('cnumber').value;
    var firstName = document.getElementById('fname').value;
    var middleName = document.getElementById('mname').value;
    var lastName = document.getElementById('lname').value;
    var HomeAddress = document.getElementById('address').value;

    // Regular expression patterns
    var addressPattern = /^[a-zA-Z0-9, ]+$/; // Only alphabets,numbers,commas, and spaces allowed
    var contactPattern = /^\d{11}$/; // Exactly 11 digits allowed
    var fnamePattern = /^[a-zA-Z ]+$/; // Only alphabets are allowed
    var mnamePattern = /^[a-zA-Z ]+$/; // Only alphabets are allowed
    var lnamePattern = /^[a-zA-Z ]+$/; // Only alphabets are allowed
    

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

    // Validate Middle Name
    if (!mnamePattern.test(middleName)) {
        alert('Please enter a valid Middle Name (Only alphabets are allowed!)');
        return false;
    }

    // Validate Last Name
    if (!lnamePattern.test(lastName)) {
        alert('Please enter a valid Last Name (Only alphabets are allowed!)');
        return false;
    }

    //Validate Home Address
    if (!addressPattern.test(HomeAddress)) {
        alert('Please enter a valid Address (Should include a comma, number, and letters)');
        return false;
    }
    

    return true; // Allow form submission
}

function ValidateFormRoom() {
    // Retrieve the form inputs
    var RoomNum = document.getElementById('room_number').value;
    var RoomType = document.getElementById('room_type').value;
    var RoomDesc = document.getElementById('room_desc').value;
    var RoomPrice = document.getElementById('room_price').value;
    var RoomFloor = document.getElementById('room_floor').value;
    var RoomVacancy = document.getElementById('room_vacancy').value;

    // Regular expression patterns
    var rmint = /^[0-9 ]+$/; // Only numbers allowed
    var rmchar = /^[a-zA-Z ]+$/; // Exactly letters allowed
    var rmintchar = /^[a-zA-Z0-9 ]+$/; // Numbers and Letters allowed

    
    

    // Validate Room Number
    if (!rmint.test(RoomNum)) {
        alert('Enter Valid Room Number (Enter numbers only!)');
        return false;
    }

    // Validate Room Type
    if (!rmchar.test(RoomType)) {
        alert('Enter Valid Room Type (Enter numbers only!)');
        return false;
    }

    // Validate Room Description
    if (!rmintchar.test(RoomDesc)) {
        alert('Enter Valid Room Description (Enter numbers and letters only!)');
        return false;
    }

    // Validate Room Price
    if (!rmint.test(RoomPrice)) {
        alert('Enter Valid Room Price (Enter numbers only!)');
        return false;
    }

    // Validate Room Floor
    if (!rmintchar.test(RoomFloor)) {
        alert('Enter Valid Room Floor (Enter numbers and letters only!)');
        return false;
    }

    // Validate Room Vacancy
    if (!rmint.test(RoomVacancy)) {
        alert('Enter Valid Room Vacancy (Enter numbers only!)');
        return false;
    }
    
    return true; // Allow form submission
}


