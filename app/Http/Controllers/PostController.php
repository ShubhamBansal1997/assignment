<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PostResource;

class PostController extends Controller
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
    		'title' => 'required|max:250',
    		'description' => 'required'
    	]);

    	if ($validator->fails()) {
    		return response(['error' => $validator->errors(), 'Validation Error']);
    	}
    	$post = Post::create($data);
    	return response(['post' => new PostResource($post), 'message' => 'Created Successfully'], 201);
    }
}
