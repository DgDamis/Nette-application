<?php
// source: D:\studenti\IT3\Smehyl\Nette\ck-zadani\app\presenters/templates/Nabidka/view.latte

use Latte\Runtime as LR;

class Template7ed828ac6c extends Latte\Runtime\Template
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
    <h2><?php echo LR\Filters::escapeHtmlText($zajezd->destinace) /* line 5 */ ?></h2>
    <p>Datum odjezdu: <?php echo LR\Filters::escapeHtmlText($zajezd->datum) /* line 6 */ ?> , doprava <?php
		echo LR\Filters::escapeHtmlText($zajezd->doprava) /* line 6 */ ?></p>
    <p>Delka pobytu: <?php echo LR\Filters::escapeHtmlText($zajezd->delka) /* line 7 */ ?> nocí, cena <?php
		echo LR\Filters::escapeHtmlText($zajezd->cena) /* line 7 */ ?></p>
    <p>Popis:</p>
    <p><?php echo LR\Filters::escapeHtmlText($zajezd->popis) /* line 9 */ ?></p>
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
