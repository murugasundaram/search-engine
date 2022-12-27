# search-engine
Sample search engine based library can be used for Laravel

Example of Usage

**include the class by using the below statement**

use Muruga\SearchEngine\Search;

**declare the search class**

$searchService = new Search();

**Set the content to be search, this is required one**

$searchService->setSearchContent("avatar the way of water");

**Set the page number of the search, this is optional one**

$searchService->setStartNumber(20);

**Set the search engine, this is optional one. default one is Google. and available search engines are 'Google' and 'Yahoo'**

$searchService->setSearchEngine('yahoo');

**Use this to search whatever you want**

$response = $searchService->doSearch();
