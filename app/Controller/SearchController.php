<?php

namespace Controller;

use \W\Controller\Controller;

class SearchController extends Controller
{

    // Search Map
    public function map()
    {
        $this->show('search/map', ['title' => 'search map']);
    }

    // Search map Position
    public function mapPosition()
    {
        $this->show('search/map', ['title' => 'search mapPosition']);
    }

    // Search Map Position Event
    public function mapPositionEvent()
    {
        $this->show('search/map', ['title' => 'search mapPositionEvent']);
    }

}