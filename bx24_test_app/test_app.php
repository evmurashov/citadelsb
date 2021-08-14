<?php
	var params = {
		'CODE': 'md5',
		'HANDLER': 'http://sigurd.office.bitrix.ru/bp/ping.php',
		'AUTH_USER_ID': 1,
		'USE_SUBSCRIPTION': 'Y',
		'NAME': {
			'ru': 'MD5 генератор',
			'en': 'MD5 generator'
		},
		'DESCRIPTION': {
			'ru': 'Действие возвращает MD5 хеш от входящего параметра',
			'en': 'Activity returns MD5 hash of input parameter'
		},
		'PROPERTIES': {
			'inputString': {
				'Name': {
					'ru': 'Входящая строка',
					'en': 'Input string'
				},
				'Description': {
					'ru': 'Введите строку, которую вы хотите хешировать',
					'en': 'Input string for hashing'
				},
				'Type': 'string',
				'Required': 'Y',
				'Multiple': 'N',
				'Default': '{=Document:NAME}',
			}
		},
		'RETURN_PROPERTIES': {
			'outputString': {
				'Name': {
					'ru': 'MD5',
					'en': 'MD5'
				},
				'Type': 'string',
				'Multiple': 'N',
				'Default': null
			}
		}
	};
	
	BX24.callMethod(
		'bizproc.activity.add',
		params,
		function(result)
		{
			if(result.error())
				alert("Error: " + result.error());
			else
				alert("Успешно: " + result.data());
		}
	);
?>