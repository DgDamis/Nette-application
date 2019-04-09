<?php

namespace App\Presenters;

use Nette;
use App\Model\NabidkaManager;
use Nette\Application\UI\Form;
use Nette\Utils\DateTime;


class NabidkaPresenter extends BasePresenter
{
    private $nabidkaManager;
    
    function __construct(NabidkaManager $nabidkaManager) {
        $this->nabidkaManager = $nabidkaManager;
    }

    
    public function renderDefault($order='id')
    {
    	$this->template->zajezdy = 
                $this->nabidkaManager->readAll($order);
    }

    public function renderView($id)
    {
    	$this->template->zajezd = 
                $this->nabidkaManager->readById($id);
    }
    
    public function renderCreate(){        
    }
    
    public function renderUpdate($id){ 
        $data = $this->nabidkaManager->readById($id);
        $data = $data->toArray();
        $data['datum'] = $data['datum']->format('Y-m-d');
        if (!$data) {
            $this->error('Data nebyla nalezena');
        }
        $this['nabidkaForm']->setDefaults($data);
    }

    public function actionDelete($id){ 
        $this->nabidkaManager->delete($id);
        $this->flashMessage("Záznam úspěšně smazán");
        $this->redirect("default");
    }
    
    protected function createComponentNabidkaForm()
    {
        $form = new Form;
        $form->addText('destinace', 'Místo pobytu:')
             ->addRule(Form::MAX_LENGTH,'Nezadávejte více než 100 znaků',100)                   
             ->setRequired(true);
        $form->addTextArea('popis', 'Popis:', 50);
        $form->addInteger('cena', 'Cena')
             ->addRule(Form::MIN,'Cena nesmí být záporná',0)   
             ->setRequired(true);
        $form->addText('datum', 'Začátek pobytu:')
                ->setAttribute('type','date')
             ->setRequired(true);
        $form->addInteger('delka', 'Délka pobytu:')
             ->addRule(Form::RANGE,'Délka pobytu musí být v rozmezí 1 až 30 dnů',1,30)   
             ->setRequired(true);
        $doprava = [
            'auto' => 'auto',
            'autobus' => 'autobus',
            'letadlo' => 'letadlo',
            'kombinovaná' => 'kombinovaná'
        ];
        $form->addSelect('doprava', 'Způsob dopravy:', $doprava);
        $form->addSubmit('send', 'Potvrdit');
        $form->onSuccess[] = [$this, 'nabidkaFormSucceeded'];
        return $form;
    }

    // volá se po úspěšném odeslání formuláře
    public function nabidkaFormSucceeded(Form $form, \stdClass $values)
    {
        if ($id=$this->getParameter('id')) {
            $this->nabidkaManager->update($id, $values);
            $this->flashMessage('Záznam byl aktualizován.');
        } else {
            $this->nabidkaManager->create($values);
            $this->flashMessage('Byl vložen nový záznam.');            
        }    
        $this->redirect('Nabidka:default');
    }
    
}
