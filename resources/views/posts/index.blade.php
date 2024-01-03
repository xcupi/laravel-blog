<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Blog ITTS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex justify-between items-center">
                    <div>
                        <h2 class="text-lg font-semibold">Data Posts</h2>
                    </div>
                    <a href="{{ route('posts.create') }}" class="inline-block bg-gray-500 text-white px-2 py-2 rounded">TAMBAH POST</a>
                </div>
                <div class="mt-4 w-full overflow-x-auto">
                    <table class="mx-auto min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">NO</th>
                                <th class="py-2 px-4 border-b">GAMBAR</th>
                                <th class="py-2 px-4 border-b">JUDUL</th>
                                <th class="py-2 px-4 border-b">CONTENT</th>
                                <th class="py-2 px-4 border-b">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $key => $post)
                                <tr>
                                    <td class="py-2 px-4 border-b text-center">{{ $key + 1 }}</td>
                                    <td class="py-2 px-4 border-b text-center">
                                        <img src="{{ asset('/storage/posts/'.$post->image) }}" class="rounded" style="width: 150px" alt="{{ $post->title }}">
                                    </td>
                                    <td class="py-2 px-4 border-b">{{ $post->title }}</td>
                                    <td class="py-2 px-4 border-b">{!! $post->content !!}</td>
                                    <td class="py-2 px-4 border-b">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                            <a href="{{ route('posts.show', $post->id) }}" class="inline-block bg-gray-500 text-white px-2 py-2 rounded">SHOW</a>
                                            <a href="{{ route('posts.edit', $post->id) }}" class="inline-block bg-gray-500 text-white px-2 py-2 rounded">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-block bg-red-500 text-white px-2 py-1 rounded">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">Data Post belum Tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
