
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Create_html {

    /*public function __construct() {
        parent::__construct();
    }*/
    
    public function input_type($type,$attr,$value){
    	$string='';
    	$attributes='';
    	if(!empty($attr)){
			
	    	foreach($attr as $name=>$param){
				$attributes.= "$name='$param' ";
			}
		}
		$string="<input type='".$type."' value='".$value."' $attributes />";
		
		return $string;
	}
	
	public function input_area($value,$attr){
    	$string='';
    	$attributes='';
    	if(!empty($attr)){
			
	    	foreach($attr as $name=>$param){
				$attributes.= "$name='$param' ";
			}
		}
		$string="<textarea $attributes >$value</textarea>";
		
		return $string;
	}
	
	public function start_form($attr){
		$attributes='';
		$string='';
		if(!empty($attr)){
			foreach($attr as $name=>$param){
				$attributes.= "$name='$param' ";
			}
		}
		$string="<form $attributes >";
		return $string;
	}
	
	public function end_form(){
		return "</form>";
	}
	
	public function create_label($value,$attr){
		$attributes='';
		$string='';
		if(!empty($attr)){
			foreach($attr as $name=>$param){
				$attributes.= "$name='$param'";
			}
		}
		$string="<label style='margin:20px 30px 0px 20px;' $attributes >".$value."</label>";
		return $string;
	}
    
    public function create_span($value,$attr){
		$attributes='';
		$string='';
		if(!empty($attr)){
			foreach($attr as $name=>$param){
				$attributes.= "$name='$param'";
			}
		}
		$string="<span style='margin:20px 30px 0px 20px;' $attributes >".$value."</span>";
		return $string;
	}
    
    
}

/* End of file Create_html.php */