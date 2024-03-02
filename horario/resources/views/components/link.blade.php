<a {{
    $attributes->merge([
        'class'=>'inline-block bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded shadow'
        ])
}} >
    {{$slot}}
</a>
