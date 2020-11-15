var user = document.getElementById("user");
user.addEventListener('input',disableButton);
console.log(12);
document.getElementById("sem").disabled=true;
document.getElementById("year").disabled=true;
console.log(user.value);
function disableButton(){
    if(user.value == "student"){
        document.getElementById("sem").disabled=false;
        document.getElementById("year").disabled=false;
    }
    else{
        document.getElementById("sem").disabled=true;
        document.getElementById("year").disabled=true;
    }
}