const http = require("http");
// req 用戶端提出的需求
// res server端的回應
const server = http.createServer((req, res)=>{
    res.writeHead(200, {
        //設定回應檔頭
        'Content-Type':"text/html",
    });
    //回應內容（請勿做兩次end）
    res.end(`<h2>Hello</h2><p>${req.url}</p>`)
});

//偵聽3000port的回應
server.listen(3000)