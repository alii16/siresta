@props(['wisataId'])

<form action="{{ route('review.store') }}" method="POST" class="space-y-2">
    @csrf
    <input type="hidden" name="wisata_id" value="{{ $wisataId }}">

    <label class="block">
        <span class="text-sm">Rating (1 - 5)</span>
        <input type="number" name="rating" min="1" max="5" required class="w-full rounded border-gray-300" />
    </label>

    <label class="block">
        <span class="text-sm">Komentar</span>
        <textarea name="komentar" rows="2" class="w-full rounded border-gray-300"></textarea>
    </label>

    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Kirim Review</button>
</form>
