<x-layout.app>
    <div class="mx-auto max-w-screen-md flex items-center justify-center py-20">
        <div class="card bg-base-100 w-96 shadow-sm ">

            <div class="card-body">


                <h1 class="card-title">Register</h1>

                @if($message = session()->get('messagem'))
                <div>{{ $message}}</div>
                @endif

                <div>
                    <form action="{{ route('register') }}" method="post">



                        <div>

                            <input class="input" type="text" name="name" placeholder="Name" value="{{ old('name') }}" />

                            @error('name')

                            <span>{{ $message }}</span>

                            @enderror

                        </div>
                        @csrf
                        <div>
                            <br>

                            <input class="input" type="text" name="email" placeholder="Email" value="{{ old('email') }}" />

                            @error('email')

                            <span>{{ $message }}</span>

                            @enderror

                        </div>

                        <br>

                        <input class="input" type="text" name="email_confirmation" placeholder="Email confirmation" />

                </div>
                <br>

                <div>
                    <input class="input" type="password" name="password" placeholder="Senha" />

                    @error('password')

                    <span>{{ $message }}</span>

                    @enderror
                </div>
                <br>

                <button class="btn btn-primary">Register</button>

                </form>

            </div>

        </div>

    </div>
    </div>
</x-layout.app>