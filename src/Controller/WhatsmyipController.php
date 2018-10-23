<?php
/**
 * @file
 * Contains \Drupal\cc_whatsmyip\Controller\WhatsmyipController.
 */
namespace Drupal\cc_whatsmyip\Controller;


class WhatsmyipController {
  public function content() {
    $message=$this->_formatArray($_SERVER);
    $message=$this->_formatArrayToString($message);
    
    \Drupal::logger('cc_whatsmyip')->notice($message);
    
    return array(
      '#type' => 'markup',
      '#markup' => $message
    );
  }
	
  /**
  * Formats array values and keys
  *
  * @param array $aA
  *   An array, typically $_SERVER
  */
  
  private function _formatArray($aA){
	  $aReturn=array();	 
	  foreach($aA as $k => $v){
		  $aReturn[]=$k.': '.$v;		  
	  }
	  return $aReturn;
  }

  /**
  * Formats array into string
  *
  * @param array $aA
  *   An array to be imploed into a string
  */
  
  private function _formatArrayToString($aA){
	  return 'Whatsmyip report <br><br>'.implode('<br>', $aA);
  }
}