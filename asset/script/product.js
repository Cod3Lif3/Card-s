let firstChoice = document.getElementById("img1");
let secondChoice = document.getElementById("img2");
let firstPict = document.getElementById("LBJ1");
let secondPict = document.getElementById("LBJ2");
let thirdPict = document.getElementById("LBJ3");




if (firstChoice.checked === true)
{
    secondChoice.checked = false;
    firstPict.style.display =( "block");
    secondPict.style.display = ("none");
    thirdPict.style.display = ("none");
}
else if(secondChoice.checked)
{
    firstChoice.checked = false;
    firstPict.style.display =( "none");
    secondPict.style.display = ("display");
    thirdPict.style.display = ("none");
}