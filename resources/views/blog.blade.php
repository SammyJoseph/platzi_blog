@extends('template')

@section('contenido')
    <h1 class="text-blue-500 text-2xl mb-5">Listado de posts</h1>

    @foreach ($posts as $post)
        <h2 class="mt-3"><i>id:</i> {{ $post->id }}</h2>
        <a class="border-b" href="{{ route('post', $post->slug) }}">{{ $post->title }}</a>
        <p><i>usuario:</i> {{ $post->user->name }}</p>
    @endforeach

    {{ $posts->links()}} <!-- Paginación -->
@endsection