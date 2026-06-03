@extends('layouts.admin')

@section('title', 'Kelola Kategori - Admin')
@section('page_title', 'Kelola Kategori')
@section('page_subtitle', 'Atur kategori event yang tersedia.')

@section('content')

<!-- Top Action -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

    <!-- Search -->
    <form method="GET"
          action="{{ route('admin.categories.index') }}"
          class="w-full md:max-w-md">

        <div class="relative">

            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   placeholder="Cari kategori..."
                   class="w-full px-5 py-4 pr-12 bg-white border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium shadow-sm">

            <button type="submit"
                    class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-indigo-600 transition">

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z">
                    </path>

                </svg>

            </button>

        </div>

    </form>

    <!-- Button -->
    <a href="{{ route('admin.categories.create') }}"
       class="inline-flex items-center justify-center px-6 py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 active:scale-95 transition whitespace-nowrap">

        + Tambah Kategori

    </a>

</div>

<!-- Table -->
<div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full text-left border-collapse">

            <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">

                <tr>
                    <th class="px-8 py-4 w-16">No</th>
                    <th class="px-8 py-4">Nama Kategori</th>
                    <th class="px-8 py-4">Slug</th>
                    <th class="px-8 py-4">Dibuat</th>
                    <th class="px-8 py-4">Aksi</th>
                </tr>

            </thead>

            <tbody class="divide-y border-t">

                @forelse($categories as $index => $category)

                <tr class="hover:bg-slate-50/50 transition">

                    <td class="px-8 py-6 font-bold text-slate-400">
                        {{ $categories->firstItem() + $index }}
                    </td>

                    <td class="px-8 py-6">

                        <p class="font-black text-slate-800">
                            {{ $category->name }}
                        </p>

                        <p class="text-xs text-slate-400">
                            Kategori Event
                        </p>

                    </td>

                    <td class="px-8 py-6">

                        <span class="px-3 py-1 bg-slate-100 text-slate-600 rounded-xl text-xs font-bold">
                            {{ $category->slug }}
                        </span>

                    </td>

                    <td class="px-8 py-6 text-indigo-600 font-semibold">

                        {{ $category->created_at->format('d M Y') }}

                    </td>

                    <td class="px-8 py-6">

                        <div class="flex gap-2">

                            <!-- Edit -->
                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                               class="p-2.5 bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-600 hover:text-white transition">

                                <svg class="w-5 h-5"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>

                                </svg>

                            </a>

                            <!-- Delete -->
                            <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="p-2.5 bg-rose-50 text-rose-600 rounded-xl hover:bg-rose-600 hover:text-white transition">

                                    <svg class="w-5 h-5"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>

                                    </svg>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5"
                        class="px-8 py-10 text-center text-slate-500">

                        Belum ada kategori.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="px-8 py-6 bg-slate-50/50 border-t">
        {{ $categories->appends(request()->query())->links() }}
    </div>

</div>

@endsection