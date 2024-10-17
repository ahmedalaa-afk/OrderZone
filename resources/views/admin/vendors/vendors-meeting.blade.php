<x-show-modal id="showModal" title="Meeting Details">
    <form wire:submit.prevent="submit" method="post">
        <div class="mb-3 row">
            <label for="html5-datetime-local-input" class="col-md-2 col-form-label">Datetime</label>
            <div class="col-md-5">
                <input class="form-control" type="datetime-local" value="2021-06-18T12:30:00"
                    id="html5-datetime-local-input" wire:model='date' />
                    @include('admin.error', ['property' => 'date'])
            </div>
        </div>
        <div class="mb-3 row">
            <label for="html5-url-input" class="col-md-2 col-form-label">URL</label>
            <div class="col-md-5">
                <input class="form-control" type="url" id="html5-url-input" wire:model='url' />
                @include('admin.error', ['property' => 'url'])
            </div>
        </div>
        <div class="mb-3 mt-3">

            <button class="btn btn-primary" type="submit" href="#">
                Send
            </button>
        </div>
    </form>
</x-show-modal>