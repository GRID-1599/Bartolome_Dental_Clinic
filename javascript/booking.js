const selected = document.querySelector(".selected");
const optionsContainer = document.querySelector(".selectBox__container");

const optionsList = document.querySelectorAll(".selectBox__options");

const datePicker = document.querySelector(".dateChooser");
const timeChooser = document.querySelector(".time-part");
const calendarModal = document.querySelector(".calendarModal");

selected.addEventListener("click", () => {
    optionsContainer.classList.toggle("selectBox__container-active");
});



optionsList.forEach(o => {
    o.addEventListener("click", () => {
        selected.innerHTML = o.querySelector("label").innerHTML;
        optionsContainer.classList.remove("selectBox__container-active");
    });
});

datePicker.addEventListener("click", () => {
    timeChooser.style.opacity = "1";
    calendarModal.style.display = "block";
    // // To get the scroll position of current webpage
    // TopScroll = window.pageYOffset || document.documentElement.scrollTop;
    // LeftScroll = window.pageXOffset || document.documentElement.scrollLeft,

    //     // if scroll happens, set it to the previous value
    //     window.onscroll = function() {
    //         window.scrollTo(LeftScroll, TopScroll);
    //     };
});

window.addEventListener('click', clickAway);

function clickAway(e) {
    if (e.target == calendarModal) {
        calendarModal.style.display = "none";
        //timeChooser.style.opacity = "0";
    }
}