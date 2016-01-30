<?php 

/**
 * stgbot - Simple text generator based on a template
 * Простой шаблонизатор текста
 */
 
class Stgbot
{
	/**
	 * Строка, содержащая исходный шаблон
	 */
	protected $original_tmp_body = null;
	
	/**
	 * Строка, содержащая обработанный шаблон
	 */
	protected $result_tmp_boby = null;
	
	/**
	 * Массив, содержащий метки и их значения
	 */
	protected $labels = array();
	
	/**
	 * Данный метод принимает путь к файлу шаблона
	 * Если файл существует, то загружает его, иначе генерирует исключение
	 *
     	 * $path: string
	 */
	public function loadFromFile($path)
	{
		ob_start();
			
		require $path;
			
		$this->original_tmp_body = ob_get_clean();
	}
	
	/**
	 * Данный метод принимает исходный шаблон в виде строки
	 *
	 * $original_tmp_body: string
	 */
	public function loadAsString($original_tmp_body)
	{
		$this->original_tmp_body = $original_tmp_body;
	}
	
	/**
	 * Назначение меток и их значений
	 *
	 * $labels: array("label" => "value")
	 */
	public function assign($labels)
	{
		$labels = (array)$labels;
		foreach($labels as $k => $v)
			$this->labels[$k] = $v;
	}
	
	/**
	 * Обработка исходного шаблона
	 */
	public function proccess()
	{
		$l = array_keys( $this->labels );
		$r = array_values( $this->labels );
		$this->result_tmp_body = str_replace($l, $r, $this->original_tmp_body);
		
		return $this;
	}
	
	/**
	 * Возвращает исходный шаблон в виде строки
	 */
	public function getOriginal()
	{
		return $this->original_tmp_body;
	}
	
	/**
	 * Возвращает обработанный шаблон в виде строки
	 */
	public function getResult()
	{
		return $this->result_tmp_body;
	}
	
	/**
	 * Выводит обработанный шаблон на экран
	 */
	public function display()
	{
		echo $this->result_tmp_body;
	}
}
