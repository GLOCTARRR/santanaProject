<?php

/**
 * Created by IntelliJ IDEA.
 * User: GLOCTARR
 * Date: 17.06.2017
 * Time: 18:14
 */
class Product extends AppModel
{
	public $belongsTo = 'Category';

	public $validate =[
		'title' =>[
			'rule' => 'notEmpty',
			'message' => 'введите название товара'
		],
		'body' =>[
			'rule' => 'notEmpty',
			'message' => 'добавте описание товара'
		],
		'price' =>[
			'rule' => 'numeric',
			'message' => 'Введите цену товара'
		]
	];
}
