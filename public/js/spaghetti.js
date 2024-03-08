/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************************!*\
  !*** ./resources/js/segment/spaghetti.js ***!
  \*******************************************/
// Function to toggle dark mode
function toggleDarkMode() {
  var body = document.body;
  body.classList.toggle("dark-mode");
  // Store the user's preference in local storage
  var isDarkMode = body.classList.contains("dark-mode");
  localStorage.setItem("darkMode", isDarkMode);
  // Toggle Daisy UI theme classes
  if (isDarkMode) {
    document.documentElement.dataset.theme = "synthwave";
  } else {
    document.documentElement.dataset.theme = "cupcake";
  }
}

// Function to initialize dark mode based on user's preference
function initializeDarkMode() {
  var savedDarkMode = localStorage.getItem("darkMode");
  if (savedDarkMode === "true") {
    document.body.classList.add("dark-mode");
    document.documentElement.dataset.theme = "synthwave";
  } else {
    document.documentElement.dataset.theme = "cupcake";
  }
}

// Add event listener to dark mode toggle checkbox
document.getElementById("darkModeCheckbox").addEventListener("change", toggleDarkMode);

// Initialize dark mode
initializeDarkMode();
/******/ })()
;