// Function to toggle dark mode
function toggleDarkMode() {
    const body = document.body;
    body.classList.toggle("dark-mode");
    // Store the user's preference in local storage
    const isDarkMode = body.classList.contains("dark-mode");
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
    const savedDarkMode = localStorage.getItem("darkMode");
    if (savedDarkMode === "true") {
        document.body.classList.add("dark-mode");
        document.documentElement.dataset.theme = "dracula";
    } else {
        document.documentElement.dataset.theme = "light";
    }
}

// Add event listener to dark mode toggle checkbox
document
    .getElementById("darkModeCheckbox")
    .addEventListener("change", toggleDarkMode);

// Initialize dark mode
initializeDarkMode();

// Other Functions
document.addEventListener("DOMContentLoaded", function () {
    // Function to Modals
    var forms = document.querySelectorAll(".teamForm");
    forms.forEach(function (form) {
        form.addEventListener("submit", function (event) {
            event.preventDefault(); // Prevent default form submission behavior

            var formData = new FormData(form);

            var xhr = new XMLHttpRequest();
            xhr.open("POST", form.getAttribute("action"), true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Handle successful response, maybe close modal or show success message
                    } else if (xhr.status === 422) {
                        var errors = JSON.parse(xhr.responseText).errors;
                        Object.keys(errors).forEach(function (key) {
                            // Display error messages next to corresponding input fields
                            // Example assuming you have input fields with IDs
                            var errorMessage = document.createElement("span");
                            errorMessage.className = "text-red-500";
                            errorMessage.textContent = errors[key][0];
                            var inputField = document.getElementById(key);
                            inputField.parentNode.insertBefore(
                                errorMessage,
                                inputField.nextSibling
                            );
                        });
                    } else {
                        // Handle other error cases
                    }
                }
            };
            xhr.send(formData);
        });
    });

    // Function to Accordion
    const accordionTriggers = document.querySelectorAll(".accordion-trigger");

    accordionTriggers.forEach((trigger) => {
        trigger.addEventListener("click", function () {
            const content =
                this.parentElement.querySelector(".collapse-content");
            const radio = this.parentElement.querySelector(
                'input[type="radio"]'
            );
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
                radio.checked = false;
            } else {
                content.style.maxHeight = content.scrollHeight + 40 + "px";
                radio.checked = true;
            }
        });
    });

    // Function to Tabs
    const eventTabs = document.querySelectorAll(".event-tabs .tab");
    eventTabs.forEach((tab) => {
        tab.addEventListener("click", function (event) {
            event.preventDefault();
            // Hide all tab contents
            document
                .querySelectorAll('[role="eventtabpanel"]')
                .forEach((tabContent) => {
                    tabContent.classList.add("hidden");
                });
            // Remove active class from all tabs
            document.querySelectorAll(".event-tabs .tab").forEach((tab) => {
                tab.classList.remove("font-semibold");
                tab.classList.remove("tab-active");
            });
            // Show the clicked tab content
            const tabId = this.getAttribute("href").substring(1);
            document.getElementById(tabId).classList.remove("hidden");
            // Add active class to the clicked tab
            this.classList.add("font-semibold");
            this.classList.add("tab-active");
        });
    });

    const gameTabs = document.querySelectorAll(".game-tabs .tab");
    gameTabs.forEach((tab) => {
        tab.addEventListener("click", function (event) {
            event.preventDefault();
            // Hide all tab contents
            document
                .querySelectorAll('[role="gametabpanel"]')
                .forEach((tabContent) => {
                    tabContent.classList.add("hidden");
                });
            // Remove active class from all tabs
            document.querySelectorAll(".game-tabs .tab").forEach((tab) => {
                tab.classList.remove("font-semibold");
                tab.classList.remove("tab-active");
            });
            // Show the clicked tab content
            const tabId = this.getAttribute("href").substring(1);
            document.getElementById(tabId).classList.remove("hidden");
            // Add active class to the clicked tab
            this.classList.add("font-semibold");
            this.classList.add("tab-active");
        });
    });
});
