@extends('layouts.app')

@section('title','Create Post')

@section('content')
<h1 class="text-2xl font-bold mb-6">Create Post</h1>

<form method="POST" action="{{ route('admin.posts.store') }}" class="space-y-4">
  @csrf
  <div>
    <label class="block font-medium">Title</label>
    <input type="text" name="title" class="mt-1 w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
  </div>
  <div>
    <label class="block font-medium">Content</label>
    <textarea name="content" rows="8" class="mt-1 w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
  </div>
  <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Save</button>
</form>
@endsection
