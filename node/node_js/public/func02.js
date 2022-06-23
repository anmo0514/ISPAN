//commonJS

export default [1, 2, 3];//主要匯出
export const f = (a) => a * a;
export const f2 = (a) => a * a * a;

const b = {name: "peter"};
export {b};
//匯出物件要用大括號包住

// module.exports = {f, f2};