function admin() {
    var pass = prompt("Enter admin password: ");
    
    if (pass == "admin"){
        window.location.href = "addque.php";
    }
    else {
        alert("Wrong password");
    }
}