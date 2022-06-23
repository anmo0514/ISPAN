const http = require("http");
const fs = require("fs/promises");


// req 用戶端提出的需求
// res server端的回應
const server = http.createServer(async(req, res)=>{
    
    res.writeHead(200, {
        //設定回應檔頭
        "Content-Type":"text/html; charset=utf8",
    });

    try {
        await fs.writeFile(
            __dirname + '/../data/header01.txt', 
            JSON.stringify(req.headers)
        );
        res.end("完成寫檔3");
    } catch (ex) {
        console.log(ex);
        res.end("發生錯誤3");
    }
});

//偵聽3000port的回應
server.listen(3000)