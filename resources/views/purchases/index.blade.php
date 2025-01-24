@extends('layouts.app')
@section('title', __('Purchases'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1">@lang('Purchases')</div>
        <div>
            <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal"
                data-bs-target="#filterModal">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="hero-icon-sm me-1">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                </svg>
                @lang('Filter')
            </button>
        </div>
        <a href="{{ route('purchases.create') }}" class="btn btn-primary px-4 m-2">
            @lang('Create')
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>@lang('Date')</th>
                            <th>@lang('Number')</th>
                            <th>@lang('Ref. №')</th>
                            <th>@lang('Supplier')</th>
                            <th>@lang('Average Cost')</th>
                            <th>@lang('Last Cost')</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchases as $purchase)
                            @if ($purchase->supplier)
                            <tr>
                                <td class="align-middle">{{ $purchase->date_view }}</td>
                                <td class="align-middle fw-bold">{{ $purchase->number }}</td>
                                <td class="align-middle">{{ $purchase->reference_number }}</td>
                                <td class="align-middle">{{ $purchase->supplier ? $purchase->supplier->name : '-' }}</td>
                                <td class="align-middle">$ {{ $purchase->average_cost }}</td>
                                <td class="align-middle">$ {{ $purchase->last_cost }}</td>
                                <td class="align-middle">
                                    <div class="dropdown d-flex">
                                        <button class="btn btn-link me-auto text-black p-0" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <x-heroicon-o-ellipsis-horizontal class="hero-icon" />
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end animate slideIn shadow-sm"
                                            aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('purchases.show', $purchase) }}">
                                                    @lang('Show')
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('purchases.print', $purchase) }}"
                                                    target="_blank">
                                                    @lang('Print')
                                                </a>
                                            </li>
                                            @can_edit
                                            <li>
                                                <a class="dropdown-item" href="{{ route('purchases.edit', $purchase) }}">
                                                    @lang('Edit')
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <form action="{{ route('purchases.destroy', $purchase) }}"
                                                        method="POST" id="form-{{ $purchase->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            class="btn btn-link p-0 m-0 w-100 text-start text-decoration-none text-danger"
                                                            onclick="submitDeleteForm('{{ $purchase->id }}')">
                                                            @lang('Delete')
                                                        </button>
                                                    </form>
                                                </a>
                                            </li>
                                            @endcan_edit
                                        </ul>
                                    </div>

                                </td>

                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                @if ($purchases->isEmpty())
                    <x-no-data />
                @endif
            </div>
            <div class="">
                {{ $purchases->withQueryString()->links() }}
            </div>
        </div>
    </div>
    <div class="modal" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="filterModalLabel">@lang('Purchase Filter')</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('purchases.index') }}" method="GET" role="form">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="date" class="form-label">@lang('Date')</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                        <div class="mb-3">
                            <label for="supplier_name" class="form-label">@lang('Supplier Name')</label>
                            <input type="text" name="supplier_name" class="form-control" id="supplier_name">
                        </div>
                        <div class="mb-3">
                            <label for="purchase_number" class="form-label">@lang('Purchase Nunmber')</label>
                            <input type="text" name="purchase_number" class="form-control" id="purchase_number">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary w-100">@lang('Use Filter')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        function submitDeleteForm(id) {
            const form = document.querySelector(`#form-${id}`);
            Swal.fire(swalConfig()).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                } else {
                    topbar.hide();
                }
            });
        }
    </script>
@endpush
