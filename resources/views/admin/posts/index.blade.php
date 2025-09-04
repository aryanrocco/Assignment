@extends('layouts.app')

@section('title','Manage Posts')

@section('content')
<div class="flex justify-between items-center mb-6">
  <h1 class="text-3xl font-extrabold text-gray-800">Manage Posts</h1>
  <a href="{{ route('admin.posts.create') }}"
     class="px-4 py-2 rounded-lg bg-gradient-to-r from-sky-400 via-cyan-400 to-emerald-400 
            text-white font-medium hover:scale-[1.02] hover:shadow-lg transition">
    + New Post
  </a>
</div>

<div class="bg-white rounded-2xl shadow-lg overflow-hidden">
  <table class="w-full">
    <thead class="bg-gray-100 text-gray-600">
      <tr>
        <th class="px-6 py-3 text-left">Title</th>
        <th class="px-6 py-3 text-left">Created</th>
        <th class="px-6 py-3 text-right">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($posts as $post)
        <tr class="border-b hover:bg-gray-50">
          <td class="px-6 py-4">{{ $post->title }}</td>
          <td class="px-6 py-4">{{ $post->created_at->format('Y-m-d') }}</td>
          <td class="px-6 py-4 text-right space-x-2">
            <a href="{{ route('admin.posts.edit', $post) }}" 
               class="text-blue-600 hover:underline">Edit</a>
            <form action="{{ route('admin.posts.destroy', $post) }}" 
                  method="POST" class="inline" 
                  onsubmit="return confirm('Delete this post?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-red-600 hover:underline">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="mt-6">
  {{ $posts->links() }}
</div>
@endsection
