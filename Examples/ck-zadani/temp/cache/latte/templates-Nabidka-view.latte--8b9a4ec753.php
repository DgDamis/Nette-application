<?php
// source: D:\www\ck-zadani\app\presenters/templates/Nabidka/view.latte

use Latte\Runtime as LR;

class Template8b9a4ec753 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'content' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
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
 <h2><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $zajezd->destinace)) /* line 5 */ ?></h2>
 <p>Datum: <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $zajezd->datum, 'j. n. Y')) /* line 6 */ ?></p>
 <p>Počet nocí: <?php echo LR\Filters::escapeHtmlText($zajezd->delka) /* line 7 */ ?>, cena: <?php echo LR\Filters::escapeHtmlText($zajezd->cena) /* line 7 */ ?> Kč</p>
</div><?php
	}

}
