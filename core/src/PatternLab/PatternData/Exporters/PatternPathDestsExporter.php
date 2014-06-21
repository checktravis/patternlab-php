<?php

/*!
 * Pattern Data Pattern Path Destinations Exporter Class
 *
 * Copyright (c) 2014 Dave Olsen, http://dmolsen.com
 * Licensed under the MIT license
 *
 * Generates an array of the final paths (e.g. to HTML) of the patterns
 *
 */

namespace PatternLab\PatternData\Exporters;

use \PatternLab\Config;
use \PatternLab\PatternData;

class PatternPathDestsExporter extends \PatternLab\PatternData\Exporter {
	
	public function __construct($options = array()) {
		
		parent::__construct($options);
		
	}
	
	public function run() {
		
		$patternPathDests = array();
		
		foreach (PatternData::$store as $patternStoreKey => $patternStoreData) {
			
			if (($patternStoreData["category"] == "pattern") && !$patternStoreData["hidden"]) {
				
				$nameDash = $patternStoreData["nameDash"];
				$typeDash = $patternStoreData["typeDash"];
				
				if (!isset($patternPathDests[$typeDash])) {
					$patternPathDests[$typeDash] = array();
				}
				
				$patternPathDests[$typeDash][$nameDash] = $patternStoreData["pathDash"];
				
			}
			
		}
		
		return $patternPathDests;
		
	}
	
}