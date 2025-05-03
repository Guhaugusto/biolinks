<div>

    <h1>Olaa</h1>

    @if($message = session()->get('messagem'))
    <div>{{ $message}}</div>
    @endif

    <a href="{{ route('links.create') }}">Cria um novo</a>
    <ul>
        @foreach ( $links as $link)

        <li>
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