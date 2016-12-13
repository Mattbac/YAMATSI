<?php

namespace Controller;

use \W\Controller\Controller;

class DefaultController extends Controller
{

	// Home Page
	public function home()
	{
		$this->show('default/home', ['title' => 'home']);
	}

	public function map()
    {
        $this->show('default/map', ['title' => 'search map']);
    }

    // Search map Position
    public function mapPosition($lat, $lng)
    {
        $this->show('default/map', ['title' => 'search mapPosition '.$lat.' '.$lng]);
    }

    // Search Map Position Event
    public function mapPositionEvent($lat, $lng, $id)
    {
        $this->show('default/map', ['title' => 'search mapPositionEvent '.$lat.' '.$lng.' '.$id]);
    }

}