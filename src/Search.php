<?php

namespace Muruga\SearchEngine;

use Illuminate\Support\Facades\Http;

class Search {

	private $searchString;
	private $startNumber;
	private $searchEngine;
	private $availableSearchEngine = ['google', 'yahoo'];

	function __construct()
	{
		$this->searchString = "";
		$this->startNumber = 10;
		$this->searchEngine = 'google';
	}

	/**
	* This function used to set the search content
	*
	* @author Muruga
	* @date 12/22/2022
	*/
	public function setSearchContent(String $string)
	{
		$this->searchString = $this->parseSearchContent($string);
	}

	/**
	* This function used to parse the search content
	*
	* @author Muruga
	* @date 12/22/2022
	*/
	public function parseSearchContent($string)
	{
		return str_replace(' ', '+', $string);
	}

	/**
	* This function used to set the page number
	*
	* @author Muruga
	* @date 12/22/2022
	*/
	public function setStartNumber($number)
	{
		$this->startNumber = $this->parseIntoWholeNumber($number);
	}

	/**
	* This function used to set the search engine
	*
	* @author Muruga
	* @date 12/22/2022
	*/
	public function setSearchEngine($engine)
	{
		if(in_array($engine, $this->availableSearchEngine)) {
			$this->searchEngine = $engine;
		}
	}

	/**
	* This function used to parse the number into whole
	*
	* @author Muruga
	* @date 12/22/2022
	*/
	public function parseIntoWholeNumber($number)
	{
		$wholeNumber = floor($number / 10) * 10;

		return $wholeNumber < 10 ? 10 : $wholeNumber;
	}

	/**
	* This function used to make the query params
	*
	* @author Muruga
	* @date 12/22/2022
	*/
	public function getTheQueryParams()
	{
		return $this->searchString.'&start='.$this->startNumber;
	}

	/**
	* This function used to get the request value
	*
	* @author Muruga
	* @date 12/22/2022
	*/
	public function getQueryStringBasedOnEngine()
	{
		if($this->searchEngine == 'yahoo') {
			$searchUrl =  'https://sg.search.yahoo.com/search?p='.$this->getTheQueryParams();
		} else {
			$searchUrl = 'https://www.google.com/search?q='.$this->getTheQueryParams();
		}

		return $searchUrl;
	}

	/**
	* This function used to search the content
	*
	* @author Muruga
	* @date 12/22/2022
	*/
	public function doSearch()
	{
        $response = Http::get($this->getQueryStringBasedOnEngine());

        return $response;
    }
}