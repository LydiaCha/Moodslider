<?php

//MoodController is responsible for viewing the slider and the movie recommendations
class MoodController {

    public function view() {
        require_once('views/mood/moodslider.php');
    }

    public function recommendations() {
        //Getting the slider values in order to get movie recommendations based on the user's mood
        $agitatedCalmSlider = $_GET["agitatedCalmSlider"];
        $happySadSlider = $_GET["happySadSlider"];
        $tiredWideawakeSlider = $_GET["tiredWideawakeSlider"];
        $scaredFearlessSlider = $_GET["scaredFearlessSlider"];

        $agitated = 0;
        $calm = 0;
        $happy = 0;
        $sad = 0;
        $tired = 0;
        $wideawake = 0;
        $scared = 0;
        $fearless = 0;

        $sliderMidpoint = 50;
        //Calculating the user's mood based on the slider values
        if ($agitatedCalmSlider < $sliderMidpoint) {
            $agitated = $sliderMidpoint - $agitatedCalmSlider;
        } else if ($agitatedCalmSlider > $sliderMidpoint) {
            $calm = $agitatedCalmSlider - $sliderMidpoint;
        }

        if ($happySadSlider < $sliderMidpoint) {
            $happy = $sliderMidpoint - $happySadSlider;
        } else if ($happySadSlider > $sliderMidpoint) {
            $sad = $happySadSlider - $sliderMidpoint;
        }

        if ($tiredWideawakeSlider < $sliderMidpoint) {
            $tired = $sliderMidpoint - $tiredWideawakeSlider;
        } else if ($tiredWideawakeSlider > $sliderMidpoint) {
            $wideawake = $tiredWideawakeSlider - $sliderMidpoint;
        }

        if ($scaredFearlessSlider < $sliderMidpoint) {
            $scared = $sliderMidpoint - $scaredFearlessSlider;
        } else if ($scaredFearlessSlider > $sliderMidpoint) {
            $fearless = $scaredFearlessSlider - $sliderMidpoint;
        }

        $moods = array(
            "Agitated" => $agitated,
            "Calm" => $calm,
            "Happy" => $happy,
            "Sad" => $sad,
            "Tired" => $tired,
            "Wideawake" => $wideawake,
            "Scared" => $scared,
            "Fearless" => $fearless
        );
        //Sorting moods based on best match for user
        arsort($moods);

        //Opening mood.xml and then maping to movie recommendations based on the slider values
        $movies = array();
        $xmlFile = "uploads/mood.xml";
        if (file_exists($xmlFile)) { //If no file exists, show placeholder
            $xmldata = simplexml_load_file($xmlFile);
            foreach ($xmldata->children() as $programme) {
                $programmeMood = (string) $programme->mood; //xml object is not a string causes problem with array_key_exists
                if (array_key_exists($programmeMood, $movies)) {
                    array_push($movies[$programmeMood], $programme);
                } else {
                    $movies[$programmeMood] = Array($programme);
                }
            }

            $moods = array_keys($moods);
            $moodcards = [];

            foreach ($moods as $mood) {
                if(isset($movies[$mood])) { //lets you upload an xml file with less movies than moods
                    $programmes = $movies[$mood];

                    foreach ($programmes as $programme) {
                        $moodCard = array("name" => $programme->name,
                            "image" => $programme->image);
                        array_push($moodcards, $moodCard);
                    }
                }
            }
            
            //lets you upload an xml file with less than 5 movie recommendations
            $maxCards = 5;
            if(count($moodcards) < $maxCards) {
                $maxCards = count($moodcards);
            }
            
            //loop 5 times so that only 5 movie recommendations come up each time
            for ($x = 0; $x < $maxCards; $x++) {
                $moodCard = $moodcards[$x];
                $name = $moodCard['name'];
                $image = $moodCard['image'];

                require('views/mood/moodcard.php');
            }
        } else {
            //loop 5 times for placeholders
            for ($x = 0; $x < 5; $x++) {
                require('views/mood/mood_placeholder.php');
            }
        }
    }

}
