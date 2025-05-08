<x-layout.app>

    <x-container>

        <x-card title="Edit link {{ $link->id }}">

            <x-form :route=" route('links.edit', $link) " put id="form">

                <x-input name="link" placeholder="Link" value="{{ old('link', $link->link) }}" />

                <x-input  type="text" name="name" placeholder="Link name " value="{{ old('name', $link->name) }}" />



            </x-form>

            <x-slot:actions>

                <x-a href="/dashboard">Cancel</x-a>

                <x-button type="submit" form="form">Update Link</x-button>

            </x-slot:actions>

        </x-card>

    </x-container>

</x-layout.app>


