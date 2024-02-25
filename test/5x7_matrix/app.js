import { GameBoard } from "./src/GameBoard.js";
import { Number } from "./src/Number.js";

const boardSizeX = 11;
const boardSizeY = 7;

const number = new Number();
const gameBoard = new GameBoard(boardSizeX, boardSizeY);

gameBoard.draw(number.getCoordinates(0));

const homeMinus1 = document.getElementById("homeMinus1");
const homePlus1 = document.getElementById("homePlus1");
const homeScore = document.getElementById("homeScore");

var hScore = 0;
homeScore.innerHTML = hScore;

const handleHomeScorePlus = () => {
    hScore++;
    if (hScore > 99){
        hScore = 0;
    }
    homeScore.innerHTML = hScore;
    gameBoard.draw(number.getCoordinates(hScore));
    console.log(number.getCoordinates(hScore))
  };

  const handleHomeScoreMinus = () => {
    hScore--;
    if (hScore < 0){
        hScore = 99;
    }
    homeScore.innerHTML = hScore;
    gameBoard.draw(number.getCoordinates(hScore));
  };

  homePlus1.addEventListener("click", handleHomeScorePlus);
  homeMinus1.addEventListener("click", handleHomeScoreMinus);