<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Website;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PostResource;
use App\Jobs\PostSendEmail;

class PostController extends Controller
{
	/**
     * Display a listing of the resource.
     * @param $website Website id
     * @return \Illuminate\Http\Response
     */
    public function index($website)
    {
    	#dd($website);
        $posts = Post::where('website_id', $website)->get();
        return response([ 'posts' => PostResource::collection($posts), 'message' => 'Retrieved successfully'], 200);
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
    		'title' => 'required|max:250',
    		'description' => 'required'
    	]);

    	if ($validator->fails()) {
    		return response(['error' => $validator->errors(), 'Validation Error']);
    	}
    	$post = Post::create($data);
    	$website = Website::find($data['website_id']);
    	foreach($website->subscribers()->get() as $sub) {
    		$details = array(
    			"title" => $data['title'],
    			"description" => $data['description'],
    			"email" => $sub->email,
    		);
    		dispatch(new PostSendEmail($details));
    	}
    	return response(['post' => new PostResource($post), 'message' => 'Created Successfully'], 201);
    }

    /**
     * Display the specified resource.
     * @param $website Website id
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($website, Post $post)
    {
        return response(['post' => new PostResource($post), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     * @param $website Website id
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update($website, Request $request, Post $post)
    {
        $post->update($request->all());

        return response(['post' => new PostResource($post), 'message' => 'Update successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param $website Website id
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($website, Post $post)
    {
        $post->delete();

        return response(['message' => 'Deleted']);
    }
}
