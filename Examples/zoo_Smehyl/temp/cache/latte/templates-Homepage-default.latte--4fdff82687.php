<?php
// source: D:\studenti\IT3\Smehyl\Nette\zoo\app\presenters/templates/Homepage/default.latte

use Latte\Runtime as LR;

class Template4fdff82687 extends Latte\Runtime\Template
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
		if (isset($this->params['akce'])) trigger_error('Variable $akce overwritten in foreach on line 14');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div class="container">
    <table class="table table-striped">
        <thead>
        <th><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("default", ['summary ASC' ])) ?>">Název akce</a></th>
        <th><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("default", ['date DESC' ])) ?>">Konání</a></th>
        <th><a>Typ akce</a></th>
        <th><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("default", ['visitors DESC' ])) ?>">Počet návštěvníků</a></th>
        <th>Operace</th>
        </thead>
        <tbody>
<?php
		$iterations = 0;
		foreach ($seznamAkci as $akce) {
?>
        <tr>
            <td><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("view", [$akce->id])) ?>"><?php
			echo LR\Filters::escapeHtmlText($akce->summary) /* line 16 */ ?></a></td>
            <td><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $akce->date, 'j.n.Y')) /* line 17 */ ?>,<?php
			echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $akce->time, '%H:%I')) /* line 17 */ ?></td>
            <td><?php echo LR\Filters::escapeHtmlText($akce->type) /* line 18 */ ?></td>
            <td><?php echo LR\Filters::escapeHtmlText($akce->visitors) /* line 19 */ ?></td>
            <td><a class="btn btn-info" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("update", [$akce->id])) ?>">Změnit</a> <a class="btn btn-danger" href="<?php
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("delete", [$akce->id])) ?>">Vymazat</a></td>
        </tr>
<?php
			$iterations++;
		}
?>
        </tbody>
        
    </table>
        <a class="btn btn-success" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("create")) ?>">Přidat novou akci</a>
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
