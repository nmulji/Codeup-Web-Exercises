<?php


class Element
{
	public $adjectives = ['good', 'new', 'first', 'last', 'long', 'great', 'little', 'big', 'massive', 'other'];
	public $nouns = ['lion', 'dog', 'cat', 'fish', 'frog', 'tiger', 'table', 'car', 'chair', 'motorcycle'];

	public function random($array1)
	{
		$random_element = array_rand($array1);
		return $array1[$random_element];
	}

	public function serverName()
	{
		$data = array();

		$data['adjectives'] = $this->random($this->adjectives);

		$data['nouns'] = $this->random($this->nouns);

		return $data;
	}

}