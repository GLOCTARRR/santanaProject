<?php

/**
 * Created by IntelliJ IDEA.
 * User: GLOCTARR
 * Date: 26.07.2017
 * Time: 1:01
 */
class Page extends AppModel
{

	public $validate =[
		'title' =>[
			'rule' => 'notEmpty',
			'message' => 'введите название товара'
		],
		'body' =>[
			'rule' => 'notEmpty',
			'message' => 'добавте описание товара'
		],
		'alias' =>[
			'alphanumeric' => [
				'rule' => 'alphanumeric',
				'message' => 'заполните поле, допускаются буквы и цифры'
			],
			'unique' => [
				'rule' => 'isUnique',
				'message' => 'Такой алиас уже есть, выбирет другой'
			]
		]
	];
}
