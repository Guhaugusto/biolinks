<x-layout.app>
<div>

    <h1>Deshboard</h1>

    <h2>User {{ auth()->user()->name }} :: {{ auth()->id() }}</h2>
    
    <a href="{{ route('profile') }}">Editar perfil</a>
    
   
    @if($message = session()->get('messagem'))
    <div>{{ $message}}</div>
    @endif

    <a href="{{ route('links.create') }}">Cria um novo</a>
    <ul>
        @foreach ( $links as $link)

        <li style="display:flex; ">

            @if(!$loop->last)

            <form action="{{ route('links.down', $link) }}" method="post">
                @csrf
                @method('PATCH')

                <button>⬇️</button>
            </form>
            @endif

            @if (!$loop->first)




            <form action="{{ route('links.up', $link) }}" method="post">
                @csrf
                @method('PATCH')

                <button>⬆️</button>
            </form>
            @endif

            <a href="{{ route('links.edit', $link) }}"> {{ $link->id }}. {{ $link->name }}</a>

            <form action="{{ route('links.destroy', $link) }}" method="post" onsubmit="return confirm('Tem certeza?')">
                @csrf
                @method('DELETE')

                <button>Deletar</button>
            </form>

        </li>

        @endforeach
    </ul>

</div>
</x-layout.app>