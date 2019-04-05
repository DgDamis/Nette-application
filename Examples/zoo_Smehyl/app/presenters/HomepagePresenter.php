<?php

namespace App\Presenters;

use Nette;
use App\Model\AkceManager;
use Nette\Application\UI\Form;


class HomepagePresenter extends BasePresenter
{
        private $akceManager;


	public function __construct(AkceManager $akceManager)
	{
		$this->akceManager = $akceManager;
	}
    
    
	public function renderDefault($order = 'id'){
            $this->template->seznamAkci = $this->akceManager->readAll($order);
        }
        
        public function renderView($id){
            $this->template->akce = $this->akceManager->readByID($id);
        }
        
        public function renderUpdate($id){
        $data = $this->akceManager->readByID($id);
        $data = $data->toArray();
        $data['date']= $data['date']->format('j.n.Y');
        $data['time']= $data['time']->format('%H:%I');
        $this['akceForm']->setDefaults($data);
        }
        
        public function actionDelete($id){
           $this->akceManager->delete($id);
           $this->flashMessage("Akce byla smazána");
           $this->redirect('default');
        }
        public function createComponentAkceForm(){
                $form = new Form;
		$form->addText('summary', 'Název Akce:')
                        ->setRequired(true)
                        ->addRule(Form::MAX_LENGTH, 'Maximální délka 100 znaků.', 100);
		$form->addText('date', 'Datum konání:')
                        ->setRequired(false)
                        ->addRule(Form::PATTERN, 'Správý formát DD:MM:YYYY', '^([0]?[1-9]|[1|2][0-9]|[3][0|1])[./-]([0]?[1-9]|[1][0-2])[./-]([0-9]{4}|[0-9]{2})$');
                
                $form->addText('time', 'Čas konání:')
                        ->setRequired(false)
                        ->addRule(Form::PATTERN, 'Správý formát HH:MM (HH max 12)', '^[0-2][0-9]:[0-5][0-9]$');

                $form->addText('description', 'Popis akce:');
                
                $form->addText('type', 'Typ akce:');
                
                $form->addInteger('visitors', 'Počet návštěvníků:')
                        ->setRequired(false)
                        ->addRule(Form::MAX_LENGTH, 'Maximální šestimísté číslo.', 6);

		$form->addSubmit('send', 'Odeslat');

		$form->onSuccess[] = [$this,'AkceFormSucceeded'];
		return $form;
        
        }
        
        public function AkceFormSucceeded(Nette\Application\UI\Form $form, \stdClass $values)
    {
        if($this->getParameter('id')){
            $this->akceManager->update($this->getParameter('id'), $values);
            $this->flashMessage('záznam úspěšně upraven.');
            $this->redirect('Homepage:');
        }
        else{ 
            $this->akceManager->create($values);
        $this->flashMessage('záznam úspěšně přidán.');
        $this->redirect('Homepage:');
        }
    }
}
