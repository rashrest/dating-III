<?php
class Datalayer{
    static function getIndoor(){
        return array('tv','movies','cooking','board game', 'puzzles', 'reading', 'playing cards', 'video games');
    }

    static function getOutdoor(){
        return array('hiking', 'biking', 'swimming', 'collecting', 'walking', 'climbing');
    }


}