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
                cellTd.setAttribute('width' , 30);
                cellTd.setAttribute('height' , 30);
                cellTd.setAttribute('id', id);
                
            
                if (j == 1 || j == 5) {
                    cellTd.setAttribute('width' , 120);
                }

                if (j == 3 ) {
                    cellTd.setAttribute('width' , 60);
                }

                if ( numberCoordinates.includes(id) ){
                    cellTd.classList.add('number');
                    cellTd.style.background = "red";
                }

                if (i == 1 || i == 3){
                    cellTd.setAttribute('height' , 120);
                }

                if ( i % 2 == 0  && (j == 1 || j == 5)){
                    cellTd.style.border = "1px solid pink";
                }
                if ( i % 2 == 1  && j % 2 == 0){
                    cellTd.style.border = "1px solid pink";
                }


                rowTr.append(cellTd);
                //console.log(id);
            }
    
            this.gameBoardTable.append(rowTr);
        }
    }
};

export { GameBoard };