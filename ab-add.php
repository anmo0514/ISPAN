<?php require __DIR__.'/parts/connect_db.php'; 
$pageName = 'ab-add';
$title = '新增通訊錄資料 - anmo';

?>
<?php include __DIR__.'/parts/html-head.php' ?>
<?php include __DIR__.'/parts/navbar.php' ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">新增資料</h5>
                    <form name="form1" onsubmit="sendData(); return false;" novalidate>
                        
                        <div class="mb-3" >
                            <label for="name" class="form-label">*name</label>
                            <input name="name" type="name" class="form-control" id="name" required>
                            <div class="form-text">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">email</label>
                            <input name="email" type="email" class="form-control" id="email">
                            <div class="form-text">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">mobile</label>
                            <input name="mobile" type="mobile" class="form-control" id="mobile" pattern="09\d{8}">
                            <div class="form-text">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="birthday" class="form-label">birthday</label>
                            <input name="birthday" type="date" class="form-control" id="birthday" >
                            <div class="form-text">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">address</label>
                            <textarea name="address" type="address" class="form-control" id="address" cols="3"></textarea>
                            <div class="form-text">
                            </div>
                        </div>
                        
                        

                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__.'/parts/scripts.php' ?>
<script>
    const email_re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zAZ]{2,}))$/;
    const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;
    
    const name_f = document.form1.name;
    const email_f = document.form1.email;
    const mobile_f = document.form1.mobile;






    async function sendData(){
    //TODO: 欄位檢查，前端的檢查
        let isPass = true;//預設是通過檢查的
        if(name_f.value.length<2){
            alert("姓名不能少於兩個字");
            isPass = false;
        }

        if(email_f.value && !email_re.test(email_f.value)){
            alert("郵件格式錯誤");
            isPass = false;
        }

        if(mobile_f.value && !mobile_re.test(mobile_f.value)){
            alert("手機格式錯誤");
            isPass = false;
        }

        if(!isPass){
            return;//若是false 結束函式
        }



    const fd = new FormData(document.form1);
    const r = await fetch('ab-add-api.php', {
        method:'POST',
        body: fd,
    });
    const result = await r.json();
    console.log(result);
    }

</script>
<?php include __DIR__.'/parts/html-foot.php' ?>