<x-layout.app>

    <x-container>
        <div class="absolute top-8 left-8 flex flex-col gap-4">
            <x-button ghost :href="route('profile')">Update Profile</x-button>
            <x-button ghost :href="route('links.create')">Create link</x-button>
            <x-button ghost :href="route('logout')">Logout</x-button>
        </div>

        <div class="text-center space-y-4 ">

            <x-img src="/storage/{{ $user->photo }}" alt="Profile picture" />

            <div class="font-bold text-2xl tracking-wider">{{ $user->name }}</div>

            <div class="text-sm  opacity-80">{{ $user->description }}</div>


            <ul class="space-y-3">
                @foreach ( $links as $link)

                <li class="flex items-center justify-center gap-2">

                    @if(!$loop->last)
                    <x-form :route=" route('links.down', $link)" patch>
                        <x-button ghost>
                            <x-icons.arrow-down class="h-6 w-6" />
                        </x-button>
                    </x-form>
                    @else
                    <x-button disabled ghost>
                        <x-icons.arrow-down class="h-6 w-6" />
                    </x-button>
                    @endif



                    @if (!$loop->first)
                    <form method="POST" action="{{ route('links.up', $link) }}">
                        @csrf
                        @method('PATCH')
                        <x-button ghost>
                            <x-icons.arrow-up class="h-6 w-6" />
                        </x-button>
                    </form>
                    @else
                    <x-button disabled ghost>
                        <x-icons.arrow-up class="h-6 w-6" />
                    </x-button>
                    @endif





                    <x-button href="{{ route('links.edit', $link) }}" block soft primary>

                        {{ $link->name }}

                    </x-button>

                    <x-form :route="route('links.destroy', $link)" delete onsubmit="return confirm('Tem certeza?')">

                        <x-button ghost>
                            <x-icons.trash class="h-6 w-6" />
                        </x-button>

                    </x-form>

                </li>

                @endforeach
            </ul>
        </div>

    </x-container>

</x-layout.app>