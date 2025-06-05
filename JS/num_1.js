function isPrimeNumber(num) {
    if (typeof num != 'number' && !Array.isArray(num)) {
        console.log('Ошибка: введите число или массив');
        return;
    }
    if (Array.isArray(num)) {
        for (let n of num){
            if (typeof n != 'number'){
                console.log('Ошибка: элемент массива', n, 'не число')
            } else {
                isPrime(n);
            }
        }
    }
    if (typeof num == 'number'){
        isPrime(num);
    }
}

function isPrime(n) {
    if (n < 2) {
        console.log(n, 'не простое число');
        return;
    }
    let isPrime = true;
    for (let j = 2; j < n; j++) {
        if (n % j == 0) {
            isPrime = false;
            break;
        } 
    }
    if (isPrime){
        console.log(n, 'простое число');
    } else {
        console.log(n, 'не простое число');
    }
}
isPrimeNumber(3);             
isPrimeNumber(4);             
isPrimeNumber([6, 7, 'a'])