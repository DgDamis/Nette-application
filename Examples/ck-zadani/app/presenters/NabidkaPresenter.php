<?php

namespace App\Presenters;

use Nette;
use App\Model\NabidkaManager;
use Nette\Application\UI\Form;

class NabidkaPresenter extends BasePresenter {

    private $nabidkaManager;

    function __construct(NabidkaManager $nabidkaManager) {
        $this->nabidkaManager = $nabidkaManager;
    }

    public function renderDefault($order = 'id') {
        $this->template->zajezdy = $this->nabidkaManager->readAll($order);
    }

    public function renderView($id) {
        $this->template->zajezd = $this->nabidkaManager->readByID($id);
    }

    public function renderCreate() {
        
    }

    public function renderUpdate($id) {
        $data = $this->nabidkaManager->readByID($id);
        $data = $data->toArray();
        $data['datum'] = $data['datum']->format('Y-m-d');
        $this['nabidkaForm']->setDefaults($data);
    }

    public function actionDelete($id) {
        $this->nabidkaManager->delete($id);
        $this->flashMessage("Záznam úspěšně smazán");
        $this->redirect("default");
    }

    protected function createComponentNabidkaForm() {
        $form = new Form;
        $form->addText('destinace', 'Místo pobytu:')
                ->setRequired(true)
                ->addRule(Form::MAX_LENGTH, "Nezadávejte více než 100 znaků", 100);
        $form->addTextArea('popis', 'Popis:', 50);
        $form->addInteger('cena', 'Cena:')
                ->setRequired(true)
                ->addRule(Form::MIN, "Cena nesmí být záporná", 0);
        $form->addText('datum', 'Začátek pobytu:')
                ->setRequired(true);
        $form->addInteger('delka', 'Délka pobytu:')
                ->setRequired(true)
                ->addRule(Form::RANGE,"Délka musí být v rozsahu 1-30 nocí.", [1,30]);
        $doprava = [
            'auto' => 'auto',
            'autobus' => 'autobus',
            'kombinovaná' => 'kombinovaná',
            'letadlo' => 'letadlo',
        ];
        $form->addSelect('doprava', "Doprava:", $doprava);
        $form->addSubmit('send', 'Potvrdit');
        $form->onSuccess[] = [$this, 'nabidkaFormSucceeded'];
        return $form;
    }

    public function nabidkaFormSucceeded(Form $form, \stdClass $values) {
        
        if($this->getParameter('id')){
            $this->flashMessage('Záznam úspěšně aktualizován.');
            $this->nabidkaManager->update($this->getParameter('id'),$values);
        }
        else{
            $this->flashMessage('Záznam úspěšně přidán.');
        $this->nabidkaManager->create($values);
        }
        
        $this->redirect('default');
    }

}
