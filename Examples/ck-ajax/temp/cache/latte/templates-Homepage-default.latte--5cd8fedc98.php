<?php
// source: D:\studenti\IT3\Smehyl\Nette\ck-zadani\app\presenters/templates/Homepage/default.latte

use Latte\Runtime as LR;

class Template5cd8fedc98 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
		'_zajezd' => 'blockZajezd',
		'scripts' => 'blockScripts',
		'head' => 'blockHead',
	];

	public $blockTypes = [
		'content' => 'html',
		'_zajezd' => 'html',
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
    <h2>Nabídka cestovní kanceláře</h2>
    <div class="row">
        <div class="col-md-6">
<div id="<?php echo htmlSpecialChars($this->global->snippetDriver->getHtmlId('zajezd')) ?>"><?php $this->renderBlock('_zajezd', $this->params) ?></div>        </div>
        <div class="col-md-6">
            
        </div>
    </div>
</div>    
<?php
	}


	function blockZajezd($_args)
	{
		extract($_args);
		$this->global->snippetDriver->enter("zajezd", "static");
		?>            <h3><?php echo LR\Filters::escapeHtmlText($nabidka->destinace) /* line 9 */ ?></h3>
            <p><?php echo LR\Filters::escapeHtmlText($nabidka->popis) /* line 10 */ ?></p>
            <p><a class="ajax btn btn-info" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("nextRecord!", [$offset])) ?>">Další zájezd</a></p>
<?php
		$this->global->snippetDriver->leave();
		
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
