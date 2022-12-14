<x-backend.modal form-action="save">
    @push('styles')
        <link href="//cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">
    @endpush

    <x-slot name="title">
        @if ($service_id)
            Update
        @else
            Add
        @endif
        {{ __(' Services') }}
    </x-slot>

    <x-slot name="content">
        <div class="grid-cols-3 gap-2 sm:grid">
            <x-label>Select Department
                <x-select wire:model='service_department_id' name="service_department_id" label="Select Service Department"
                    :options="getKeyValues('ServiceDepartment', 'title', 'id')" />
            </x-label>

            <x-label>Name
                <x-input wire:model='name' name="name" label="Name" type="text" />
            </x-label>

            <x-file-upload wire:model='icon' name="Icon" label="Icon" :display-upload-progress="true">
                <div>
                    @if ($icon)
                        <span class="block w-20 h-20">
                            <img class="w-full rounded-full"
                                src="{{ $isUploaded ? $icon->temporaryUrl() : asset('storage/' . $icon) }}" />
                        </span>
                    @endif
                </div>
            </x-file-upload>
            {{-- <x-toggle wire:model="status" label="Status" /> --}}
        </div>

        <x-label>Description
            <x-textarea wire:model="description" name="description" label="Description" rows="5" />
        </x-label>
    </x-slot>

    <x-slot name="buttons">
        <button class="btn btn-primary" type="submit">Save</button>
    </x-slot>

    @push('scripts')
        <script src="//cdn.quilljs.com/1.0.0/quill.min.js"></script>
    @endpush
</x-backend.modal>
