class HomeGameBoard {
    gameBoardTable = document.getElementById("home-game-board");
    boardSize;

    constructor(boardSizeX, boardSizeY) {
        this.boardSizeX = boardSizeX;
        this.boardSizeY = boardSizeY;
    }

    draw(numberCoordinates) {
        this.gameBoardTable.innerHTML = "";

        for (let i = 0; i < this.boardSizeY; i++) {
            const rowTr = document.createElement("tr");

            for (let j = 0; j < this.boardSizeX; j++) {
                const cellTd = document.createElement("td");
                const id = i + "-" + j;
                cellTd.setAttribute("width", 30);
                cellTd.setAttribute("height", 30);
                cellTd.setAttribute("id", id);

                if (j == 1 || j == 5) {
                    cellTd.setAttribute("width", 120);
                }

                if (j == 3) {
                    cellTd.setAttribute("width", 60);
                }

                if (numberCoordinates.includes(id)) {
                    cellTd.classList.add("number");
                    cellTd.style.background = "red";
                }

                if (i == 1 || i == 3) {
                    cellTd.setAttribute("height", 120);
                }

                if (i % 2 == 0 && (j == 1 || j == 5)) {
                    cellTd.className = "border rounded-full border-red-200";
                }
                if (i % 2 == 1 && j % 2 == 0) {
                    cellTd.className = "border rounded-full border-red-200";
                }

                rowTr.append(cellTd);
                //console.log(id);
            }

            this.gameBoardTable.append(rowTr);
        }
    }
}

class AwayGameBoard {
    gameBoardTable = document.getElementById("away-game-board");
    boardSize;

    constructor(boardSizeX, boardSizeY) {
        this.boardSizeX = boardSizeX;
        this.boardSizeY = boardSizeY;
    }

    draw(numberCoordinates) {
        this.gameBoardTable.innerHTML = "";

        for (let i = 0; i < this.boardSizeY; i++) {
            const rowTr = document.createElement("tr");

            for (let j = 0; j < this.boardSizeX; j++) {
                const cellTd = document.createElement("td");
                const id = i + "-" + j;
                cellTd.setAttribute("width", 30);
                cellTd.setAttribute("height", 30);
                cellTd.setAttribute("id", id);

                if (j == 1 || j == 5) {
                    cellTd.setAttribute("width", 120);
                }

                if (j == 3) {
                    cellTd.setAttribute("width", 60);
                }

                if (numberCoordinates.includes(id)) {
                    cellTd.classList.add("number");
                    cellTd.style.background = "red";
                }

                if (i == 1 || i == 3) {
                    cellTd.setAttribute("height", 120);
                }

                if (i % 2 == 0 && (j == 1 || j == 5)) {
                    cellTd.className = "border rounded-full border-red-200";
                }
                if (i % 2 == 1 && j % 2 == 0) {
                    cellTd.className = "border rounded-full border-red-200";
                }

                rowTr.append(cellTd);
                //console.log(id);
            }

            this.gameBoardTable.append(rowTr);
        }
    }
}

class Number {
    coordinates = [];
    trans = [
        [2, 5, 0, 5, 2],
        [0, 1, 0, 1, 0],
        [2, 1, 2, 4, 2],
        [2, 1, 2, 1, 2],
        [0, 5, 2, 1, 0],
        [2, 4, 2, 1, 2],
        [2, 4, 2, 5, 2],
        [2, 1, 0, 1, 0],
        [2, 5, 2, 5, 2],
        [2, 5, 2, 1, 2],
    ];

    getCoordinates(hScore) {
        let one = hScore % 10;
        let ten = Math.floor(hScore / 10) % 10;
        let hTens = this.trans[ten];
        let hOnes = this.trans[one];
        let testNumbers = [4, 2, 1];
        this.coordinates = [];

        for (let i = 0; i < 5; i++) {
            let x = hTens[i];
            for (let j = 0; j < 3; j++) {
                if (x >= testNumbers[j]) {
                    x = x - testNumbers[j];
                    this.coordinates.push(i + "-" + j);
                }
            }
        }
        // yheliste kuvamine
        for (let i = 0; i < 5; i++) {
            let x = hOnes[i];
            for (let j = 0; j < 3; j++) {
                if (x >= testNumbers[j]) {
                    x = x - testNumbers[j];
                    this.coordinates.push(i + "-" + (j + 4));
                }
            }
        }
        return this.coordinates;
    }
}

var basketballTeam = [
    {
        teamName: "ta-22",
        players: [
            { name: "Aliin", number: 1, status: 0, points: 0, shots: 0 },
            { name: "Aren", number: 2, status: 0, points: 0, shots: 0 },
            { name: "Jan", number: 3, status: 0, points: 0, shots: 0 },
            { name: "Karel", number: 4, status: 0, points: 0, shots: 0 },
            { name: "Kaspar", number: 5, status: 0, points: 0, shots: 0 },
            { name: "Liis", number: 6, status: 0, points: 0, shots: 0 },
            { name: "Mari-Liis", number: 7, status: 0, points: 0, shots: 0 },
            { name: "Merilyn", number: 8, status: 0, points: 0, shots: 0 },
            { name: "Raiko", number: 9, status: 0, points: 0, shots: 0 },
            { name: "Siim", number: 10, status: 0, points: 0, shots: 0 },
            { name: "Tene", number: 11, status: 0, points: 0, shots: 0 },
        ],
    },
    {
        teamName: "guest",
        players: {
            1: "Jüri",
            2: "Mari",
            3: "Kati",
            4: "Tõnu",
            5: "Joosep",
            6: "Mari",
            7: "Liis",
            8: "Juku",
            9: "Ants",
            10: "Siim",
            11: "Paul",
        },
    },
];

//import inGameListBody from "./hometeam.js";
console.log(sessionStorage);
//console.log(inGameListBody);
let x = document.cookie;
console.log(x);
//import  inGameListBody  from "./hometeam.js";
//console.log(inGameListBody);
const boardSizeX = 7;
const boardSizeY = 5;

const number = new Number();
const homeGameBoard = new HomeGameBoard(boardSizeX, boardSizeY);
const awayGameBoard = new AwayGameBoard(boardSizeX, boardSizeY);

homeGameBoard.draw(number.getCoordinates(0));
awayGameBoard.draw(number.getCoordinates(0));

const homeMinus1 = document.getElementById("homeMinus1");
const homePlus1 = document.getElementById("homePlus1");
const homePlus2 = document.getElementById("homePlus2");
const homePlus3 = document.getElementById("homePlus3");
const homeScore = document.getElementById("homeScore");

const awayMinus1 = document.getElementById("awayMinus1");
const awayPlus1 = document.getElementById("awayPlus1");
const awayPlus2 = document.getElementById("awayPlus2");
const awayPlus3 = document.getElementById("awayPlus3");
const awayScore = document.getElementById("awayScore");

var hScore = 0;
var aScore = 0;
homeScore.innerHTML = hScore;
awayScore.innerHTML = aScore;

const handleHomeScoreMinus = () => {
    hScore--;
    if (hScore < 0) {
        hScore = 99;
    }
    homeScore.innerHTML = hScore;
    homeGameBoard.draw(number.getCoordinates(hScore));
};

const handleAwayScoreMinus = () => {
    aScore--;
    if (aScore < 0) {
        aScore = 99;
    }
    awayScore.innerHTML = aScore;
    awayGameBoard.draw(number.getCoordinates(aScore));
};

const handleHomeScorePlus = () => {
    hScore++;
    if (hScore > 99) {
        hScore = 0;
    }
    homeScore.innerHTML = hScore;
    homeGameBoard.draw(number.getCoordinates(hScore));
    console.log(number.getCoordinates(hScore));
};

const handleAwayScorePlus = () => {
    aScore++;
    if (aScore > 99) {
        aScore = 0;
    }
    awayScore.innerHTML = aScore;
    awayGameBoard.draw(number.getCoordinates(aScore));
    console.log(number.getCoordinates(aScore));
};

const handleHomeScorePlus2 = () => {
    hScore += 2;
    if (hScore > 99) {
        hScore = 0;
    }
    homeScore.innerHTML = hScore;
    homeGameBoard.draw(number.getCoordinates(hScore));
    console.log(number.getCoordinates(hScore));
};

const handleAwayScorePlus2 = () => {
    aScore += 2;
    if (aScore > 99) {
        aScore = 0;
    }
    awayScore.innerHTML = aScore;
    awayGameBoard.draw(number.getCoordinates(aScore));
    console.log(number.getCoordinates(aScore));
};

const handleHomeScorePlus3 = () => {
    hScore += 3;
    if (hScore > 99) {
        hScore = 0;
    }
    homeScore.innerHTML = hScore;
    homeGameBoard.draw(number.getCoordinates(hScore));
    console.log(number.getCoordinates(hScore));
};

const handleAwayScorePlus3 = () => {
    aScore += 3; // Increment aScore by 3
    if (aScore > 99) {
        aScore = 0;
    }
    awayScore.innerHTML = aScore;
    awayGameBoard.draw(number.getCoordinates(aScore));
    console.log(number.getCoordinates(aScore));
};

homeMinus1.addEventListener("click", handleHomeScoreMinus);
homePlus1.addEventListener("click", handleHomeScorePlus);
homePlus2.addEventListener("click", handleHomeScorePlus2);
homePlus3.addEventListener("click", handleHomeScorePlus3);

awayMinus1.addEventListener("click", handleAwayScoreMinus);
awayPlus1.addEventListener("click", handleAwayScorePlus);
awayPlus2.addEventListener("click", handleAwayScorePlus2);
awayPlus3.addEventListener("click", handleAwayScorePlus3);
