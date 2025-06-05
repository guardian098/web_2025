const users = [
    { id: 1, name: "Alice" },
    { id: 2, name: "Bob" },
    { id: 3, name: "Charlie" }
  ];

function getNames(obj){
    if (!Array.isArray(users)){
        console.log('Ошибка: это не массив');
    } else {
        return obj['name'];
    }
}

console.log(users.map(user => user.name))