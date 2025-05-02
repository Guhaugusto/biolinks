<div>

{{ auth()->id() }}



    <h1>Register</h1>

    @if($message = session()->get('messagem'))
    <div>{{ $message}}</div>
    @endif

    <div>
        <form action="{{ route('register') }}" method="post">



            <div>

                <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" />

                @error('name')

                <span>{{ $message }}</span>

                @enderror

            </div>
            @csrf
            <div>
                <br>

                <input type="text" name="email" placeholder="Email" value="{{ old('email') }}" />

                @error('email')

                <span>{{ $message }}</span>

                @enderror

            </div>

            <br>
            
            <input type="text" name="email_confirmation" placeholder="Email confirmation" />

    </div>

    <div>
        <input type="password" name="password" placeholder="Senha" />

        @error('password')

        <span>{{ $message }}</span>

        @enderror
    </div>
    <br>

    <button>Register</button>

    </form>

</div>

</div>