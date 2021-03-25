<?php

namespace App\Controllers;

use App\Core\Config as Config;
use App\Core\Viewer as Viewer;
use App\Libraries\MysqlPdo as Db;

class StartController extends Controller
{
    public function index()
    {
        
        $data = array();
        $data['styles'][] = $data['preload']['styles'][] = array(
            'link' => '/styles/' . $this->page['template'] . '/style.css',
            'as' => 'style',
            'type' => 'text/css',
            'addit' => ''
        );
        $data['scripts'][] = $data['preload']['scripts'][] = array(
            'link' => '/scripts/' . $this->page['template'] . '/script.js',
            'as' => 'script',
            'type' => 'text/javascript',
            'addit' => ''
        );
        $data['preload']['fonts'][] = array(
            'link' => '/styles/' . $this->page['template'] . '/fonts/Roboto.ttf',
            'as' => 'font',
            'type' => 'font/ttf',
            'addit' => 'crossorigin="anonymous"'
        );
        $data['preload']['fonts'][] = array(
            'link' => '/styles/' . $this->page['template'] . '/fonts/Orbitron.ttf',
            'as' => 'font',
            'type' => 'font/ttf',
            'addit' => 'crossorigin="anonymous"'
        );

        $ip = new \App\Libraries\IpWhois($this->page['lang']);
        $data['ip_data'] = $ip->getData();
        $this->viewer->setData($data);
        $this->viewer->renderHtml();
    }
}
