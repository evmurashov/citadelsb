<?php
$rootActivity = $this->GetRootActivity();
$number = $rootActivity->GetVariable("no_avto");

// Перевести регистр
$number = mb_strtoupper($number);

// Убрать пробелы
$number = str_replace(' ', '', $number);

// Разобрать строку
$a = mb_substr ($number, 0, 1);
$a = $a.' ';
$nnn = mb_substr ($number, 1, 3);

// Проверка 3 цифр номера
	if (strspn($nnn, "1234567890") != 3):
		$rootActivity->SetVariable('no_avto', 'Нестандартный номер');
	else:
		$nnn = $nnn.' ';
		$aa = mb_substr ($number, 4, 2);
		$aa = $aa.' ';
		$nn = mb_substr ($number, 6);

		// Проверка 2 цифр номера
		if (strspn($nn, "1234567890") == 2):
			$nn = $nn.'';
			$number = $a.$nnn.$aa.$nn;
			$rootActivity->SetVariable('no_avto', $number);
		elseif (strspn($nn, "1234567890") == 3):
			$nn = $nn.'';
			$number = $a.$nnn.$aa.$nn;
			$rootActivity->SetVariable('no_avto', $number);
		else: $rootActivity->SetVariable('no_avto', 'Нестандартный номер');
		endif;
	endif;
?>