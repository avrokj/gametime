/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/segment/app.js ***!
  \*************************************/
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _defineProperty(obj, key, value) { key = _toPropertyKey(key); if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : String(i); }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
var HomeGameBoard = /*#__PURE__*/function () {
  function HomeGameBoard(boardSizeX, boardSizeY) {
    _classCallCheck(this, HomeGameBoard);
    _defineProperty(this, "gameBoardTable", document.getElementById("home-game-board"));
    _defineProperty(this, "boardSize", void 0);
    this.boardSizeX = boardSizeX;
    this.boardSizeY = boardSizeY;
  }
  _createClass(HomeGameBoard, [{
    key: "draw",
    value: function draw(numberCoordinates) {
      this.gameBoardTable.innerHTML = "";
      for (var i = 0; i < this.boardSizeY; i++) {
        var rowTr = document.createElement("tr");
        for (var j = 0; j < this.boardSizeX; j++) {
          var cellTd = document.createElement("td");
          var id = i + "-" + j;
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
  }]);
  return HomeGameBoard;
}();
var AwayGameBoard = /*#__PURE__*/function () {
  function AwayGameBoard(boardSizeX, boardSizeY) {
    _classCallCheck(this, AwayGameBoard);
    _defineProperty(this, "gameBoardTable", document.getElementById("away-game-board"));
    _defineProperty(this, "boardSize", void 0);
    this.boardSizeX = boardSizeX;
    this.boardSizeY = boardSizeY;
  }
  _createClass(AwayGameBoard, [{
    key: "draw",
    value: function draw(numberCoordinates) {
      this.gameBoardTable.innerHTML = "";
      for (var i = 0; i < this.boardSizeY; i++) {
        var rowTr = document.createElement("tr");
        for (var j = 0; j < this.boardSizeX; j++) {
          var cellTd = document.createElement("td");
          var id = i + "-" + j;
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
  }]);
  return AwayGameBoard;
}();
var _Number = /*#__PURE__*/function () {
  function _Number() {
    _classCallCheck(this, _Number);
    _defineProperty(this, "coordinates", []);
    _defineProperty(this, "trans", [[2, 5, 0, 5, 2], [0, 1, 0, 1, 0], [2, 1, 2, 4, 2], [2, 1, 2, 1, 2], [0, 5, 2, 1, 0], [2, 4, 2, 1, 2], [2, 4, 2, 5, 2], [2, 1, 0, 1, 0], [2, 5, 2, 5, 2], [2, 5, 2, 1, 2]]);
  }
  _createClass(_Number, [{
    key: "getCoordinates",
    value: function getCoordinates(hScore) {
      var one = hScore % 10;
      var ten = Math.floor(hScore / 10) % 10;
      var hTens = this.trans[ten];
      var hOnes = this.trans[one];
      var testNumbers = [4, 2, 1];
      this.coordinates = [];
      for (var i = 0; i < 5; i++) {
        var x = hTens[i];
        for (var j = 0; j < 3; j++) {
          if (x >= testNumbers[j]) {
            x = x - testNumbers[j];
            this.coordinates.push(i + "-" + j);
          }
        }
      }
      // yheliste kuvamine
      for (var _i = 0; _i < 5; _i++) {
        var _x = hOnes[_i];
        for (var _j = 0; _j < 3; _j++) {
          if (_x >= testNumbers[_j]) {
            _x = _x - testNumbers[_j];
            this.coordinates.push(_i + "-" + (_j + 4));
          }
        }
      }
      return this.coordinates;
    }
  }]);
  return _Number;
}();
var boardSizeX = 7;
var boardSizeY = 5;
var number = new _Number();
var homeGameBoard = new HomeGameBoard(boardSizeX, boardSizeY);
var awayGameBoard = new AwayGameBoard(boardSizeX, boardSizeY);
homeGameBoard.draw(number.getCoordinates(0));
awayGameBoard.draw(number.getCoordinates(0));
var homeMinus1 = document.getElementById("homeMinus1");
var homePlus1 = document.getElementById("homePlus1");
var homePlus2 = document.getElementById("homePlus2");
var homePlus3 = document.getElementById("homePlus3");
var homeScore = document.getElementById("homeScore");
var awayMinus1 = document.getElementById("awayMinus1");
var awayPlus1 = document.getElementById("awayPlus1");
var awayPlus2 = document.getElementById("awayPlus2");
var awayPlus3 = document.getElementById("awayPlus3");
var awayScore = document.getElementById("awayScore");
var hScore = 0;
var aScore = 0;
homeScore.innerHTML = hScore;
awayScore.innerHTML = aScore;
var handleHomeScoreMinus = function handleHomeScoreMinus() {
  hScore--;
  if (hScore < 0) {
    hScore = 99;
  }
  homeScore.innerHTML = hScore;
  homeGameBoard.draw(number.getCoordinates(hScore));
};
var handleAwayScoreMinus = function handleAwayScoreMinus() {
  aScore--;
  if (aScore < 0) {
    aScore = 99;
  }
  awayScore.innerHTML = aScore;
  awayGameBoard.draw(number.getCoordinates(aScore));
};
var handleHomeScorePlus = function handleHomeScorePlus() {
  hScore++;
  if (hScore > 99) {
    hScore = 0;
  }
  homeScore.innerHTML = hScore;
  homeGameBoard.draw(number.getCoordinates(hScore));
  console.log(number.getCoordinates(hScore));
};
var handleAwayScorePlus = function handleAwayScorePlus() {
  aScore++;
  if (aScore > 99) {
    aScore = 0;
  }
  awayScore.innerHTML = aScore;
  awayGameBoard.draw(number.getCoordinates(aScore));
  console.log(number.getCoordinates(aScore));
};
var handleHomeScorePlus2 = function handleHomeScorePlus2() {
  hScore += 2;
  if (hScore > 99) {
    hScore = 0;
  }
  homeScore.innerHTML = hScore;
  homeGameBoard.draw(number.getCoordinates(hScore));
  console.log(number.getCoordinates(hScore));
};
var handleAwayScorePlus2 = function handleAwayScorePlus2() {
  aScore += 2;
  if (aScore > 99) {
    aScore = 0;
  }
  awayScore.innerHTML = aScore;
  awayGameBoard.draw(number.getCoordinates(aScore));
  console.log(number.getCoordinates(aScore));
};
var handleHomeScorePlus3 = function handleHomeScorePlus3() {
  hScore += 3;
  if (hScore > 99) {
    hScore = 0;
  }
  homeScore.innerHTML = hScore;
  homeGameBoard.draw(number.getCoordinates(hScore));
  console.log(number.getCoordinates(hScore));
};
var handleAwayScorePlus3 = function handleAwayScorePlus3() {
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
/******/ })()
;