<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReplyResource;
use App\Model\Question;
use App\Model\Reply;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReplyController extends Controller
{

    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['index','show']]);
    }

    public function index(Question $question)
    {
        return ReplyResource::collection( $question->replies);
    }

    public function store(Question $question,Request $request)
    {
        $reply = $question->replies()->create($request->all());
        return response(['reply' => new ReplyResource($reply)],Response::HTTP_CREATED);
    }


    public function show(Question $question, Reply $reply)
    {
        return new ReplyResource($reply);
    }

    public function update(Question $question, Request $request, Reply $reply)
    {
        $reply->update($request->all());
        return response('Updated',Response::HTTP_ACCEPTED);
    }

public function destroy(Question $question, Reply $reply)
    {
        $reply->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
