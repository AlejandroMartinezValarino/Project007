<a {{
    $attributes->merge([
        'class'=>'mt-2 mb-2 px-4 py-2 bg-blue-800 rounded text-xs text-white uppercase hover:bg-blue-700 mr-3'
        ])
}} >
    {{$slot}}
</a>
