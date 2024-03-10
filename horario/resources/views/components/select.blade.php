<select name="{{ $name }}" id="{{ $id }}" class="text-black text-sm rounded-lg focus:ring-blue-700 focus:border-blue-700 block w-full p-2.5 bg-blue-100 border-blue-100">
    @foreach ($options as $value => $label)
        <option value="{{ $value }}" @if($value == $selected) selected @endif>
            {{ $label }}
        </option>
    @endforeach
</select>