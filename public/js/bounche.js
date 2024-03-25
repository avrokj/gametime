const emailInput = document.getElementById("email");
const bouncingDiv = document.getElementById("logo");

emailInput.addEventListener("input", () => {
    bouncingDiv.classList.add("animate-bounce");
    setTimeout(() => {
        bouncingDiv.classList.remove("animate-bounce");
    }, 500); // Adjust the duration as needed
});
