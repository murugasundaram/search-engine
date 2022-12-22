# search-engine
Sample search engine based library can be used for Laravel

# Example of Usage

<br>
<br>

**include the class by using the below statement**
use Muruga\SearchEngine\Search;
<br>
**declare the search class**
$searchService = new Search();
<br>
<br>
**Set the content to be search, this is required one**
$searchService->setSearchContent("avatar the way of water");
<br>
<br>
**Set the page number of the search, this is optional one**
$searchService->setStartNumber(20);
<br>
<br>
**Set the search engine, this is optional one. default one is Google. and available search engines are 'Google' and 'Yahoo'**
$searchService->setSearchEngine('yahoo');
<br>
<br>
**Use this to search whatever you want**
$response = $searchService->doSearch();
