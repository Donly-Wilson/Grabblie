<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use App\Models\Project;

class PageController extends Controller
{
    public function index()
    {
        // Get the currently authenticated user...
        $user = Auth::user();

        return view('pages/home', compact('user'));
    }

    public function results(Request $request)
    {

        // Get search item
        $search = $request->search;




        return redirect('search/' . $search);
    }


    public function search(Request $request, $keyword)
    {
        // Get search item
        $search = $keyword;

        //Use API key to get correct data
        $client = new Client();
        $res = $client->request('GET', "https://api.unsplash.com/search/photos?query=" . urlencode($search) . "&per_page=30&client_id=" . env("UNSPLASH_KEY")); //Request unspash API
        $data = $res->getBody(); //Add API data into entire varible as a Json
        $data = json_decode($data); //Decode json data into object
        // return $data->results;
        $filteredData = [];

        //Filter data to get photos tagges with "city"
        foreach ($data->results as $result) {
            $tags = $result->tags;
            // return $tags;

            foreach ($tags as $tag) {
                $title = $tag->title;
                // return $title;

                //Create an array out of a string with " " as separation
                $arr = explode(" ", $title);

                // Find "city" in array (Change "city" to $search to get any result searched)
                if (in_array("city", $arr)) {
                    array_push($filteredData, $result);
                }
            }
        }

        // return count($filteredData);
        // return $filteredData;

        // $inspirationArray = Project::where('user_id', Auth::id())->where('active', 1)->first();

        // return $inspirationArray;

        // Get the currently authenticated user...
        $user = Auth::user();

        return view('pages/results', compact('user', 'filteredData', 'search'));
    }
}
