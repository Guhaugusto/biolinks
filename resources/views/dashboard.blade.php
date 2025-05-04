<div>

    <h1>Olaa</h1>

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

            <a href="{{ route('links.edit', $link) }}"> {{ $link->name }}</a>

            <form action="{{ route('links.destroy', $link) }}" method="post" onsubmit="return confirm('Tem certeza?')">
                @csrf
                @method('DELETE')

                <button>Deletar</button>
            </form>

        </li>

        @endforeach
    </ul>

</div>