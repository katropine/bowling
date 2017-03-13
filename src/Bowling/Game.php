<?php
namespace Bowling;
/**
 * @package    Bowling
 * @author     kristian@katropine.com
 * @copyright  Katropine (c) 2013, katropine.com
 * @since Feb 21, 2014
 * 
 * strike "X" 10 + strikeBonus
 * spare "/"  10 + spareBonus
 * miss "-"
 */
class Game{
    
    protected $score = 0;
    protected $rolles = null;
    
    public function __construct($roles){
        foreach (str_split($roles) as $char){
            if($char == 'X' || $char == '/'){
                $this->rolles[] = 10;
            }elseif($char == '-'){
                $this->rolles[] = 0;
            }else{
                $this->rolles[] = $char;
            }
        }
    }
    /**
     * Calculate the score
     * 
     * @return int
     */
    public function calculate(){

        for($roll = 0, $frame = 0; $frame < 10; $frame++){
            if($this->rolles[$roll] == 10){ // strike
                $strikeBonus = $this->rolles[$roll+1] + $this->rolles[$roll+2];
                $this->score += 10 + $strikeBonus; 
                $roll += 1;
            }else if($this->rolles[$roll] + $this->rolles[$roll] == 10){ // spare
                $spareBouns = $this->rolles[$roll+2];
                $this->score += 10 +  $spareBouns;
                $roll += 2;
            }else if($this->rolles[$roll] == 0){ // miss
                // do nothing
            }else{
                $this->score += $this->rolles[$roll] + $this->rolles[$roll+1]; 
                $roll += 2;
            }
            
        }
        return $this->score;
    }
    
}

 
