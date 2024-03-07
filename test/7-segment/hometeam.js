import basketballTeam from "./teams.js";

var teamData = basketballTeam.find((item) => item.teamName === "ta-22");
var currentTeam = teamData["players"];
console.log(currentTeam);

// Function to display team information
function displayTeamInfo(team) {
    var teamInfoBody = document.getElementById("teamInfo");

    for (var key in team) {
        var row = document.createElement("tr");
        var playerKey = row.getAttribute("data-key");
        var playerNumberCell = document.createElement("td");
        var playerNumberCellP = document.createElement("p");
        var playerNameCell = document.createElement("td");
        var actionCell = document.createElement("td");
        var actionButton = document.createElement("button");

        row.className = "bg-neutral text-neutral-content p-4";
        playerNumberCell.className = "flex justify-center";
        playerNumberCellP.className =
            "btn btn-outline btn-info aspect-square rounded-full flex justify-center items-center font-bold";
        playerNameCell.className = "whitespace-nowrap px-6 py-4";
        actionButton.className = "btn btn-outline btn-success btn-sm text-xs";

        playerNumberCellP.textContent = key;
        playerNameCell.textContent = team[key];

        playerNumberCell.appendChild(playerNumberCellP);

        actionButton.textContent = "To game";
        actionButton.dataset.playerKey = key;
        actionButton.onclick = function () {
            var playerKey = this.dataset.playerKey;
            row.remove();
            addPlayerToGame(playerKey);
        };

        actionCell.appendChild(actionButton);

        row.appendChild(playerNumberCell);
        row.appendChild(playerNameCell);
        row.appendChild(actionCell);

        teamInfoBody.appendChild(row);
    }
}

// Function to add player to in-game list
function addPlayerToGame(selectedPlayerKey) {
    var selectedPlayerName = currentTeam[selectedPlayerKey];
    var inGameListBody = document.getElementById("inGameList");
    var onBenchListBody = document.getElementById("onBenchList");
    var inGameRowCount = inGameListBody.getElementsByTagName("tr").length;

    // If the selected player is not already in the in-game list
    if (
        selectedPlayerKey &&
        inGameRowCount < 5 &&
        !document.querySelector(
            "#inGameList tr[data-key='" + selectedPlayerKey + "']"
        )
    ) {
        var row = createPlayerRow(selectedPlayerKey, selectedPlayerName, true);
        inGameListBody.appendChild(row);
    } else if (
        selectedPlayerKey &&
        !document.querySelector(
            "#onBenchList tr[data-key='" + selectedPlayerKey + "']"
        )
    ) {
        var row = createPlayerRow(selectedPlayerKey, selectedPlayerName, false);
        onBenchListBody.appendChild(row);
    }
}

// Function to remove player from in-game list
function removePlayerFromGame(row, fromListBody, toListBody) {
    var playerKey = row.getAttribute("data-key");
    var playerName = row.cells[1].textContent;
    row.remove();

    var onBenchRowCount = toListBody.getElementsByTagName("tr").length;

    if (
        onBenchRowCount < 5 &&
        !document.querySelector("#onBenchList tr[data-key='" + playerKey + "']")
    ) {
        var newRow = createPlayerRow(playerKey, playerName, false);
        toListBody.appendChild(newRow);
    }
}

// Function to remove player from on-bench list
function removePlayerFromBench(row, fromListBody) {
    row.remove();
}

// Function to create a player row
function createPlayerRow(playerKey, playerName, isInGame) {
    var row = document.createElement("tr");
    row.setAttribute("data-key", playerKey);

    var playerNumberCell = document.createElement("td");
    var playerNumberCellP = document.createElement("p");
    var playerNameCell = document.createElement("td");
    var actionCell = document.createElement("td");
    var actionButton = document.createElement("button");

    actionButton.className = isInGame
        ? "btn btn-outline btn-error btn-sm text-xs rounded-full text-xs"
        : "btn btn-outline btn-success btn-sm text-xs rounded-full text-xs";

    row.className = "bg-neutral text-neutral-content p-4";

    playerNumberCell.className = "flex justify-center";
    playerNumberCellP.className =
        "btn btn-outline btn-info aspect-square rounded-full flex justify-center items-center font-bold";
    playerNameCell.className = "whitespace-nowrap px-6 py-4";
    actionCell.className = "flex justify-center";

    playerNumberCellP.textContent = playerKey;
    playerNameCell.textContent = playerName;

    playerNumberCell.appendChild(playerNumberCellP);

    actionButton.textContent = isInGame ? "To bench" : "To game";
    actionButton.onclick = function () {
        if (isInGame) {
            removePlayerFromGame(
                row,
                document.getElementById("inGameList"),
                document.getElementById("onBenchList")
            );
        } else {
            row.remove();
            addPlayerToGame();
        }
    };

    actionCell.appendChild(actionButton);

    row.appendChild(playerNumberCell);
    row.appendChild(playerNameCell);
    row.appendChild(actionCell);

    return row;
}

// Display the team information
displayTeamInfo(currentTeam);
