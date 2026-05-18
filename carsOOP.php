<?php 
    class Samochod{
        private string $marka;
        private string $model;
        private int $rokProdukcji;
        private int $predkoscAkutalna = 0;

        public function __construct(string $marka, string $model, int $rokProdukcji){
            $this->marka = $marka;
            $this->model = $model;
            $this->rokProdukcji = $rokProdukcji;
        }

        public function przyspiesz(int $wartosc): void{
            $this->predkoscAkutalna += $wartosc;
            if($this->predkoscAkutalna > 200){
                $this->predkoscAkutalna = 200;
            }
        }

        public function hamuj(int $wartosc): void{
            $this->predkoscAkutalna -= $wartosc;
            if($this->predkoscAkutalna < 0){
                $this->predkoscAkutalna = 0;
                echo "Nie możesz zhamować do predkosci mniejszej niz 0! <br>";
            }
        }

        public function wyswietlStatus(): string{
            return
            "<br> Marka: " . $this->marka . 
            "<br> Model: " . $this->model . 
            "<br> Rok produkcji: " . $this->rokProdukcji . "r.
            <br> Aktualna prędkośc: " . $this->predkoscAkutalna . "km/h <br>";
        }

        public function __toString(): string{
            return "Samochód: $this->marka $this->model ($this->rokProdukcji r.)";
        }

        public function __destruct(){
            echo"Samochód $this->marka $this->model został zezłomowany. <br>";
        }
    }
 
    $audi = new Samochod("Audi", "a4 b6", 2004);
    echo $audi;
    $audi->przyspiesz(100);
    $audi->hamuj(50);
    echo $audi->wyswietlStatus() . "<br>";

    $honda = new Samochod("Honda", "civic", 1998);
    echo $honda;
    $honda->przyspiesz(250);
    $honda->hamuj(80);
    echo $honda->wyswietlStatus() . "<br>";;

    $lexus = new Samochod("Lexus", "is200", 2001);
    echo $lexus;
    $lexus->przyspiesz(175);
    $lexus->hamuj(30);
    echo $lexus->wyswietlStatus() . "<br>";
?>
