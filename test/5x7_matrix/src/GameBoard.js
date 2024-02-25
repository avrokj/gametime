class GameBoard {

    gameBoardTable = document.getElementById('game-board');
    boardSize;

    constructor ( boardSizeX, boardSizeY) {
        this.boardSizeX = boardSizeX;
        this.boardSizeY = boardSizeY;
    }
    
    draw ( numberCoordinates ) {

        this.gameBoardTable.innerHTML = '';

        for ( let i=0; i < this.boardSizeY; i++) {

            const rowTr = document.createElement('tr');

            for ( let j=0; j < this.boardSizeX; j++) {

                const cellTd = document.createElement('td');
                const id = i + '-' + j;
                cellTd.setAttribute('id', id);

                if ( numberCoordinates.includes(id) ){
                    cellTd.classList.add('number');
                }

                rowTr.append(cellTd);
                //console.log(id);
            }
    
            this.gameBoardTable.append(rowTr);
        }
    }
};

export { GameBoard };