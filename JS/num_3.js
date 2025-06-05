function uniqueElements(arr){
    const obj = {};
    if (!Array.isArray(arr)){
        console.log('Ошибка: введите массив')
    } else {
        for (const el of arr){
            let key = String(el);
            if (key in obj){
                obj[key]++;
            } else {
                obj[key] = 1;
            }
        }
        return obj;
    }
}
console.log(uniqueElements(['привет', 'hello', 1, '1']));
console.log(uniqueElements(['привет', 'hello', 1, '1', 3, '3', 3]))