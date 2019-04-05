<?php

namespace App\Presenters;

use Nette;
use App\Model\AkceManager;
//use Nette\Application\UI\Form;

class ZooPresenter extends BasePresenter {
	use Nette\SmartObject;

	private $akceManager;


	public function __construct(AkceManager $akceManager)
	{
		$this->akceManager = $akceManager;
	}


	public function renderDefault($order = 'id'){
            $this->template->seznamAkci = $this->akceManager->readAll();
        }
}
