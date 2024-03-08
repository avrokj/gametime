const gridContainer = document.querySelector(".grid");
let cards = [];
let firstCard, secondCard;
let lockBoard = false;
let score = 0;

document.querySelector(".score").textContent = score;

fetch("./data/cards.json")
    .then((res) => res.json())
    .then((data) => {
        cards = [...data, ...data];
        shuffleCards();
        generateCards();
    });

function shuffleCards() {
    let currentIndex = cards.length,
        randomIndex,
        temporaryValue;
    while (currentIndex !== 0) {
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;
        temporaryValue = cards[currentIndex];
        cards[currentIndex] = cards[randomIndex];
        cards[randomIndex] = temporaryValue;
    }
}

function generateCards() {
    for (let card of cards) {
        const cardElement = document.createElement("div");
        cardElement.classList.add("card");
        cardElement.setAttribute("data-name", card.name);
        cardElement.innerHTML = `
      <div class="front">
        <img class="front-image" src=${card.image} />
      </div>
      <div class="back"></div>
    `;
        gridContainer.appendChild(cardElement);
        cardElement.addEventListener("click", flipCard);
    }
}

function flipCard() {
    if (lockBoard) return;
    if (this === firstCard) return;

    this.classList.add("flipped");

    if (!firstCard) {
        firstCard = this;
        return;
    }

    secondCard = this;
    score++;
    document.querySelector(".score").textContent = score;
    lockBoard = true;

    checkScore();
    checkForMatch();
}

function checkForMatch() {
    let isMatch = firstCard.dataset.name === secondCard.dataset.name;

    isMatch ? disableCards() : unflipCards();
}

function checkScore() {
    const h2Element = document.querySelector("h2.score-value");

    if (score > 29) {
        var messageDiv = document.createElement("div");
        messageDiv.textContent = "Looser...";
        messageDiv.classList.add(
            "badge",
            "badge-primary",
            "fixed",
            "text-8xl",
            "p-16",
            "top-1/4",
            "inset-x-2/4",
            "-translate-x-1/2",
            "-translate-y-1/2",
            "animate-bounce",
            "z-50"
        );
        document.body.appendChild(messageDiv);

        setTimeout(function () {
            messageDiv.parentNode.removeChild(messageDiv);
        }, 5000);
    }

    if (score > 24) {
        h2Element.classList.remove("text-orange-400");
        h2Element.classList.add("text-red-500");
    } else if (score > 19) {
        h2Element.classList.add("text-orange-400");
        h2Element.classList.remove("text-red-500");
    } else {
        h2Element.classList.remove("text-red-500");
        h2Element.classList.remove("text-orange-400");
    }
}

function disableCards() {
    firstCard.removeEventListener("click", flipCard);
    secondCard.removeEventListener("click", flipCard);

    resetBoard();
}

function unflipCards() {
    setTimeout(() => {
        firstCard.classList.remove("flipped");
        secondCard.classList.remove("flipped");
        resetBoard();
    }, 1000);
}

function resetBoard() {
    firstCard = null;
    secondCard = null;
    lockBoard = false;
}

function restart() {
    resetBoard();
    shuffleCards();
    score = 0;
    document.querySelector(".score").textContent = score;
    gridContainer.innerHTML = "";
    generateCards();
}
