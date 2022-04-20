<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use GuzzleHttp\Client;

class LiveScoreController extends Controller
{
    private $api;

	public function __construct(Client $client) 
    {	
		$this->api = new ApiController($client);
	}

    public function verLiveScore() {
        //Hoy
        $laliga = $this->api->getMatchesTodayLeague(140);
        $segunda = $this->api->getMatchesTodayLeague(141);
        $premier = $this->api->getMatchesTodayLeague(39);

        $now = new \DateTime();

        return view('livescore', ['fecha' => $now->format('l, j F Y'), 'laliga' => $laliga, 'segunda' => $segunda, 'premier' => $premier]);
    }
}
