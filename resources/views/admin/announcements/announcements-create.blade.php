<x-create-modal title="Create Announcement">
    <div class="col-md-6 mb-3">
        <label class="form-label">Title</label>
        <input type="text" class="form-control" name="title" placeholder="title" wire:model='title' />
        @include('admin.error', ['property' => 'title'])
    </div>
    <div class="col-md-6 mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Content</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" wire:model='content'></textarea>
        @include('admin.error', ['property' => 'content'])
    </div>
</x-create-modal>