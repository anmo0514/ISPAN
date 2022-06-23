require('dotenv').config();

const {DB_USER, DB_PASS} = process.env;

console.log({DB_PASS, DB_USER});