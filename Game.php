<?php

// Game class responsible for managing the game logic
class Game {

    // Creates a hero based on a random character index
    public function createHero($randomCharacter){
        $heroArray = [
            new Hero("Seoong Gi-Hun", 15, 1, 2),
            new Hero("Kang Sae-byeok", 25, 2, 1),
            new Hero("Cho Sang-Woo", 35, 3, 0),
        ];

        return $heroArray[$randomCharacter];
    }

    // Creates enemies based on a random difficulty index
    public function createEnnemy($randomDifficulty){

        $levelDifficulty = [5, 10, 20];
        $ennemyArray = [];

        // Generates enemies with random marble numbers and random age 
        for ($i=0; $i < $levelDifficulty[$randomDifficulty]; $i++) { 
            array_push($ennemyArray, new Enemy("ennemy ".$i+1, rand(1, 20), rand(1, 100)));
        }

        // Display difficulty level and number of enemies
        echo "<br>";
        echo "NIVEAU DE DIFFICULTÉ : ".$randomDifficulty."<br>"."<br>";
        echo "TU AFFRONTES ".$levelDifficulty[$randomDifficulty]." ENNEMIS";
        echo "<br>";
        echo "-------------------------------------------";
        echo "<br>"."<br>";

        return $ennemyArray;
    }

    // Displays information about the enemy the hero is facing
    public function meeting($ennemy){
        echo "Tu affrontes ".$ennemy->getCharacterName();
        echo "<br>";
        echo "Il a ".$ennemy->getMarblesNumber()." billes";
        echo "<br>";
        echo "Fait ton choix : pair ou impair ?";
    }

    // Handles the fight between the hero and an enemy
    public function fight($hero, $ennemy){
        if ($ennemy -> getAge() > 70 && rand(0, 1) == 1){ // If the enemy is old, the hero has a chance to cheat and win the fight
            $hero->winMarblesCheating($ennemy->getMarblesNumber());
            echo "<br>"."<br>";
            echo "-------------------------------------------";
            echo "<br>";
            echo "TU GAGNES EN TRICHANT !"."<br>";
            echo "LE VIEUX DE ".$ennemy->getAge()." ANS AVAIT ".$ennemy->getMarblesNumber()." BILLES";
            echo "<br>";
            echo "-------------------------------------------";
            echo "<br>"."<br>";
        } else { // If the enemy is not old, the fight continues
            
            $heroChoice = $hero->chooseEvenOrOdd();
            echo "<br>";
            echo "Tu as choisi ".$heroChoice;
            echo "<br>";

            // Checks if the hero's choice matches the outcome of the enemy's marbles
            $check = $hero->checkEvenOrOdd($ennemy->getMarblesNumber());

            if($heroChoice == $check){
                $hero->winMarbles($ennemy->getMarblesNumber());
                echo "manche gagnée !";
                echo "<br>";
            } else {
                $hero->loseMarbles($ennemy->getMarblesNumber());
                echo "manche perdue !";
                echo "<br>";

            }
        }
    }

    // Starts the game
    public function start_game(){
        echo "-------------------------------------------";
        echo "<br>";
        echo "DÉBUT DE LA PARTIE";
        echo "<br>";
        echo "-------------------------------------------";

        // Creates a hero and displays initial information
        $hero = $this -> createHero(rand(0, 2));
        echo "<br>";
        echo "TON INCARNES : ".$hero -> getCharacterName()."<br>"."<br>";
        echo "TU AS ".$hero -> getMarblesNumber()." billes";
        echo "<br>";
        echo "-------------------------------------------";

        // Creates enemies and initiates the fight
        $ennemyArray = $this -> createEnnemy(rand(0, 2));
        
        for ($i=0; $i < count($ennemyArray); $i++) { 
            if ($hero -> getMarblesNumber() <= 0){
                echo "Tu n'as plus de billes";
                echo "<br>"."<br>";
                break;
            } else {
                echo "Tu as maintenant ".$hero->getMarblesNumber()." billes";
                echo "<br>"."<br>";

                $this -> meeting($ennemyArray[$i]);
                $this -> fight($hero, $ennemyArray[$i]);
            }
        }

        // Displays the result of the game
        if ($hero -> getMarblesNumber() <= 0){
            echo "-------------------------------------------";
            echo "<br>";
            echo "TU AS PERDU DOMMAGE POUR LES 45,6 MILLIARDS DE WON NORD-CORÉEN!";
            echo "<br>";
            echo "-------------------------------------------";
        } else {
            echo "-------------------------------------------";
            echo "<br>";
            echo "TU AS GAGNÉ 45,6 MILLIARDS DE WON NORD-CORÉEN !!";
            echo "<br>";
            echo "-------------------------------------------";
        }
    }
}

?>
