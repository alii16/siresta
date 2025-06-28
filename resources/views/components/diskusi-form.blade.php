@props(['wisataId'])

<form action="{{ route('diskusi.store') }}" method="POST" class="mb-4">
    @csrf
    <input type="hidden" name="wisata_id" value="{{ $wisataId }}">
    <textarea name="pesan" rows="2" class="w-full rounded border-gray-300 mb-2" placeholder="Tulis pesan..."></textarea>
    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Kirim</button>
</form>
