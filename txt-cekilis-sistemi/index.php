<?php
    date_default_timezone_set("Europe/Istanbul");   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ÇEKİLİŞ</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <style>
        #pa{
            padding:15px;	
        }
        #r{
            margin-top:20%; min-height:250px;
            font-style:oblique;   
        }
        #r2{
            background-color:#F9F9F9;
            border:1px #CBCBCB solid;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row" id="r">
		    <div class="col-md-4"></div>
            <div class="col-md-4 rounded" id="r2">  
                <?php
                    $isimlerkap = array();
                    $file = fopen("isimler.txt","r");
                    while (!feof($file)) {
                        $satir = fgets($file);
                        $isimlerkap[] = $satir;
                    }
                    fclose($file);

                    @$islem = $_GET['islem'];

                    switch ($islem) {
                        case 'sonuc':

                            $buton = $_POST['buton'];
                            $kisi = $_POST['kisi'];

                            if ($buton) {

                                $random = array_rand($isimlerkap,$kisi); ?>

                                <div class="row">
                                    <div class="col-md-12" id="pa" style="text-align:center">
                                        <h3>KAZANAN KİŞİLER</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" id="pa" style="text-align:center">
                                        <?php

                                            if ($kisi == 1) {

                                                echo $isimlerkap[$random];
                                                
                                            }else {

                                                foreach ($random as $value) {

                                                    echo $isimlerkap[$value]."<br><hr>";
                                                    
                                                }
                                                
                                            }
                                       
                                        ?>
                                    </div>
                                </div> <?php
       
                            }else {

                                echo "Hata";

                            }
                            
                        break;
                        
                        default: ?>
                            <form action="index.php?islem=sonuc" method="post">
                                <div class="row">
                                    <div class="col-md-6 text-info" id="pa">
                                        Toplam Katılımcı 
                                    </div>
                                    <div class="col-md-6 text-danger" id="pa">
                                        <?php echo count($isimlerkap); ?>
                                    </div>
                                </div>   
                                <div class="row">
                                    <div class="col-md-6 text-info" id="pa">
                                        Tarih ve Saat
                                    </div>
                                    <div class="col-md-6 text-danger" id="pa">
                                        <?php echo date("d/m/Y")." -".date("H:i"); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 text-info" id="pa">
                                        Kaç kişi arasından
                                    </div>
                                    <div class="col-md-6" id="pa">
                                        <select name="kisi">
                                            <?php
                                                $kazanansayisi = 10;

                                                for ($i=1; $i <= $kazanansayisi; $i++) {  ?>

                                                    <option value="<?php echo $i ?>"><?php echo $i ?></option> <?php

                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="text-align:center;">
                                    <div class="col-md-12" id="pa">
                                        <input name="buton" value="ÇEK GELSİN" type="submit" class="btn btn-success"> 
                                    </div>
                                </div>
                            </form> <?php
                        break;
                    }
                ?>          
            </div>  
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>