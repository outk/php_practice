var hobbyBox = document.getElementById("hobby");
var skillBox = document.getElementById("skill");

function formSwitch() {
    gender_check = document.getElementsByClassName("gender");
    if (gender_check[0].checked) {
        hobbyBox.style.display = "block";
        skillBox.style.display = "none";
    } else if (gender_check[1].checked) {
        hobbyBox.style.display = "none";
        skillBox.style.display = "block";
    } else {
        hobbyBox.style.display = "none";
        skillBox.style.display = "none";
    }
    window.addEventListener('load', formSwitch());
}