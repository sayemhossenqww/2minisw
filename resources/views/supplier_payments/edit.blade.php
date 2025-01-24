@extends('layouts.app')
@section('title', __('Edit Payment'))

@section('content')

    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1">@lang('Edit') @lang('Payment') </div>
        <x-back-btn href="{{ route('supplier-payments.index') }}" />
    </div>

    <x-card>

        <form action="{{ route('supplier-payments.update', $payment) }}" method="POST" role="form">
            @csrf

            <div class="mb-3">
                <label for="supplier" class="form-label">@lang('Supplier')</label>
                <select name="supplier" id="supplier" class=" form-select @error('supplier') is-invalid @enderror">
                    <option value="" selected></option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" @selected($payment->supplier_id == $supplier->id)>{{ $supplier->name }} - {{ $supplier->number }}
                        </option>
                    @endforeach
                </select>
                @error('supplier')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="date" class="form-label">@lang('Date')</label>
                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror"
                        value="{{ old('date', now()->format('Y-m-d')) }}">
                    @error('date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="mode" class="form-label">@lang('Payment Mode')</label>
                    <select name="mode" id="mode" class=" form-select">
                        <option value="" selected></option>
                        @foreach ($modes as $mode)
                            <option value="{{ $mode }}" @selected($payment->mode == $mode)>{{ $mode }}</option>
                        @endforeach
                    </select>
                    @error('mode')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <x-currency-input label="Amount" name="amount" value="{{ old('amount', $payment->amount) }}" />

            <div class="mb-3">
                <label for="comments" class="form-label">@lang('Comments')</label>
                <textarea name="comments" class="form-control @error('comments') is-invalid @enderror" id="comments" rows="3">{{ old('comments', $payment->comments) }}</textarea>
                @error('comments')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <button class="btn btn-primary" type="submit">
                    @lang('Save')
                </button>
            </div>
        </form>

    </x-card>

@endsection
