@foreach ($data_voting as $voting)
    <x-modal name="votingEdit{{ $voting->id }}" :show="$errors->votingUpdate->isNotEmpty()" focusable>
        <form method="post" action="{{ route('voting.update', $voting->id) }}" class="p-6">
            @csrf
            @method('post')

            <h2 class="text-lg font-medium text-gray-900 mb-4">
                {{ __('Edit data') }}
            </h2>

            <div class="mb-4">
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                    autocomplete="current-password" placeholder="Type the title"
                    value="{{ old('title', $voting->title) }}" />
                <x-input-error :messages="$errors->votingStore->get('title')" />
            </div>
            <div class="mb-4">
                <x-input-label for="description" :value="__('Description')" />
                <textarea class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
                    name="description" id="description" placeholder="Type the description">{{ old('description', $voting->description) }}</textarea>
                <x-input-error :messages="$errors->votingStore->get('description')" />
            </div>
            <div class="mb-4">
                <x-input-label for="start_time" :value="__('Start Time')" />
                <x-text-input id="start_time" name="start_time" type="date" class="mt-1 block w-full"
                    autocomplete="start_time" value="{{ old('start_time', $voting->start_time) }}" />
                <x-input-error :messages="$errors->votingStore->get('start_time')" />
            </div>
            <div class="mb-4">
                <x-input-label for="end_time" :value="__('End Time')" />
                <x-text-input id="end_time" name="end_time" type="date" class="mt-1 block w-full"
                    autocomplete="end_time" value="{{ old('end_time', $voting->end_time) }}" />
                <x-input-error :messages="$errors->votingStore->get('end_time')" />
            </div>
            <div class="mb-4">
                <x-input-label for="end_time" :value="__('Is Public?')" />
                <div class="inline-flex items-center">
                    <label class="flex items-center cursor-pointer relative">
                        <input type="checkbox" {{ $voting->is_public == true ? 'checked' : '' }}
                            class="peer h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-800 checked:border-slate-800"
                            id="check" name="is_public" />
                        <span
                            class="absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20"
                                fill="currentColor" stroke="currentColor" stroke-width="1">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </label>
                </div>
                <x-input-error :messages="$errors->updatePassword->get('end_time')" class="mt-2 mb-4" />
            </div>

            <div class="flex justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('Update') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>
@endforeach
