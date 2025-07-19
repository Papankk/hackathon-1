<x-modal name="votingInsert" :show="$errors->votingStore->isNotEmpty()" focusable>
    <form method="post" action="{{ route('option.insert') }}" class="p-6">
        @csrf
        @method('post')

        <h2 class="text-lg font-medium text-gray-900 mb-4">
            {{ __('Insert data') }}
        </h2>

        <div class="mb-4">
            <x-input-label for="title" :value="__('Title')" />
            <select name="voting_id" id="voting_id"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                <option value="" selected></option>
                @foreach ($data_option as $option)
                    <option value="{{ $option->voting->id }}">
                        {{ $option->voting->title }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->votingStore->get('title')" />
        </div>
        <div class="mb-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" autocomplete="name"
                value="{{ old('name') }}" />
            <x-input-error :messages="$errors->votingStore->get('name')" />
        </div>
        <div class="mb-4">
            <x-input-label for="description" :value="__('Description')" />
            <textarea class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
                name="description" id="description" placeholder="Type the description">{{ old('description') }}</textarea>
            <x-input-error :messages="$errors->votingStore->get('description')" />
        </div>
        <div class="flex justify-end mt-4">
            <x-primary-button class="ml-3">
                {{ __('Insert') }}
            </x-primary-button>
        </div>
    </form>
</x-modal>
