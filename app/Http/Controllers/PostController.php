<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index()
  {
    try {
      // Create a new Guzzle HTTP client instance
      $client = new Client();
    
      // Get all posts
      $response = $client->get('http://127.0.0.1:8000/api/post', [
        'headers' => [
          'Authorization' => 'Bearer vh5peF2KSuN7XHnk6hAhs46NCQ1t89OA9VSQo6Yc',
        ],
      ]);
    
      // Get the response body as a JSON string
      $postsJson = $response->getBody();
    
      // Convert the JSON string to an associative array
      $posts = json_decode($postsJson, true);
    
      // Get the newest three posts
      $newestPosts = array_slice($posts, 0, 3);
    
      // Pass the posts data to the view
      return view('index', compact('posts', 'newestPosts'));
    } catch (GuzzleException $e) {
      // Handle Guzzle exceptions
      return response()->json(['message' => 'An error occurred while fetching the posts.'], 500);
    } catch (\Exception $e) {
      // Handle other exceptions
      return response()->json(['message' => 'An error occurred.', 'error' => $e->getMessage()], 500);
    }
  }
  
  public function show($id)
  {
    // Create a new Guzzle HTTP client instance
    $client = new Client();
    
    $response = $client->get("http://127.0.0.1:8000/api/post/$id", [
      'headers' => [
        'Authorization' => 'Bearer vh5peF2KSuN7XHnk6hAhs46NCQ1t89OA9VSQo6Yc',
      ],
    ]);
    
    // Get the response body as a JSON string
    $postJson = $response->getBody();
    
    // Convert the JSON string to an associative array
    $post = json_decode($postJson, true);
    
    // Pass the post data to the view
    return view('show', compact('post'));
//    var_dump($post);
  }
  
}
