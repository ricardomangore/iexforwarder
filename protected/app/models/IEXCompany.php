<?php

class IEXCompany {
	
	public function __construct(){
		
		
	}
	
	public function getCompanies($offset = 0, $count = 20){
		$data = DB::select("SELECT id_company,irs,name FROM iex_company LIMIT $offset, $count");
		$result = array();
		foreach($data as $row ){
			foreach($row as $k => $v){
				$arr = array($row->id_company,$row->irs,$row->name);
			}
			array_push($result,$arr);
		}
		return $result;
	}
	
	public function getCompaniesJson($offset = 0, $count = 20){
		return json_encode($this->getCompanies($offset, $count));
	}
	
}