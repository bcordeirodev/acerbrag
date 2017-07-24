<?php $lang = Language::getInstance('SystemAccess');?>
<h1><?php echo $lang->getSentence('error.accessDenied.title')?></h1>
<?php echo new MessageComponent(Text::toHtml($lang->getSentence('error.accessDenied.description')), MessageComponent::RED)?>