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
    </div>
  </div>
@endsection
