@vite(['resources/js/app.js'])
@props(['files'])

<div class="p-4">
    <ul class="list bg-base-100 rounded-box shadow-md">
        @foreach ($files as $file)
            <li class="list-row items-center">
                <div>
                    <img class="size-10 rounded-box" src="https://placehold.co/40x40" alt="File preview"/>
                </div>

                <div class="flex-1">
                    <div>{{ $file->name }}</div>

                    <div class="text-xs text-base-content/60">
                        Expires {{ \App\Models\Files::formatFileExpiry($file) }}
                    </div>
                </div>


                <p class="text-sm">
                    {{ \App\Models\Files::formatFileSize($file) }}
                </p>

                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn btn-square btn-ghost">
                        <img src="/icons/more.png" height="16" width="16" alt="More options"/>
                    </div>

                    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-40 p-2 shadow">
                        <li>
                            <a href="/view/{{ $file->url_id }}" target="_blank" rel="noopener">
                                View
                            </a>
                        </li>

                        <li>
                            <form action="/dashboard/files/{{ $file->id }}" method="POST" data-delete-file-form>
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="w-full text-left">
                                    Delete
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </li>
        @endforeach
    </ul>
</div>