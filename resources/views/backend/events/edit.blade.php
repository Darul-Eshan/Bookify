<select name="category_id"
    required
    class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500">

    <option value="">Select Category</option>

    @foreach($categories as $category)
        <option value="{{ $category->id }}"
            {{ old('category_id', $event->category_id) == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
    @endforeach

</select>

@error('category_id')
    <p class="text-red-400 text-xs mt-1">
        {{ $message }}
    </p>
@enderror