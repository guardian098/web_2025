function countVowels(str){
    const vowels = new Set(['а', 'е', 'ё', 'и', 'о', 'у', 'ы', 'э', 'ю', 'я']);
    let count = 0;
    if (typeof str != 'string'){
        console.log('Ошибка: введена не строка');
    } else {
        for (let el of str.toLowerCase()){
            if (vowels.has(el)){
                count++;
            }
        }
    }
    console.log(count);
    return count;
}

countVowels('Привет, мир!');
countVowels('аааАаа')