<?php
class PortfolioController extends BaseController {
	
	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'piers';
	static $per_page	= '10';

	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		/*$this->model = new Piers();
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);
	
		$this->data = array(
			'pageTitle'	=> 	$this->info['title'],
			'pageNote'	=>  $this->info['note'],
			'pageModule'=> 'piers',
			'trackUri' 	=> $this->trackUriSegmented()	
		);*/		
	} 	
	
	public function getIndex()
	{
		$this->layout->nest('content','portfolio.index',$this->data)
						->with('menus', SiteHelpers::menus());
	}		
	
}

?> 