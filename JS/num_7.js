function genPas(len) {
    let retStr = '';
    if (len < 4) {
        console.log('Пароль должен содержать минимум 4 символа!');
        len = 0;
        return;
    }
    const lowercase = "abcdefghijklmnopqrstuvwxyz";
    const uppercase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    const numbers = "0123456789";
    const specials = "!@#$%^&*()_+-=[]{}|;:,.<>?";
    const allChars = lowercase + uppercase + numbers + specials;

    retStr += lowercase[Math.floor(Math.random() * lowercase.length)];
    retStr += uppercase[Math.floor(Math.random() * uppercase.length)];
    retStr += numbers[Math.floor(Math.random() * numbers.length)];
    retStr += specials[Math.floor(Math.random() * specials.length)];
    len -= 4;
    for (let i = 0; i < len; i++) {
        retStr += allChars[Math.floor(Math.random() * allChars.length)];
    }
    let password = '';
    const arr = retStr.split(''); 
    
    while (arr.length > 0) {
        const randomIndex = Math.floor(Math.random() * arr.length);
        password += arr.splice(randomIndex, 1)[0];
    }
    return password;
}

console.log(genPas(10))