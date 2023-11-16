<?php
    // Abstract class representing a generic character in the game
    abstract class Character{

        // Properties common to all characters
        private $characterName;
        private $marblesNumber;

        // Constructor to initialize character properties
        public function __construct($characterName, $marblesNumber){
            $this->characterName = $characterName;
            $this->marblesNumber = $marblesNumber;
        }

        // Getter method to retrieve the character's name
        public function getCharacterName(){
            return $this->characterName;
        }

        // Getter method to retrieve the number of marbles the character has
        public function getMarblesNumber(){
            return $this->marblesNumber;
        }

        // Setter method to update the number of marbles the character has
        public function setMarblesNumber($marblesNumber){
            $this->marblesNumber = $marblesNumber;
        }

        // Setter method to update the character's name
        public function setCharacterName($characterName){
            $this->characterName = $characterName;
        }

        // Abstract method representing the character winning marbles
        abstract public function winMarbles($marblesNumber);

        // Abstract method representing the character losing marbles
        abstract public function loseMarbles($marblesNumber);

    }

?>


<?php

    // Hero class, a specific type of character with additional features
    class Hero extends Character {

        // Bonus and malus properties specific to the Hero class
        private $bonus;
        private $malus;

        // Constructor to initialize Hero properties
        public function __construct($characterName, $marblesNumber, $bonus, $malus){
            parent::__construct($characterName, $marblesNumber);
            $this->bonus = $bonus;
            $this->malus = $malus;
        }

        // Allows the hero to choose randomly between even and odd
        public function chooseEvenOrOdd(){
            $randomNumber = rand(0, 1);
            if($randomNumber == 0) {
                return "even";
            } else {
                return "odd";            
            }
        }

        // Checks if the given number is even or odd 
        public function checkEvenOrOdd($marblesNumber){
            if($marblesNumber % 2 == 0){
                return "even";
            } else {
                return "odd";
            }
        }

        // Increases the hero's marbles based on the outcome of a win and the bonus
        public function winMarbles($marblesNumber){
            $this->setMarblesNumber($this->getMarblesNumber() + $marblesNumber + $this->bonus);
        }

        public function winMarblesCheating($marblesNumber){
            $this->setMarblesNumber($this->getMarblesNumber() + $marblesNumber);
        }

        // Decreases the hero's marbles based on the outcome of a loss and the malus
        public function loseMarbles($marblesNumber){
            $this->setMarblesNumber($this->getMarblesNumber() - $marblesNumber - $this->malus);
        }

    }

?>


<?php

    // Enemy class, representing adversaries in the game
    class Enemy extends Character {

        private $age;

        public function __construct($characterName, $marblesNumber, $age){
            parent::__construct($characterName, $marblesNumber);
            $this->age = $age;
        }

        public function winMarbles($marblesNumber){}
        public function loseMarbles($marblesNumber){}

        public function getAge(){
            return $this->age;
        }

    }

?>


