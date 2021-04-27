<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $data = $this->getQueAnsList();
        
        return view('home')->with('queans',$data);
    }

    public function getQueAnsList(){
        $client = new \GuzzleHttp\Client();

        $res = $client->request('GET', getenv('API_ORS_URL'),['verify' => false]);

        if ($res->getStatusCode() == 200) { // 200 OK
            $response_data = $res->getBody()->getContents();
        }

        return json_decode($response_data);
    }
}
