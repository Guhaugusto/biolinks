<x-layout.app>

    <x-container>

        <x-card title="Create a new Link">

            <x-form :route="route('links.create')" post id="form">

                <x-input type="text" name="name" placeholder="Name" value="{{ old('name') }}" />

                <x-input type="text" name="link" placeholder="Link" value="{{ old('link') }}" />

            </x-form>

            <x-slot:actions>

                <x-a href="/dashboard">Cancel</x-a>

                <x-button type="submit" form="form">Create new Link</x-button>

            </x-slot:actions>

        </x-card>

    </x-container>

</x-layout.app>