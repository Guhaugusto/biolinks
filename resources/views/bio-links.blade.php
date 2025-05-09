<x-layout.app>

    <x-container>
       
        <div class="text-center space-y-4 ">

            <x-img src="/storage/{{ $user->photo }}" alt="Profile picture" />

            <div class="font-bold text-2xl tracking-wider">{{ $user->name }}</div>

            <div class="text-sm  opacity-80">{{ $user->description }}</div>

            <ul class="space-y-3">
                @foreach ( $user->links as $link)

                <li class="flex items-center justify-center gap-2">

               <x-button href="{{ $link->link }}" block soft primary targert="_blank" >

                        {{ $link->name }}

                    </x-button>

                    <x-form :route="route('links.destroy', $link)" delete onsubmit="return confirm('Tem certeza?')">

            
                    </x-form>

                </li>

                @endforeach
            </ul>
        </div>

    </x-container>

</x-layout.app>
