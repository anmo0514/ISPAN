import Person from "./person.mjs";
//解構
//__dir 當下檔案所在的資料夾位置

const p1 = new Person('Bill', 20);
const p2 = new Person('David');
console.log(p1);
console.log("" + p1);
console.log(JSON.stringify(p2, null, 4));
