
# Math library  
 This library used on project Wedding Expert (https://www.wed-expert.com).
 Данная библиотека используется в сервисе Свадебный эксперт (https://www.wed-expert.com).
  

For install by composer run:   
Для установки библиотеки:  

     composer require smskin/math  

## Combinatorics  
A package that returns all the combinations and permutations, without repitition, of a given set and subset size. Associative arrays are preserved.  
Script based on library Math_Combinatorics with some changes.  
URL of original library http://pyrus.sourceforge.net/Math_Combinatorics.html  


---
Данная библиотека возвращает все возможные уникальные комбинации и перемещения последовательностей элементов массива. 
Библиотека базируется на скрипте Math_Combinatorics с некоторыми изменениями.
URL оригинальной библиотеки: http://pyrus.sourceforge.net/Math_Combinatorics.html

**Пример использования:**

Мне требовалось прописать мета теги для SEO с правилами для фильтров каталога. 

 1. При указании минимального среднего чека в фильтре - подставляется
    Title "Недорогие рестораны". 
    
 2. При указании минимального среднего чека + указании типа события "Ресторан" - генерировался Title "Недорогие рестораны на свадьбу".

Проблема возникла в тот момент, когда типов событий стало слишком много и потребовалось использовать маску для генерации (?check=1&type=*).
Необходимо было налету быстро проверять наличие данных правил в таблице SEO и генерировать мета теги.

Соответственно приняли решение:
1. Разбираем GET параметры на элементы массива
2. Обрабатываем параметры с помощью метода  combinations с заменой каждого элемента на *
3. Получаем набор всех возможных масок запросов, которые мог бы сгенерировать SEO-шник. В лоб это не решить, т.к. может быть прописано правило из 10 фильтров, 5 из которых является * (any).
4. Получившийся массив прогоняем одним запросом 
5. Профит

Результат:

 1. Страница ресторанов без фильтра: https://msk.wed-expert.com/categories/restaurants-and-cafes
 2. Страница ресторанов с фильтром минимального среднего чека:  https://msk.wed-expert.com/categories/restaurants-and-cafes?average_check=0
 3. Страница ресторанов с фильтрами минимального среднего чека и (any) для фильтра события https://msk.wed-expert.com/categories/restaurants-and-cafes?average_check=0&event=1

 ---
Methods:  
 - `combinations(array $set, $subsetSize = null)`
 Find all combinations given a set and a subset size. 
 Ищет все комбинации элементов массива в рамках ограничения количества элементов в результате  (`$subsetSize`).
 - `permutations(array $set, $subsetSize = null)`
 Find all permutations given a set and a subset size.  
 Ищет все возможные перемещения элементов массива в рамках ограничения количества элементов в результате (`$subsetSize`).
---  
Examples:  
Example script you can find in path '/examples/Combinatorics.php'.   

	// Example of method combinations(); 
	// We want get all combinations of $data array for 2 elements in combination.
	
    $instance = new MathCombinatorics(); 
    $data = ['a1'=>1,'a2'=>2,'a3'=>3]; 
    $subsetSize = 2; 
    $result = $instance->combinations($data,$subsetSize); 
    print_r($result); 
    /* 
    Result data:    
    [    
	     [  
		     'a1'=>1,
		     'a2'=>2  
		 ], 
		 [ 
			 'a1'=>1, 
			 'a3'=>3
		],
		[
			'a2'=>2,
			'a3'=>3
		]
	];    
	*/    
	
    // Example of method permutations();  
    // We want get all permutations of $data array for 2 elements.
     
    $instance = new MathCombinatorics(); 
    $data = ['a1'=>1,'a2'=>2,'a3'=>3]; 
    $subsetSize = 2; 
    $result = $instance->permutations($data,$subsetSize); 
    print_r($result); 
    /* 
    Result data:
    [    
	    [
		    'a1'=>1,
		    'a2'=>2
		],
		[
			'a2'=>2,
			'a1'=>1
		],
		[
			'a1'=>1,
			'a3'=>3
		],
		[
			'a3'=>3,
			'a1'=>1
		],
		[
			'a2'=>2,
			'a3'=>3
		],
		[
			'a3'=>3,
			'a2'=>2
		]
	];
	*/
