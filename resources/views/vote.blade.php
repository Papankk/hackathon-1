<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <h1>{{ $data_voting->title }}</h1>
                <p class="text-gray-300 text-sm mb-4">{{ $data_voting->description }}</p>
                <select name="voting_id" id="voting_id"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full mb-4">
                    @foreach ($data_option as $o)
                        <option value="{{ $o->id }}">
                            {{ $o->name }}
                        </option>
                    @endforeach
                </select>

                <x-primary-button>Submit</x-primary-button>
            </div>
        </div>
    </div>
</x-app-layout>
