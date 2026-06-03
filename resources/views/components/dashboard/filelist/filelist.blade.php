@props(['files'])

<div class="p-4">
    <ul class="list bg-base-100 rounded-box shadow-md">
        @foreach ($files as $file)
            <li class="list-row items-center">
                <div>
                    <img class="size-10 rounded-box" src="https://placehold.co/40x40" alt="File preview" />
                </div>
                <div>
                    <div>{{ $file->name }}</div>
                </div>
                <p>123 bytes</p>
                <div class="dropdown dropdown-end">
                    <form action="/dashboard/files/{{ $file->id }}" method="POST" data-delete-file-form>
                        @csrf
                        @method('DELETE')
                        <div tabindex="0" role="button" class="btn btn-square btn-ghost">
                            <img src="/icons/more.png" height="16" width="16" alt="More options" />
                        </div>
                        <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-40 p-2 shadow">
                            <li><button type="submit">Delete</button></li>
                        </ul>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>