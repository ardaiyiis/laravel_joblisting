@props(['tag','size'=> 'base'])


@php
    $classes = "bg-white/10 hover:bg-orange-500 rounded-xl font-bold transition-colors duration-300";
    if ($size === 'base') {
        $classes.= " px-5 py-1 text-sm";// there should be a space in the begginin to not collapse woth the other attrs.
    }

    if ($size === 'small') {
        $classes.= " px-3 py-1 text-2xs";
    }
@endphp
<a href="/tags/{{ strtolower($tag->name) }}" class="{{$classes}}">{{$tag->name}}</a>
