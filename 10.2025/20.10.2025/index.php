<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        class Opw
        {
            public function __construct($count,$armed)
            {
                echo "wlasnie rekrutujesz nowa klase opw";
                $this->count = $count;
                $this->armed = $armed;
            }
            public $count;
            public $armed;

            public function fire($gun='glock 19')
            {
                if($this->armed==true){
                    for($i=0;$i<$this->count;$i++){
                        echo"$gun : fire <br />";
                    }
                }else{
                    echo"oddział jest rozbrojony <br />";
                }
            }
            public function reload(){
                $this->armed=true;
            }
            public function __destruct(){
                echo "wysłałeś/aś klase opw na wojne";
            }
        }
//        Opw->fire();
        $opw2022 = new Opw(21,true);
        $opw2023 = new Opw(24,false);

        unset($opw2023);
        $opw2022->fire();
        $opw2022->reload();
        $opw2022->fire('grot');
        echo "oddzial liczy {$opw2022->count} kadetów";
//        echo print_r($opw2022);
        print_r($opw2022 instanceof Opw);

    ?>
</body>
</html>