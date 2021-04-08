<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Website;
use App\Models\WebsiteUser;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\SubscribeResource;

class SubscribeController extends Controller
{
	/**
     * Display a listing of the resource.
     * @param $website Website id
     * @return \Illuminate\Http\Response
     */
    public function index($website)
    {
        $website = Website::where('id', $website)->first();
        return response([ 'subscribers' => SubscribeResource::collection($website->subscribers), 'message' => 'Retrieved successfully'], 200);
    }

    /**
	 * Store a newly created resource in storage
	 * @param $website Website id
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
    public function store($website, Request $request)
    {
    	$request->offsetSet('website_id', $website);
    	$data = $request->all();
    	$validator = validator::make($data, [
    		'website_id' => 'required|exists:websites,id',
    		'user_id' => 'required|exists:users,id'
    	]);

    	if ($validator->fails()) {
    		return response(['error' => $validator->errors(), 'Validation Error']);
    	}
    	$website = Website::find($data['website_id']);
    	if (!$website->subscribers->contains($data['user_id'])) {
    		$website->subscribers()->attach($data['user_id']);
    		return response(['subscriber' => new SubscribeResource($website->subscribers()->get()), 'message' => 'Subscriber Added Successfully'], 201);
    	} else {
    		return response(['subscriber' => [], 'message' => 'Subscriber Already Present'], 500);
    	}
    }
    /**
	 * Store a newly created resource in storage
	 * @param $website Website id
	 * @param $website Subscriber id
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
    public function destroy($website, $subscriber)
    {
        $website = Website::find($website);
    	if ($website->subscribers->contains($subscriber))
    		$website->subscribers()->detach($subscriber);
        return response(['message' => 'Website Unsubscribed']);
    }
}
