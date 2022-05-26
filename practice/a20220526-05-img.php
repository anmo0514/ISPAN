<?php

$ar = [
    "https://pic9.iqiyipic.com/image/20200430/82/18/v_147906265_m_601_m1_220_124.jpg",
    "https://pic9.iqiyipic.com/image/20200429/51/2b/v_147904924_m_601_220_124.jpg",
    "https://pic7.iqiyipic.com/image/20200508/86/a4/v_148111956_m_601_m1_220_124.jpg",
    "https://pic6.iqiyipic.com/image/20200508/d7/7a/v_148109400_m_601_m1_220_124.jpg",
    "https://pic6.iqiyipic.com/image/20200513/80/9b/v_148103914_m_601_m2_220_124.jpg",
    "https://pic5.iqiyipic.com/image/20200513/77/67/v_148313356_m_601_220_124.jpg",
    "https://pic5.iqiyipic.com/image/20200521/58/05/v_148665275_m_601_m1_220_124.jpg",
    "https://pic9.iqiyipic.com/image/20200522/0d/df/v_148669480_m_601_m1_220_124.jpg",
    "https://pic2.iqiyipic.com/image/20200527/c6/15/v_149096095_m_601_220_124.jpg",
    "https://pic2.iqiyipic.com/image/20200527/2c/f8/v_149089244_m_601_220_124.jpg",
    "https://pic9.iqiyipic.com/image/20200608/5f/e7/v_149255855_m_601_m1_220_124.jpg"
];

foreach($ar as $url){
    $file_name = './imgs/'. basename($url);

    if(!file_put_contents($file_name, file_get_contents($url))){
        echo basename($url). '<br>';
    };
}
echo '完成';

