<?php

namespace App\Presenters;

use Nette;
use App\Model;
use App\Model\NabidkaManager;
use Tracy\Debugger;

class HomepagePresenter extends BasePresenter {
    
    private $nabidkaManager;
    
    function __construct(NabidkaManager $nabidkaManager) {
        $this->nabidkaManager = $nabidkaManager;
    }

    public function renderDefault($offset='0') {
        if($this->isAjax()){
            $this->redrawControl('zajezd');
            Debugger::barDump('ANO', 'AJAX');
        }
        else {
        $this->template->offset = $this->nabidkaManager->readByLimit(1, $offset+1) ? $offset+1 : 0;
        $this->template->nabidka = $this->nabidkaManager->readByLimit(1, $offset);
        Debugger::dump($this->template->nabidka,'Záznam z databáze');
        }
    }
    
    public function handleNextRecord($offset){
        if($this->isAjax()){
        $this->template->offset = $this->nabidkaManager->readByLimit(1, $offset+1) ? $offset+1 : 0;
        $this->template->nabidka = $this->nabidkaManager->readByLimit(1, $offset);
        Debugger::barDump($this->template->nabidka,'Záznam z databáze');
    }
    }
}
