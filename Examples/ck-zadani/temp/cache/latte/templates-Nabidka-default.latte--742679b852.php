<?php
// source: D:\studenti\IT3\Smehyl\Nette\ck-zadani\app\presenters/templates/Nabidka/default.latte

use Latte\Runtime as LR;

class Template742679b852 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
		'scripts' => 'blockScripts',
		'head' => 'blockHead',
	];

	public $blockTypes = [
		'content' => 'html',
		'scripts' => 'html',
		'head' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
?>

<?php
		$this->renderBlock('scripts', get_defined_vars());
?>


<?php
		$this->renderBlock('head', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['zajezd'])) trigger_error('Variable $zajezd overwritten in foreach on line 15');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div class="container">
    <h1 class="text-center">Přehled zájezdů</h1>
    <table class="table table-bordered">
        <thead>
        <th><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Nabidka:default", ['destinace'])) ?>">Destinace</a></th>
        <th><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("default", ['datum DESC'])) ?>">Den odjezdu</a></th>
        <th><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("default", ['delka'])) ?>">Počet nocí</a></th>
        <th><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("default", ['cena DESC'])) ?>">Cena</a></th>
        <th>Akce</th>
        </thead>
        <tbody>
<?php
		$iterations = 0;
		foreach ($zajezdy as $zajezd) {
?>
        <tr>
            <td><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("view", [$zajezd->id])) ?>"><?php
			echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $zajezd->destinace)) /* line 17 */ ?></a></td>
        <td class="text-center"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $zajezd->datum, 'j. n. Y')) /* line 18 */ ?></td>
        <td class="text-center"><?php echo LR\Filters::escapeHtmlText($zajezd->delka) /* line 19 */ ?></td>
        <td><?php echo LR\Filters::escapeHtmlText($zajezd->cena) /* line 20 */ ?> Kč</td>
        <td><a class="btn btn-info" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("update", [$zajezd->id])) ?>">Upravit</a> <a class="btn btn-danger" href="<?php
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("delete", [$zajezd->id])) ?>">Smazat</a></td>
        </tr>
<?php
			$iterations++;
		}
?>
    </tbody>
    </table>
    <a class="btn btn-success" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("create")) ?>">Nový</a>
</div>    
<?php
	}


	function blockScripts($_args)
	{
		extract($_args);
		$this->renderBlockParent('scripts', get_defined_vars());
		
	}


	function blockHead($_args)
	{
		
	}

}
