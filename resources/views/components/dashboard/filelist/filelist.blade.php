@props(['files'])

<div class="p-4">
    <ul class="list bg-base-100 rounded-box shadow-md">
    
@foreach ($files as $file)
    <li class="list-row">
        <div><img class="size-10 rounded-box" src="https://placehold.co/40x40"/></div>
            <div>
                <div>{{ $file->name }}</div>
            </div>
            <p>123 bytes</p>
            <button class="btn btn-square btn-ghost">
            <img src="/icons/more.png" height="16" width="16">
        </button>
    </li>
@endforeach
    
    <li class="list-row">
</div>