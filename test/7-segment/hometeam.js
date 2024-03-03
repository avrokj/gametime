// Your basketball team object
var basketballTeam = {
    1: "Aliin",
    2: "Aren",
    3: "Jan",
    4: "Karel",
    5: "Kaspar",
    6: "Liis",
    7: "Mari-Liis",
    8: "Merilyn",
    9: "Raiko",
    10: "Siim",
    11: "Tene",
};

// Function to display team information
function displayTeamInfo(team) {
    var teamInfoBody = document.getElementById("teamInfo");

    for (var key in team) {
        var row = document.createElement("tr");
        var playerNumberCell = document.createElement("td");
        var playerNameCell = document.createElement("td");
        playerNumberCell.textContent = key;
        playerNameCell.textContent = team[key];
        row.appendChild(playerNumberCell);
        row.appendChild(playerNameCell);
        teamInfoBody.appendChild(row);
    }
}

// Function to add player to in-game list
function addPlayerToGame() {
    var select = document.getElementById("playerSelect");
    var selectedPlayerKey = select.value;
    var selectedPlayerName = basketballTeam[selectedPlayerKey];
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
    var playerNameCell = document.createElement("td");
    var actionCell = document.createElement("td");
    var actionButton = document.createElement("button");

    playerNumberCell.textContent = playerKey;
    playerNameCell.textContent = playerName;

    actionButton.textContent = isInGame
        ? "Remove from In-Game"
        : "Add to In-Game";
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

// Populate dropdown with players
function populateDropdown() {
    var select = document.getElementById("playerSelect");

    for (var key in basketballTeam) {
        var option = document.createElement("option");
        option.value = key;
        option.textContent = "Player " + key + ": " + basketballTeam[key];
        select.appendChild(option);
    }
}

// Display the team information
displayTeamInfo(basketballTeam);

// Populate dropdown with players
populateDropdown();
