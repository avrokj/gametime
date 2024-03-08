/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************************!*\
  !*** ./resources/js/segment/hometeam.js ***!
  \******************************************/
var basketballTeam = [{
  teamName: "ta-22",
  players: [{
    name: "Aliin",
    number: 1,
    status: 0,
    points: 0,
    shots: 0
  }, {
    name: "Aren",
    number: 2,
    status: 0,
    points: 0,
    shots: 0
  }, {
    name: "Jan",
    number: 3,
    status: 0,
    points: 0,
    shots: 0
  }, {
    name: "Karel",
    number: 4,
    status: 0,
    points: 0,
    shots: 0
  }, {
    name: "Kaspar",
    number: 5,
    status: 0,
    points: 0,
    shots: 0
  }, {
    name: "Liis",
    number: 6,
    status: 0,
    points: 0,
    shots: 0
  }, {
    name: "Mari-Liis",
    number: 7,
    status: 0,
    points: 0,
    shots: 0
  }, {
    name: "Merilyn",
    number: 8,
    status: 0,
    points: 0,
    shots: 0
  }, {
    name: "Raiko",
    number: 9,
    status: 0,
    points: 0,
    shots: 0
  }, {
    name: "Siim",
    number: 10,
    status: 0,
    points: 0,
    shots: 0
  }, {
    name: "Tene",
    number: 11,
    status: 0,
    points: 0,
    shots: 0
  }]
}, {
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
    11: "Paul"
  }
}];
var teamData = basketballTeam.find(function (item) {
  return item.teamName === "ta-22";
});
var currentTeam = teamData["players"];
console.log(currentTeam);

// Function to display team information
function displayTeamInfo() {
  var teamInfoBody = document.getElementById("teamInfo");
  currentTeam.forEach(function (player) {
    var row = document.createElement("tr");
    var playerKey = row.getAttribute("data-key");
    var playerNumberCell = document.createElement("td");
    var playerNumberCellP = document.createElement("p");
    var playerNameCell = document.createElement("td");
    var actionCell = document.createElement("td");
    var actionButton = document.createElement("button");
    row.className = "bg-neutral text-neutral-content p-4";
    playerNumberCell.className = "flex justify-center";
    playerNumberCellP.className = "btn btn-outline btn-info aspect-square rounded-full flex justify-center items-center font-bold";
    playerNameCell.className = "whitespace-nowrap px-6 py-4";
    actionButton.className = "btn btn-outline btn-success btn-sm text-xs";
    playerNumberCellP.textContent = player.number;
    playerNameCell.textContent = player.name;
    //console.log(key);
    //console.log(team[key][0]);

    playerNumberCell.appendChild(playerNumberCellP);
    actionButton.textContent = "To game";
    actionButton.dataset.playerKey = player.status;
    actionButton.onclick = function () {
      var playerKey = this.dataset.playerKey;
      var clonedRow = row.cloneNode(true);
      //row.remove(); //removes last player row
      addPlayerToGame(player, clonedRow);
    };
    actionCell.appendChild(actionButton);
    row.appendChild(playerNumberCell);
    row.appendChild(playerNameCell);
    row.appendChild(actionCell);
    teamInfoBody.appendChild(row);
  });
}

// Function to add player to in-game list
function addPlayerToGame(player) {
  console.log(player);
  //const selectedPlayerName = player.name;
  var inGameListBody = document.getElementById("inGameList");
  var onBenchListBody = document.getElementById("onBenchList");
  var inGameRowCount = inGameListBody.getElementsByTagName("tr").length;

  // If the selected player is already in the in-game list, return immediately
  if (document.querySelector("#inGameList tr[data-key='" + player.number + "']") || document.querySelector("#onBenchList tr[data-key='" + player.number + "']")) {
    console.log("here");
    //siia kribasin midagi kokku
    if (document.querySelector("#onBenchList tr[data-key='" + player.number + "']")) {
      var row = document.querySelector("#onBenchList tr[data-key='" + player.number + "']");
      row.parentElement.removeChild(row);
      addPlayerToGame(player);
    }
    return;
  }

  // If the selected player is not already in the in-game list
  if (player && inGameRowCount < 5) {
    var _row = createPlayerRow(player, true);
    inGameListBody.appendChild(_row);
    sessionStorage.setItem(player.number, player.name);
    console.log(sessionStorage);
    //selectedPlayerName[1] += 1;
  } else if (player) {
    var _row2 = createPlayerRow(player, false);
    onBenchListBody.appendChild(_row2);
  }
}

// Function to remove player from in-game list
function removePlayerFromGame(player) {
  var toListBody = document.getElementById("onBenchList");
  var row = document.querySelector("#inGameList tr[data-key='" + player.number + "']");
  row.parentElement.removeChild(row);
  sessionStorage.removeItem(player.number, player.name);
  var onBenchRowCount = toListBody.getElementsByTagName("tr").length;
  if (onBenchRowCount < 5 && !document.querySelector("#onBenchList tr[data-key='" + player.name + "']")) {
    var newRow = createPlayerRow(player, false);
    toListBody.appendChild(newRow);
  }
}

// Function to create a player row
function createPlayerRow(player, isInGame) {
  var row = document.createElement("tr");
  row.setAttribute("data-key", player.number);
  var playerNumberCell = document.createElement("td");
  var playerNumberCellP = document.createElement("p");
  var playerNameCell = document.createElement("td");
  var actionCell = document.createElement("td");
  var actionButton = document.createElement("button");
  actionButton.className = isInGame ? "btn btn-outline btn-error btn-sm text-xs rounded-full text-xs" : "btn btn-outline btn-success btn-sm text-xs rounded-full text-xs";
  row.className = "bg-neutral text-neutral-content p-4";
  playerNumberCell.className = "flex justify-center";
  playerNumberCellP.className = "btn btn-outline btn-info aspect-square rounded-full flex justify-center items-center font-bold";
  playerNameCell.className = "whitespace-nowrap px-6 py-4";
  actionCell.className = "flex justify-center";
  playerNumberCellP.textContent = player.number;
  playerNameCell.textContent = player.name;
  playerNumberCell.appendChild(playerNumberCellP);
  actionButton.textContent = isInGame ? "To bench" : "To game";
  actionButton.onclick = function () {
    if (isInGame) {
      removePlayerFromGame(player
      // document.getElementById("inGameList").innerHTML     ,
      // document.getElementById("onBenchList"),
      // //row.remove() //lisasin remove() 7.march,
      );
    } else {
      //row.remove();
      addPlayerToGame(player);
    }
  };
  actionCell.appendChild(actionButton);
  row.appendChild(playerNumberCell);
  row.appendChild(playerNameCell);
  row.appendChild(actionCell);
  return row;
}

// Display the team information
displayTeamInfo();
/******/ })()
;