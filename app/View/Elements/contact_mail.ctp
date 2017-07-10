<?php

echo $this->Form->create(null, [
	'controller' => 'pages',
	'action' => 'sendmail'
]);

echo $this->Form->input('subject', ['label' => 'Тема']);
echo $this->Form->input('email', ['label' => 'Email']);
echo $this->Form->input('text', ['label' => 'Текст', 'type' => 'textarea']);
echo $this->Form->end('Отправить');

