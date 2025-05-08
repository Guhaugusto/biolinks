<x-layout.app>

    <x-container>

        <x-card title="Profile">

            <x-form :route=" route('profile')" put id="form" enctype="multipart/form-data">
                <div class="flex gap-2 items-center">
                    <x-img src="/storage/{{$user->photo}}" alt="Profile picture" />
                    <x-file-input name="photo" />

                </div>

                <x-input name="name" placeholder="Nome" value="{{ old('name', $user->name) }}" />

                <x-textarea name="description" value="{{ old('description', $user->description) }}"></x-textarea>



                <x-input name="handler" prefix="biolinks.com.br/" placeholder="@seuname" value="{{ old('handler', $user->handler) }}" />



            </x-form>

            <x-slot:actions>

                <x-a href="/dashboard">Cancel</x-a>

                <x-button type="submit" form="form">Update profile</x-button>

            </x-slot:actions>

        </x-card>

    </x-container>

</x-layout.app>