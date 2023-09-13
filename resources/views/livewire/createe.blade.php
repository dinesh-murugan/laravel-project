<!-- livewire/posts.blade.php -->

@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<form wire:submit.prevent="storee">
    <div class="mb-3">
        <label for="title" class="form-label">Title:</label>
        <input wire:model="title" type="text" class="form-control" id="title" placeholder="Enter the title">
        @error('title')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="body" class="form-label">Body:</label>
        <textarea wire:model="body" class="form-control" id="body" placeholder="Enter the body"></textarea>
        @error('body')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">Save</button>
</form>
