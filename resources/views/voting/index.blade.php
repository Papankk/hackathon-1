<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Voting') }}
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
                                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">Vote Title</th>
                                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">Description</th>
                                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">Start Time</th>
                                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">End Time</th>
                                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">Public ?</th>
                                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_voting as $voting)
                                <tr>
                                    <td class="p-4 border-b border-blue-gray-50">{{ $no++ }}</td>
                                    <td class="p-4 border-b border-blue-gray-50">{{ $voting->title }}</td>
                                    <td class="p-4 border-b border-blue-gray-50">{{ $voting->description }}</td>
                                    <td class="p-4 border-b border-blue-gray-50">{{ $voting->start_time }}</td>
                                    <td class="p-4 border-b border-blue-gray-50">{{ $voting->end_time }}</td>
                                    <td class="p-4 border-b border-blue-gray-50">
                                        {{ $voting->is_public == 1 ? 'Yes' : 'No' }}</td>
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

    @include('voting.modals.modal-insert')
    @include('voting.modals.modal-edit')
    @include('voting.modals.modal-delete')

</x-app-layout>
