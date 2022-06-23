require('dotenv').config();
//引入express
const express = require('express');
//建立server物件
const app = express();
//
app.set('view engine', 'ejs');

app.use(express.static("public"));
app.use("/bootstrap", express.static("node_modules/bootstrap/dist"));

//路由
app.get('/',(req, res) =>{
    res.render('main',{name: "anmo"});
});

//404頁面要放在所有的路由的最後面
app.use((req, res)=>{
    res.send(`<h2>找不到網頁 404</h2>
    <img src="/imgs/0c97da058b353c08316026a5f8f730da.jpeg">
    `)
});

app.listen(process.env.PORT,() => {
    console.log(`server started: ${process.env.PORT}`);
});