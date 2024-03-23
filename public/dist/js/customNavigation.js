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
function toggleMenu() {
  const navigation = document.querySelector(".navigation");
  navigation.classList.toggle("active");
}
function toggleMenu1() {
  const navigation = document.querySelector(".navbar");
  navigation.classList.toggle("active");
}
// Function to open a hover card
function openHoverCard() {
  document.body.classList.add("hover-card-open");
}

// Function to close a hover card
function closeHoverCard() {
  document.body.classList.remove("hover-card-open");
}

// Get all the hover card triggers and add event listeners
const hoverCardTriggers = document.querySelectorAll(".subNavFontFamily");

hoverCardTriggers.forEach((trigger) => {
  trigger.addEventListener("mouseenter", openHoverCard);
  trigger.addEventListener("mouseleave", closeHoverCard);
});
