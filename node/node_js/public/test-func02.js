//解構
// const {f, f2}  = require("./func02");
//第一次執行過require就會被node.js記住
//之後重複require都只會執行一次而已
// const {f : a3, f2 : a4}  = require("./func02");
//解構＆參照
// console.log(f(9));
// console.log(a4(2));
// console.log(f===a3);


//mjs練習
import t, {f ,f2, b} from "./func02.js";
import t2, * as f3 from "./func02.js";

console.log(t);
console.log(f(7));
console.log(f2(9));
console.log(b);
