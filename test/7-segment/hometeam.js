import basketballTeam from "./teams.js";

const teamData = basketballTeam.find((item) => item.teamName === "ta-22");
const currentTeam = teamData["players"];
console.log(currentTeam);

// Function to display team information
function displayTeamInfo() {
    const teamInfoBody = document.getElementById("teamInfo");
    
    currentTeam.forEach(player => {
        const row = document.createElement("tr");
        const playerKey = row.getAttribute("data-key");
        const playerNumberCell = document.createElement("td");
        const playerNumberCellP = document.createElement("p");
        const playerNameCell = document.createElement("td");
        const actionCell = document.createElement("td");
        const actionButton = document.createElement("button");

        row.className = "bg-neutral text-neutral-content p-4";
        playerNumberCell.className = "flex justify-center";
        playerNumberCellP.className =
            "btn btn-outline btn-info aspect-square rounded-full flex justify-center items-center font-bold";
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
            const playerKey = this.dataset.playerKey;
            const clonedRow = row.cloneNode(true);
            //row.remove(); //removes last player row
            addPlayerToGame(player, clonedRow);
        };

        actionCell.appendChild(actionButton);

        row.appendChild(playerNumberCell);
        row.appendChild(playerNameCell);
        row.appendChild(actionCell);

        teamInfoBody.appendChild(row);
    })
}

// Function to add player to in-game list
function addPlayerToGame(player) {
    console.log(player);
    //const selectedPlayerName = player.name;
    const inGameListBody = document.getElementById("inGameList");
    const onBenchListBody = document.getElementById("onBenchList");
    const inGameRowCount = inGameListBody.getElementsByTagName("tr").length;

    // If the selected player is already in the in-game list, return immediately
    if (
        document.querySelector("#inGameList tr[data-key='" + player.number + "']" )
        || 
        document.querySelector("#onBenchList tr[data-key='" + player.number + "']" )
    ) {
        console.log('here')
        //siia kribasin midagi kokku
        if (document.querySelector("#onBenchList tr[data-key='" + player.number + "']" )){
            let row = document.querySelector("#onBenchList tr[data-key='" + player.number + "']" );
            row.parentElement.removeChild(row);
            addPlayerToGame(player);
        }
        return;
    }

    // If the selected player is not already in the in-game list
    if (player && inGameRowCount < 5) {
        const row = createPlayerRow(player, true);
        inGameListBody.appendChild(row);
        sessionStorage.setItem(player.number, player.name);
        console.log(sessionStorage);
        //selectedPlayerName[1] += 1;
    }
    
    else if (player) {
        const row = createPlayerRow(player, false);
        onBenchListBody.appendChild(row);
    }
}

// Function to remove player from in-game list
function removePlayerFromGame(player) {
    const toListBody = document.getElementById("onBenchList")
    const row = document.querySelector("#inGameList tr[data-key='" + player.number + "']" )
    row.parentElement.removeChild(row)
    sessionStorage.removeItem(player.number, player.name);
    const onBenchRowCount = toListBody.getElementsByTagName("tr").length;

    if (
        onBenchRowCount < 5 &&
        !document.querySelector("#onBenchList tr[data-key='" + player.name + "']")
    ) {
        const newRow = createPlayerRow(player, false);
        toListBody.appendChild(newRow);
    }
}

// Function to create a player row
function createPlayerRow(player, isInGame) {
    const row = document.createElement("tr");
    row.setAttribute("data-key", player.number);

    const playerNumberCell = document.createElement("td");
    const playerNumberCellP = document.createElement("p");
    const playerNameCell = document.createElement("td");
    const actionCell = document.createElement("td");
    const actionButton = document.createElement("button");

    actionButton.className = isInGame
        ? "btn btn-outline btn-error btn-sm text-xs rounded-full text-xs"
        : "btn btn-outline btn-success btn-sm text-xs rounded-full text-xs";

    row.className = "bg-neutral text-neutral-content p-4";

    playerNumberCell.className = "flex justify-center";
    playerNumberCellP.className =
        "btn btn-outline btn-info aspect-square rounded-full flex justify-center items-center font-bold";
    playerNameCell.className = "whitespace-nowrap px-6 py-4";
    actionCell.className = "flex justify-center";

    playerNumberCellP.textContent = player.number;
    playerNameCell.textContent = player.name;

    playerNumberCell.appendChild(playerNumberCellP);

    actionButton.textContent = isInGame ? "To bench" : "To game";
    actionButton.onclick = function () {
        if (isInGame) {
            removePlayerFromGame(
                player
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