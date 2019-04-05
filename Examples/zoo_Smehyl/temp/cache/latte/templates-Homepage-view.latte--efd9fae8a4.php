<?php
// source: D:\studenti\IT3\Smehyl\Nette\zoo\app\presenters/templates/Homepage/view.latte

use Latte\Runtime as LR;

class Templateefd9fae8a4 extends Latte\Runtime\Template
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
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div class="container">
    <div class="col-sm-6">
        <h2><?php echo LR\Filters::escapeHtmlText($akce->summary) /* line 6 */ ?></h2>
        <p><?php echo LR\Filters::escapeHtmlText($akce->description) /* line 7 */ ?></p>
        <hr>
        <p>Typ akce: <?php echo LR\Filters::escapeHtmlText($akce->type) /* line 9 */ ?></p>
        <p>Konání akce: <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $akce->date, 'j.n.Y')) /* line 10 */ ?>,<?php
		echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $akce->time, '%H:%i')) /* line 10 */ ?></p>
        <p>Počet účastníků: <?php echo LR\Filters::escapeHtmlText($akce->visitors) /* line 11 */ ?></p>
    </div>
    <div class="col-sm-6">
        <img src="/images/mapa.jpg" class="img-responsive">Orientační plán ZOO</img>
    </div>
    <div class="col-sm-2">
    <a class="text text-left" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("default")) ?>">Zpět</a>
    </div>
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
