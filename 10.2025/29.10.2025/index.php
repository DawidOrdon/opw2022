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
    interface poj
    {
        public function pedaluj();
        public function stop();
    }
    abstract class pojazdy implements poj {
        protected $name;
        protected $age;
        public function __construct($name, $age) {
            $this->name = $name;
            $this->age = $age;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name): void
        {
            $this->name = $name;
        }

        /**
         * @return mixed
         */
        public function getAge()
        {
            return $this->age;
        }

        /**
         * @param mixed $age
         */
        public function setAge($age): void
        {
            $this->age = $age;
        }
    }
    class rower extends pojazdy
    {
        private $kola=2;
        public function __construct($name, $age, $kola=2) {
            $this->name = $name;
            $this->age = $age;
            $this->kola = $kola;
        }

        /**
         * @return int|mixed
         */
        public function getKola()
        {
            return $this->kola;
        }

        /**
         * @param int|mixed $kola
         */
        public function setKola($kola): void
        {
            $this->kola = $kola;
        }

        public function pedaluj()
        {
            echo "rower jedzie<br/>";
        }

        public function stop()
        {
            echo "rower zatrzymal sie na slupie <br/>";
        }
    }

    $rower = new rower('mtb',2);
    echo ($rower->getName());
    $rower->pedaluj();
    $rower->stop();
//    $rower2 = new pojazdy('mtb',2);
//    echo ($rower2->getName());
?>
</body>
</html>