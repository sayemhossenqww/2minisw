@extends('layouts.app')
@section('title', __('Edit') . ' ' . __('Category'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="flex-grow-1">
            <x-page-title>@lang('Edit Category')</x-page-title>
        </div>
        <x-back-btn href="{{ route('categories.index') }}" />
    </div>
    <x-card>
        @include('categories.partials.form')
    </x-card>

@endsection
