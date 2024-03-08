import { HomeGameBoard, AwayGameBoard } from "./src/GameBoard.js";
import { Number } from "./src/Number.js";
import basketballTeam from "./teams.js";
//import inGameListBody from "./hometeam.js";
console.log(sessionStorage);
//console.log(inGameListBody);
let x = document.cookie;
console.log(x)
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
