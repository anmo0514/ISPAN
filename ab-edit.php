<?php require __DIR__ . '/parts/connect_db.php';
$pageName = 'ab-edit';
$title = '編輯通訊錄資料 - anmo';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
if (empty($sid)) {
    header('Location: ab-list.php');
    exit;
}

$row = $pdo->query("SELECT * FROM address_book WHERE sid=$sid")->fetch();
if (empty($row)) {
    header('Location: ab-list.php');
    exit;
}



?>
<?php include __DIR__.'/parts/html-head.php' ?>
<?php include __DIR__.'/parts/navbar.php' ?>

<style>
.form-text.red{
    color: red;
}
.form-control.red{
    border: 1px solid red;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">修改資料</h5>
                    <form name="form1" onsubmit="sendData(); return false;" novalidate>
                        <input type="hidden" name="sid" value="<?= $row['sid']?>">
                        <div class="mb-3" >
                            <label for="name" class="form-label">*name</label>
                            <input name="name" type="name" class="form-control" id="name" required value="<?= htmlentities($row['name']) ?>">
                            <div class="form-text">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">email</label>
                            <input name="email" type="email" class="form-control" id="email" value="<?= $row['email']?>">
                            <div class="form-text">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">mobile</label>
                            <input name="mobile" type="mobile" class="form-control" id="mobile" pattern="09\d{8}" value="<?= $row['mobile']?>">
                            <div class="form-text">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="birthday" class="form-label">birthday</label>
                            <input name="birthday" type="date" class="form-control" id="birthday" value="<?= $row['birthday']?>">
                            <div class="form-text">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">address</label>
                            <textarea name="address" type="address" class="form-control" id="address" cols="3"><?= $row['address'] ?></textarea>
                            <div class="form-text">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">修改</button>
                    </form>

                    <div id="info_bar" class="alert alert-success" role="alert" style="display:none ;">
                    資料修改成功
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__.'/parts/scripts.php' ?>
<script>
    const $row = <?= json_encode($row, JSON_UNESCAPED_UNICODE); ?>;
    const email_re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zAZ]{2,}))$/;
    const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;
    

    const info_bar = document.querySelector('#info_bar');
    const name_f = document.form1.name;
    const email_f = document.form1.email;
    const mobile_f = document.form1.mobile;

    const fields = [name_f, email_f, mobile_f];
    const fieldTexts = [];
    for (let f of fields){
        fieldTexts.push(f.nextElementSibling);
    } 


    




    async function sendData(){

    //讓欄位回復原來外觀
    for(let i in fields){
        fields[i].classList.remove('red');
        fieldTexts[i].classList.remove('red');
        fieldTexts[i].innerText = '';
    }

    info_bar.style.display = 'none';//隱藏訊息表



    //TODO: 欄位檢查，前端的檢查
        let isPass = true;//預設是通過檢查的
        if(name_f.value.length<2){
            // alert("姓名不能少於兩個字");
            // name_f.classList.add('red');
            // name_f.nextElementSibling.classList.add('red');
            //先往上層找再往下面找主角，再設定calss給他
            // name_f.closest('.mb-3').querySelector('.form-text').classList.add('red');
            fields[0].classList.add('red');
            fieldTexts[0].classList.add('red');
            fieldTexts[0].innerText = "姓名不能少於兩個字"
            isPass = false;
        }

        if(email_f.value && !email_re.test(email_f.value)){
            // alert("郵件格式錯誤");
            fields[1].classList.add('red');
            fieldTexts[1].classList.add('red');
            fieldTexts[1].innerText = "郵件格式錯誤"
            isPass = false;
        }

        if(mobile_f.value && !mobile_re.test(mobile_f.value)){
            // alert("手機格式錯誤");
            fields[2].classList.add('red');
            fieldTexts[2].classList.add('red');
            fieldTexts[2].innerText = "手機格式錯誤"
            isPass = false;
        }

        if(!isPass){
            return;//若是false 結束函式
        }



    const fd = new FormData(document.form1);
    const r = await fetch('ab-edit-api.php', {
        method:'POST',
        body: fd,
    });
    const result = await r.json();
    console.log(result);
    info_bar.style.display = 'block';//顯示訊息
    if(result.success){
        info_bar.classList.remove('alert-danger');
        info_bar.classList.add('alert-success');
        info_bar.innerText = '修改成功';

        setTimeout(()=>{
            // location.href = 'ab-list.php';
        }, 1000);
    }else{
        info_bar.classList.remove('alert-success');
        info_bar.classList.add('alert-danger');
        info_bar.innerText = result.error || '修改失敗';
    }
    }

</script>
<?php include __DIR__.'/parts/html-foot.php' ?>