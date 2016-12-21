<?php

namespace Controller;

use \W\Controller\Controller;
use Model\TypeModel as TypeModel;

class DefaultController extends Controller
{

	// Home Page
	public function home()
	{
		$is_connect = !empty($this->getUser()['id']);
		$this->show('default/home', ['title' => 'home', 'is_connect' => $is_connect]);
	}

	public function map()
    {
        $typeModel = new TypeModel();
        $this->show('default/map', ['title' => 'search map',
                                    'type'  => $typeModel->findAll()]);
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
