@extends('template')

@section('contenido')
    
    <div class="bg-gray-900 px-20 py-16 rounded-lg mb-8 relative overflow-hidden">
        <span class="text-xs uppercase text-gray-700 bg-gray-400 rounded-full px-2 py-1">Programación</span>
        <h1 class="text-3xl text-white mt-4">Blog</h1>
        <p class="text-sm text-gray-400 mt-2">Proyecto de desarrollo web para profesionales</p>

        <img src="{{ asset('images/dev.png') }}" class="absolute -right-20 -bottom-20 opacity-20">
    </div>    

    <div class="px-4">
        {{ $posts->links() }}
        <hr class="my-4">

        <h2 class="text-2xl mb-8 text-gray-900">Contenido técnico</h2>

        <div class="grid grid-cols-1 gap-4 mb-4">
            @foreach ($posts as $post)
                <a href="{{ route('post', $post->slug) }}" class="bg-gray-100 rounded-lg px-6 py-4">
                    <p class="text-xs flex items-center">
                        <span class="uppercase text-gray-700 bg-gray-200 rounded-full px-2 py-1 mr-2">Tutorial</span>
                        <span>{{ $post->created_at->format('d/m/Y') }}</span>
                    </p>
                    <h3 class="text-lg text-gray-900 mt-2">{{ $post->title }}</h3>

                    <div>
                        {{-- el nombre de usuario se envía desde el controlador con ->with('user') --}}
                        {{-- podría no enviarse e igual hacer la consulta desde aquí, pero el debug indica que no es beneficioso para el rendimiento --}}
                        <span class="text-xs text-gray-700 opacity-75 flex items-center gap-1">
                            <span class="material-symbols-outlined text-gray-500 text-lg">account_circle</span>
                            {{ $post->user->name }}
                        </span>
                    </div>
                </a>
            @endforeach
        </div>

        <hr class="my-4">
        {{ $posts->links() }}
    </div>

@endsection