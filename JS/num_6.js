function mapObjectSafe(obj, callback) {
  const result = {};
  for (const key in obj) {
    result[key] = callback(obj[key]); 
  }
  return result;
}

const nums = { a: 1, b: 2, c: 3, d: 'a' };
console.log(mapObjectSafe(nums, x => typeof x == 'number' ? x * 3 : 'not number')); 