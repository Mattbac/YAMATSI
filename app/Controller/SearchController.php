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
    public function mapPosition($lat, $lng)
    {
        $this->show('search/map', ['title' => 'search mapPosition '.$lat.' '.$lng]);
    }

    // Search Map Position Event
    public function mapPositionEvent($lat, $lng, $id)
    {
        $this->show('search/map', ['title' => 'search mapPositionEvent '.$lat.' '.$lng.' '.$id]);
    }

}