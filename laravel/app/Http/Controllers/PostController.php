<?php

namespace App\Http\Controllers;

use App\Http\Helper\Helper;
use App\Http\Requests\Post\DeletePostRequest;
use App\Http\Requests\Post\GetPostRequest;
use App\Http\Requests\Post\SavePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;

use App\Models\Post;
use App\Models\UserPost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $post;
    private $user_post;
    private $helper; 
    private $error;
    private $sucess;

    public function __construct()
    {
        $this->post      = new Post();
        $this->helper    = new Helper();
        $this->user_post = new UserPost();
        $this->error     = 400;
        $this->sucess    = 200;
    }

    /**
     * Display a listing of the resource.
     */
    public function getAllPosts()
    {
        try {
            return $this->post::all();
        } catch (\Exception $e) {
            return $this->helper->response(false, $this->error);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function savePost(SavePostRequest $request)
    {
        $state_save = $this->post->savePost($request->toArray());

        if ($state_save) {
            $this->user_post->savePostUser($request->toArray(), $state_save);
            return $this->helper->response((bool)$state_save, $this->sucess);
        }

        return $this->helper->response((bool)$state_save, $this->error);
    }

    /**
     * Display the specified resource.
     */
    public function getPost(GetPostRequest $request)
    {
        $state = $this->post->getPost($request->id);

        if(isset($state)) return $this->helper->response((bool)$state, $this->sucess, $state);

        return $this->helper->response((bool)$state, $this->error);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatePost(UpdatePostRequest $request)
    {
        $exits_post = $this->post->getPost($request->data['id']);

        if($exits_post) $this->helper->response(!(bool)$exits_post, $this->error, null, "This post doesn't exist.");

        $update = (bool)$this->post->updatePost($request->toArray(), $exits_post['id']);

        if($update) return $this->helper->response($update, $this->sucess, null, "Post updated successfully.");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function deletePost(DeletePostRequest $request)
    {
        $exist_post = $this->post->getPost($request->id);

        if(!isset($exist_post)) return $this->helper->response((bool)$exist_post, $this->error, null, "This post doesn't exist.");

        $delete = (bool)$this->post->deletePost($exist_post['id']);

        if($delete) return $this->helper->response($delete, $this->sucess, null, "Post deleted successfully");

        return $this->helper->response($delete, $this->error, null, "An error occurred while deleting, please try again later.");
    }
}
