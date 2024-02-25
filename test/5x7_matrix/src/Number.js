
class Number {
    
    coordinates = [];
    trans = [[14, 17, 17, 17, 17, 17, 14], [4, 12, 4, 4, 4, 4, 14], 
        [14, 17, 1, 2, 4, 8, 31], [14, 1, 1, 14, 1, 1, 14], [17, 17, 17, 14, 1 , 1 ,1], [31, 16, 16, 30, 1, 1, 30],
        [14, 16, 16, 30, 17, 17, 14], [31, 1, 1, 2, 4, 4, 4], [14, 17, 17, 14, 17, 17, 14], [14, 17, 17, 15, 1, 17, 14]];
    
    getCoordinates (hScore) {

        let one = hScore % 10;
        let ten = Math.floor(hScore /10 ) % 10;
        let hTens = this.trans[ten];
        let hOnes = this.trans[one];
        let testNumbers = [16, 8, 4, 2, 1];
        this.coordinates = [];

        for (let i = 0; i < 7; i++)
        {
            let x = hTens[i];
            for (let j = 0; j < 5; j++)
            {
                if (x >= testNumbers[j])
                {
                    x = x - testNumbers[j];
                    this.coordinates.push(i + '-' + j);
                }
            }
        }
        // yheliste kuvamine
        for (let i = 0; i < 7; i++)
        {
            let x = hOnes[i];
            for (let j = 0; j < 5; j++)
            {
                if (x >= testNumbers[j])
                {
                    x = x - testNumbers[j];
                    this.coordinates.push(i + '-' + (j+6));
                }
            }
        }
        return this.coordinates;
    };

}

export { Number }