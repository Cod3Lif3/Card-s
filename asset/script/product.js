let firstPict = document.getElementById("first_pict");
let secondPict = document.getElementById("second_pict");
let thirdPict = document.getElementById("third_pict");
let next_btn = document.getElementById("next-btn");
let pre_btn = document.getElementById("previous-btn");


next_btn.addEventListener('click', () =>{
    if(firstPict.style.display == "block"){
        firstPict.style.display =("none");
        secondPict.style.display =("block");
    }
    else if (secondPict.style.display == "block"){
        secondPict.style.display =("none");
        thirdPict.style.display = ("block");
    }
    else{
        thirdPict.style.display = ("none");
        firstPict.style.display =("block");
    }
});
pre_btn.addEventListener('click', () =>{
    if(firstPict.style.display == "block"){
        firstPict.style.display =("none");
        thirdPict.style.display = ("block");
    }
    else if (secondPict.style.display == "block"){
        secondPict.style.display =("none");
        firstPict.style.display =("block");
    }
    else{
        thirdPict.style.display = ("none");
        secondPict.style.display =("block");
    }
})