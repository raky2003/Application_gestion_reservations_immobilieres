@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-slate-300 focus:border-cyan-500 focus:ring-cyan-500 rounded-lg shadow-sm']) !!}>
