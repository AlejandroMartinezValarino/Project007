<a {{
    $attributes->merge([
        'class'=>'inline-block bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded shadow w-40 h-40 text-center'
        ])
}} >
    {{$slot}}
</a>
