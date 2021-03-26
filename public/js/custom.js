window.onscroll = function (e) {
    var x = document.getElementById("navtop").classList;
    program = document.getElementsByClassName("nav-link")
    for (let i = 0; i < program.length; i++) {
        if (x.length <= 5) {
            program[i].classList.add("text-white")
        } else {
            program[i].classList.remove("text-white")
        }
    }
}