<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

  private function getAccessToken()
  {
    return session('access_token');
  }
  
  public function index(Request $request) {
    try {
      $token = $this->getAccessToken();
      $client = new Client();
  
      $response = $client->get('http://127.0.0.1:8000/api/post', [
        'headers' => [
          'Authorization' => 'Bearer ' . $token,
        ],
      ]);
      
      $postsJson = $response->getBody();
    
      $posts = json_decode($postsJson, true);
    
      $newestPosts = array_slice($posts, 0, 3);
    
      return view('index', compact('posts', 'newestPosts'));
    } catch (GuzzleException $e) {
      return response()->json(['message' => 'An error occurred while fetching the posts.', 'error' => $e->getMessage()], 500);
    } catch (\Exception $e) {
      return response()->json(['message' => 'An error occurred.', 'error' => $e->getMessage()], 500);
    }
  }
  
  public function show($id) {
    try {
      $token = $this->getAccessToken();
      $client = new Client();
      
      $response = $client->get("http://127.0.0.1:8000/api/post/$id", [
        'headers' => [
          'Authorization' => 'Bearer ' . $token,
        ],
      ]);
      
      $postJson = $response->getBody();
      
      $post = json_decode($postJson, true);
      
      return view('show', compact('post'));
    } catch (GuzzleException $e) {
      return response()->json(['message' => 'An error occurred while fetching the posts.', 'error' => $e->getMessage()], 500);
    } catch (\Exception $e) {
      return response()->json(['message' => 'An error occurred.', 'error' => $e->getMessage()], 500);
    }
  }
  
  public function comment(Request $request) {
    $request->validate([
      'post_id' => 'required|exists:posts,id',
      'content' => 'required|string',
    ]);
  
    // Extract the post_id and content from the request
    $post_id = $request->input('post_id');
    $content = $request->input('content');
    
    $client = new Client();
    
    try {
      $token = $this->getAccessToken();
      $client->post('http://127.0.0.1:8000/api/post/comment', [
        'headers' => [
          'Authorization' => 'Bearer ' . $token,
        ],
        'json' => [
          'post_id' => $post_id,
          'comment' => $content,
        ],
      ]);
      
      return redirect()->back()->with('success', 'Comment posted successfully');
    } catch (\Exception $e) {
      return response()->json(['message' => 'An error occurred.', 'error' => $e->getMessage()], 500);
    }
  }
  
}
