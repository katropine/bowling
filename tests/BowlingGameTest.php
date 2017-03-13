<?php
require_once '../src/Bowling/Game.php';
/**
 * @package    Bowling
 * @author     kristian@katropine.com
 * @copyright  Katropine (c) 2013, katropine.com
 * @since Feb 21, 2014
 */

class BowlingGameTest extends PHPUnit_Framework_TestCase {
    
    public function testAllStrikes(){
        $game = new \Bowling\Game('XXXXXXXXXXXX');
        $this->assertEquals(300, $game->calculate());
    }
    public function testWithMiss(){
        $game = new \Bowling\Game('9-9-9-9-9-9-9-9-9-9-');
        $this->assertEquals(90, $game->calculate()); 
    }
    public function testWithSpare(){
        $game = new \Bowling\Game('5/5/5/5/5/5/5/5/5/5/5');
        $this->assertEquals(150, $game->calculate()); 
    }
    public function testWithOnes(){
        $game = new \Bowling\Game('11111111111111111111');
        $this->assertEquals(20, $game->calculate()); 
    }
    
}
