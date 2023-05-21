@extends('layout')

@section('content')
  <div class="container mx-auto py-8">
    <div class="flex justify-end">
      @guest
        <div class="mb-4">
          <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Login
          </a>
          <a href="{{ route('register') }}"
             class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Register
          </a>
        </div>
      @endguest
      @auth
        <div class="mb-4">
          <p class="text-lg">Logged in as: {{ auth()->user()->name }}</p>
        </div>
      @endauth
    </div>
    <div class="flex flex-wrap -mx-4">
      <div class="w-3/4 px-4">
        <h1 class="text-3xl font-bold mb-4">All Posts</h1>
        <div class="grid grid-cols-1 gap-4">
          @foreach($posts as $post)
            <div class="bg-white rounded-lg shadow-lg p-6">
              <h2 class="text-xl font-bold mb-2">{{ $post['title'] }}</h2>
              <p class="text-gray-700">{{ substr($post['content'], 0, 100) }}...</p>
              <p class="text-gray-600">Category: {{ $post['category']['name'] }}</p>
              <p class="text-gray-600">Tags:
                @foreach($post['tags'] as $tag)
                  <span
                    class="bg-gray-200 text-gray-700 py-1 px-2 rounded-full inline-block text-sm mr-2">{{ $tag['name'] }}</span>
                @endforeach
              </p>
              <a href="{{ route('post.show', $post['id']) }}"
                 class="text-blue-600 hover:text-blue-800">Read More</a>
            </div>
          @endforeach
        </div>
      </div>
      <div class="w-1/4 px-4">
        <h2 class="text-2xl font-bold mb-4">Newest Posts</h2>
        <div class="grid grid-cols-1 gap-4">
          @foreach($newestPosts as $newPost)
            <div class="bg-white rounded-lg shadow-lg p-6">
              <h3 class="text-lg font-bold mb-2">{{ $newPost['title'] }}</h3>
              <p class="text-gray-700">{{ substr($newPost['content'], 0, 100) }}...</p>
              <p class="text-gray-600">Category: {{ $newPost['category']['name'] }}</p>
              <p class="text-gray-600">Tags:
                @foreach($newPost['tags'] as $tag)
                  <span
                    class="bg-gray-200 text-gray-700 py-1 px-2 rounded-full inline-block text-sm mr-2">{{ $tag['name'] }}</span>
                @endforeach
              </p>
              <a href="{{ route('post.show', $newPost['id']) }}"
                 class="text-blue-600 hover:text-blue-800">Read More</a>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
