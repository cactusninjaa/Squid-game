<?php

    require_once('Character.php');

    class Enemy extends Character {
        
        public function winMarbles(){
            $this->setMarblesNumber($this->getMarblesNumber() + 1);
        }

        public function loseMarbles(){
            $this->setMarblesNumber($this->getMarblesNumber() - 1);
        }

    }

?>