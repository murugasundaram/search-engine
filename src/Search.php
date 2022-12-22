<?php

namespace Muruga\SearchEngine;

use Illuminate\Support\Facades\Http;

class Search {
    public function doSearch() {
        $response = Http::get('https://inspiration.goprogram.ai/');

        return $response['quote'] . ' -' . $response['author'];
    }
}