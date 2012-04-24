<?php

/***************************************************************\
 * @author Mr. Sota
 * @license Creative Commons Attribution-NonCommercial-NoDerivs
 * @copyright 2012
 * @website mr-sota.com
 * @comment Special for RuBukkit.org by Mr. Sota
 * @url goo.gl/DGSbR
 * @releases goo.gl/7S84a
\***************************************************************/

/*
!Приоритеты!
Формула/скидка в классе() - 1
Формула/скидка в конфиге - 5
Формула/скидка в дату - 10
!Приоритеты!
*/

if(!defined('INC_CHK')) die('HACK');

class OFFER{
	
	protected static $Instance;	
	protected $offer, $item, $formula;
	
    public static function init() {
        if ( is_null(self::$Instance) ) {
            self::$Instance = new DBRequest;
        }
        return self::$Instance;
    }
    private function __construct(){
		define('CONF', time());
		include './config.offer.php';
		$this->formula = (FORMULA != '')?eval(FORMULA):'';
		$this->offer = (OFFER != '')?OFFER:false;
		$this->decode_dates();
		return true;
	}
    private function __copy(){
    }
    private function __wakeup(){
    } 
	
	public function check(){
		
	}
	
	private function generate_new_offer(){
		$this->offer = '';
	}
	
	private function select_new_item(){
		$num = count($this->select('SELECT `id` FROM `'.IDTABLE.'`'));
		$arr = array();
		$sum = 0;
		for($i=0;$i<RAND;$i++){
			$sum = $sum + rand(0,$num);
		}
		$sum = $sum % RAND;
		return $sum;
	}
	
	private function decode_dates(){
		foreach(DATES as $date => $action){
			$action = explode('{EXP}',$action);
			if(date("dm") == $date){
				switch($action[0]){
					case 'formula':
						$this->formula = $action[1];
					break;	
					case 'define':
						$this->offer = $action[1];
					break;
					default:
						return false;
						exit;
					break;
				}
			}
		}
	}
	
}

?>