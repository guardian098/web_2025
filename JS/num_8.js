const numbers = [2, 5, 8, 10, 'a'];

const mapOut = numbers
    .map(x => typeof x == 'number' ? x * 3 : 'not number')
    .filter(x => typeof x == 'number' && x > 10);

console.log(mapOut);   
console.log(filterOut);