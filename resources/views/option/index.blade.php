<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Options') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-2 sm:p-6">
                <x-primary-button x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'votingInsert')">{{ __('Insert Data') }}</x-primary-button>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-fixed w-full text-left min-w-max">
                        <thead>
                            <tr>
                                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">#</th>
                                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">Voting</th>
                                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">Name</th>
                                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">Description</th>
                                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">Photo</th>
                                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_option as $voting)
                                <tr>
                                    <td class="p-4 border-b border-blue-gray-50">{{ $no++ }}</td>
                                    <td class="p-4 border-b border-blue-gray-50">{{ $voting->voting->title }}</td>
                                    <td class="p-4 border-b border-blue-gray-50">{{ $voting->name }}</td>
                                    <td class="p-4 border-b border-blue-gray-50">{{ $voting->description }}</td>
                                    <td class="p-4 border-b border-blue-gray-50"><img src="{{ $voting->photo }}"
                                            alt="{{ $voting->name }}"></td>
                                    <td class="p-4 border-b border-blue-gray-50">
                                        <x-primary-button x-data=""
                                            x-on:click.prevent="$dispatch('open-modal', 'votingEdit{{ $voting->id }}')">{{ __('Edit') }}</x-primary-button>
                                        <x-danger-button x-data=""
                                            x-on:click.prevent="$dispatch('open-modal', 'votingDelete{{ $voting->id }}')">{{ __('Delete') }}</x-danger-button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('option.modals.modal-insert')
    @include('option.modals.modal-edit')
    @include('option.modals.modal-delete')

</x-app-layout>
