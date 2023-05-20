@extends('layout')

@section('content')
  <div class="container mx-auto py-8">
    <div class="bg-white rounded-lg shadow-lg p-6">
      <a href="{{ url()->previous() }}" class="text-blue-600 hover:text-blue-800 mb-4">&lt; Back</a>
      <h2 class="text-xl font-bold mb-2">{{ $post[0]['title'] }}</h2>
      <p class="text-gray-700">{{ $post[0]['content'] }}</p>
      <p class="text-gray-600">Category: {{ $post[0]['category']['name'] }}</p>
      <p class="text-gray-600">Tags:
        @foreach($post[0]['tags'] as $tag)
          <span class="bg-gray-200 text-gray-700 py-1 px-2 rounded-full inline-block text-sm mr-2">{{ $tag['name'] }}</span>
        @endforeach
      </p>

      <hr class="my-4">

      <h3 class="text-lg font-bold mb-2">Comments</h3>
      <div class="mt-4">
        <!-- Comment Form -->
        <form action="{{ route('post.comment') }}" method="POST">
          @csrf
          <input type="hidden" name="post_id" value="{{ $post[0]['id'] }}">
          <textarea name="content" class="w-full bg-gray-100 rounded-lg p-2" placeholder="Write a comment"></textarea>
          <button type="submit" class="bg-blue-600 text-white rounded-lg px-4 py-2 mt-2">Submit</button>
        </form>
      </div>

      <hr class="my-4">

      <h3 class="text-lg font-bold mb-2">Existing Comments</h3>
      <div class="mt-4">
        <!-- Display Existing Comments -->
        @foreach($post[0]['comments'] as $comment)
          <div class="bg-gray-100 rounded-lg p-4 mb-2">
            <p class="text-gray-700">{{ $comment['content'] }}</p>
            <p class="text-gray-600">By: Anonymous</p>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
