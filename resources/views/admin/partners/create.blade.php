@extends('layouts.admin')

@section('title', 'Tambah Partner Baru - Admin')
@section('page_title', 'Tambah Partner Baru')
@section('page_subtitle', 'Tambahkan partner atau sponsor baru untuk event Anda.')

@section('content')

<div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm max-w-3xl">

    <form action="{{ url('/admin/partners/store') }}" 
          method="POST" 
          class="space-y-6">

        @csrf

        <!-- Nama Partner -->
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">
                Nama Partner
            </label>

            <input type="text"
                   name="name"
                   value="{{ old('name') }}"
                   placeholder="Contoh: Tokopedia, Dicoding, Google"
                   class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium"
                   required>

            @error('name')
                <span class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <!-- Logo URL -->
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">
                URL Logo Partner
            </label>

            <input type="text"
                   name="logo_url"
                   value="{{ old('logo_url') }}"
                   placeholder="https://placehold.co/200x200"
                   class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium"
                   required>

            @error('logo_url')
                <span class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </span>
            @enderror

            <p class="text-xs text-slate-400 mt-2">
                Gunakan URL gambar/logo partner dari internet.
            </p>
        </div>

        <!-- Preview Logo -->
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-3 uppercase tracking-wide">
                Preview Logo
            </label>

            <div class="w-32 h-32 rounded-3xl border-2 border-dashed border-slate-200 flex items-center justify-center overflow-hidden bg-slate-50">
                <img id="logo-preview"
                     src="https://placehold.co/200x200"
                     class="w-full h-full object-cover">
            </div>
        </div>

        <!-- Buttons -->
        <div class="pt-4 flex justify-end gap-4 border-t border-slate-100">

            <a href="{{ route('admin.partners.index') }}"
               class="px-6 py-4 text-slate-500 font-bold hover:text-slate-800 transition">

                Batal

            </a>

            <button type="submit"
                    class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition">

                Simpan Partner

            </button>

        </div>

    </form>

</div>

<!-- Script Preview Logo -->
<script>
    const logoInput = document.querySelector('input[name="logo_url"]');
    const logoPreview = document.getElementById('logo-preview');

    logoInput.addEventListener('input', function () {
        logoPreview.src = this.value;
    });
</script>

@endsection