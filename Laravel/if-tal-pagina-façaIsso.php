@php
  use Illuminate\Support\STR;
@endphp

<div class="card border-0 bg-transparent">
  @if(Str::startsWith(request()->path(), 'acompanhante/'))
  <div class="card-body p-0 pb-5">
  @else
  <div class="card-body p-0">
  @endif
