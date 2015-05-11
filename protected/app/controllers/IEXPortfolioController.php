<?php
class IEXPortfolioController extends Controller {
	
	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'piers';
	static $per_page	= '10';

	public function __construct() {
		$this->menus = SiteHelpers::menus(); 
		$this->sidebar = SiteHelpers::menus('sidebar'); 
		$driver = Config::get('database.default');
		$database = Config::get('database.connections');
		$this->db = $database[$driver]['database'];
		
		
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->iexPortfolioModel = new IEXPortfolio();
		$this->iexCompanyModel = new IEXCompany();		
	} 	
	
	public function getIndex()
	{
		$this->layout = View::make($this->layout);
		$this->data['companies'] = $this->iexCompanyModel->getCompanies();
		$this->layout->nest('content','iexportfolio.index',$this->data)
						->with('menus', SiteHelpers::menus());
	}	
	
	public function getCompany($draw = 3){
		$data = array(
			'draw' => $draw,
			'redordsTotal' => 10000,
			'recordsFilter' => 10,
			'data' => $this->iexCompanyModel->getCompanies(0,10)
		);
		echo json_encode($data);
		exit;
	}	
	
}

?> 