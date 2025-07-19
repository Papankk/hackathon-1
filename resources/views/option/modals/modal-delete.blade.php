@foreach ($data_option as $voting)
    <x-modal name="votingDelete{{ $voting->id }}" :show="$errors->votingDelete->isNotEmpty()" focusable>
        <form method="post" action="{{ route('voting.delete', $voting->id) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 mb-4">
                {{ __('Delete data') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once this data is deleted, all of its resources and data will be permanently deleted. Before deleting this data, please download any data or information that you wish to retain.') }}
            </p>

            <div class="flex justify-end mt-4">
                <x-danger-button class="ml-3">
                    {{ __('Delete') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
@endforeach
