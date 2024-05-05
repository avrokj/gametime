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
    document.documentElement.dataset.theme = "dracula";
  } else {
    document.documentElement.dataset.theme = "light";
  }
}

// Function to initialize dark mode based on user's preference
function initializeDarkMode() {
  var savedDarkMode = localStorage.getItem("darkMode");
  if (savedDarkMode === "true") {
    document.body.classList.add("dark-mode");
    document.documentElement.dataset.theme = "dracula";
  } else {
    document.documentElement.dataset.theme = "light";
  }
}

// Add event listener to dark mode toggle checkbox
document.getElementById("darkModeCheckbox").addEventListener("change", toggleDarkMode);

// Initialize dark mode
initializeDarkMode();

// Function to Accordion
document.addEventListener("DOMContentLoaded", function () {
  var accordionTriggers = document.querySelectorAll(".accordion-trigger");
  accordionTriggers.forEach(function (trigger) {
    trigger.addEventListener("click", function () {
      var content = this.parentElement.querySelector(".collapse-content");
      var radio = this.parentElement.querySelector('input[type="radio"]');
      if (content.style.maxHeight) {
        content.style.maxHeight = null;
        radio.checked = false;
      } else {
        content.style.maxHeight = content.scrollHeight + 40 + "px";
        radio.checked = true;
      }
    });
  });
});

// Function to Tabs
document.addEventListener("DOMContentLoaded", function () {
  var eventTabs = document.querySelectorAll(".event-tabs .tab");
  eventTabs.forEach(function (tab) {
    tab.addEventListener("click", function (event) {
      event.preventDefault();
      // Hide all tab contents
      document.querySelectorAll('[role="eventtabpanel"]').forEach(function (tabContent) {
        tabContent.classList.add("hidden");
      });
      // Remove active class from all tabs
      document.querySelectorAll(".event-tabs .tab").forEach(function (tab) {
        tab.classList.remove("font-semibold");
        tab.classList.remove("tab-active");
      });
      // Show the clicked tab content
      var tabId = this.getAttribute("href").substring(1);
      document.getElementById(tabId).classList.remove("hidden");
      // Add active class to the clicked tab
      this.classList.add("font-semibold");
      this.classList.add("tab-active");
    });
  });
  var gameTabs = document.querySelectorAll(".game-tabs .tab");
  gameTabs.forEach(function (tab) {
    tab.addEventListener("click", function (event) {
      event.preventDefault();
      // Hide all tab contents
      document.querySelectorAll('[role="gametabpanel"]').forEach(function (tabContent) {
        tabContent.classList.add("hidden");
      });
      // Remove active class from all tabs
      document.querySelectorAll(".game-tabs .tab").forEach(function (tab) {
        tab.classList.remove("font-semibold");
        tab.classList.remove("tab-active");
      });
      // Show the clicked tab content
      var tabId = this.getAttribute("href").substring(1);
      document.getElementById(tabId).classList.remove("hidden");
      // Add active class to the clicked tab
      this.classList.add("font-semibold");
      this.classList.add("tab-active");
    });
  });
});
/******/ })()
;