class Number {
  coordinates = [];
  trans = [
    [2, 5, 0, 5, 2],
    [0, 1, 0, 1, 0],
    [2, 1, 2, 4, 2],
    [2, 1, 2, 1, 2],
    [0, 5, 2, 1, 0],
    [2, 4, 2, 1, 2],
    [2, 4, 2, 5, 2],
    [2, 1, 0, 1, 0],
    [2, 5, 2, 5, 2],
    [2, 5, 2, 1, 2],
  ];

  getCoordinates(hScore) {
    let one = hScore % 10;
    let ten = Math.floor(hScore / 10) % 10;
    let hTens = this.trans[ten];
    let hOnes = this.trans[one];
    let testNumbers = [4, 2, 1];
    this.coordinates = [];

    for (let i = 0; i < 5; i++) {
      let x = hTens[i];
      for (let j = 0; j < 3; j++) {
        if (x >= testNumbers[j]) {
          x = x - testNumbers[j];
          this.coordinates.push(i + "-" + j);
        }
      }
    }
    // yheliste kuvamine
    for (let i = 0; i < 5; i++) {
      let x = hOnes[i];
      for (let j = 0; j < 3; j++) {
        if (x >= testNumbers[j]) {
          x = x - testNumbers[j];
          this.coordinates.push(i + "-" + (j + 4));
        }
      }
    }
    return this.coordinates;
  }
}

export { Number };
