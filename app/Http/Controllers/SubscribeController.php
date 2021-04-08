<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Website;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\SubscribeResource;

class SubscribeController extends Controller
{
    /**
	 * Store a newly created resource in storage
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
    public function store(Request $request)
    {
    	$data = $request->all();

    	$validator = validator::make($data, [
    		'website_id' => 'required|exists:websites,id',
    		'user_id' => 'required|exists:users,id'
    	]);

    	if ($validator->fails()) {
    		return response(['error' => $validator->errors(), 'Validation Error']);
    	}
    	$website = Website::find($data->website_id);
    	$website->subscribers()->attach($data->user_id);
    	return response(['post' => new PostResource($post), 'message' => 'Created Successfully'], 201);
    }
}
