// JavaScript to toggle the tree visibility
const tree = document.getElementById("tree");
const toggleButton = document.getElementById("toggleButton");

// Define a function to toggle the tree element
function toggleTree() {
    if (tree.style.display === "none" || tree.style.display === "") {
        tree.style.display = "block";
        tree.style.position = "fixed";
    } else {
        tree.style.display = "none";
    }
}

// Attach the toggleTree function to the click event of the toggleButton
toggleButton.addEventListener("click", toggleTree);

// Simulate a click on the toggleButton when the page loads

document.addEventListener("click", (event) => {
    if (event.target !== toggleButton && !tree.contains(event.target)) {
        tree.style.display = "none";
    }
});
function toggleMenu() {
    const navigation = document.querySelector(".navigation");
    navigation.classList.toggle("active");
}
$(document).ready(function () {
    var levelOne = $('[data-level="1"]');
    var levelTwo = $('[data-level="2"]');
    var levelOneStyle = $(".level2style");
    var levelTwoStyle = $(".level3style");
    var firstHover = $(".firstHover");
    var mainMenu = $(".hoverable");
    var menuItem = $(".hoverable li");
    var mainMenuReference = $('[data-hover="1"]');
    mainMenu.hover(function () {
        levelOneStyle.hide();
        levelTwoStyle.hide();
        levelOne.add(levelTwo).css("color", "black");
        mainMenuReference.css("color", "orange");
        firstHover.show();
    });
    menuItem.hover(function () {
        var currentLevel = $(this).attr("data-level");
        var reference = $('[data-parent="' + $(this).attr("data-id") + '"]');
        if (currentLevel === "1") {
            levelOne.add(levelTwo).css("color", "black");
            $(this).css("color", "orange");
            levelOneStyle.add(levelTwoStyle).hide();
            reference.show();
        } else if (currentLevel === "2") {
            levelTwo.css("color", "black");
            $(this).css("color", "orange");
            levelTwoStyle.hide();
            reference.show();
        }
    });
});

function toggleMenu1() {
    var navbarScroll = document.getElementById("navbarScroll");
    if (navbarScroll.style.display === "block") {
        navbarScroll.style.display = "none";
    } else {
        navbarScroll.style.display = "block";
    }
}

// Close the bar when clicking anywhere else on the screen
document.addEventListener("click", function (event) {
    var navbarScroll = document.getElementById("navbarScroll");
    var toggleButton = document.querySelector('[data-bs-target="#navbarScroll"]');
    if (navbarScroll.style.display === "block" && event.target !== navbarScroll && event.target !== toggleButton) {
        navbarScroll.style.display = "none";
    }
});
