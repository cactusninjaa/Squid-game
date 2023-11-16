<?php

    require_once('Character.php');

    class Hero extends Character {

        private $bonus;
        private $malus;

        public function __construct($characterName, $marblesNumber, $bonus, $malus){
            parent::__construct($characterName, $marblesNumber);
            $this->bonus = $bonus;
            $this->malus = $malus;
        }

        public function chooseEvenOrOdd(){
            $randomNumber = rand(0, 1);
            if($randomNumber == 0) {
                return "even";
            } else {
                return "odd";            
            }
        }

        private function checkEvenOrOdd($marblesNumber){
            if($marblesNumber % 2 == 0){
                return "even";
            } else {
                return "odd";
            }
        }
        
        public function winMarbles(){
            $this->setMarblesNumber($this->getMarblesNumber() + $ennemyMarblesNumber + $this->bonus);
        }

        public function loseMarbles(){
            $this->setMarblesNumber($this->getMarblesNumber() - $ennemyMarblesNumber - $this->malus);
        }

    }

?>