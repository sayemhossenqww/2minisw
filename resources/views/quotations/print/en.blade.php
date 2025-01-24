<html lang="en" dir="ltr">

<head>
    <title>{{ $order->number }} </title>
</head>

<body>


    <div style="margin-bottom: 0.2rem;text-align: center !important;">
        <div style="font-size: 3em;">Quotations</div>
        @if ($settings->storeName)
            <div style="font-size: 1.50rem;">{{ $settings->storeName }}</div>
        @endif

        @if ($settings->storeAddress)
            <div style="font-size: 1rem;">{{ $settings->storeAddress }}</div>
        @endif
        @if ($settings->storePhone)
            <div style="font-size: 0.875em;">{{ $settings->storePhone }}</div>
        @endif
        @if ($settings->storeWebsite)
            <div style="font-size: 0.875em;">{{ $settings->storeWebsite }}</div>
        @endif
        @if ($settings->storeEmail)
            <div style="font-size: 0.875em;">{{ $settings->storeEmail }}</div>
        @endif
    </div>
    <div style="margin-bottom: 1.5rem">
        @foreach ($order->order_details as $detail)
            <div>{{ $detail->product->name }}</div>
            <div style="display: flex">
                <div> {{ $detail->quantity }}* {{ $detail->view_price }}</div>
                <div style="margin-left: auto">{{ $detail->view_total }}</div>
            </div>
        @endforeach
    </div>

    @if ($order->discount > 0)
        <div style="display: flex;">
            <div>DISCOUNT</div>
            <div style="margin-left: auto">{{ $order->discount_view }}</div>
        </div>
    @endif
    @if ($order->is_delivery)
        @if ($order->delivery_charge > 0)
            <div style="display: flex;">
                <div>@lang('DELIVERY CHARGE')</div>
                <div style="margin-left: auto">{{ $order->delivery_charge_view }}</div>
            </div>
        @endif
    @endif
    @if ($order->tax_rate > 0)
        @if ($order->tax_type == 'add')
            <div style="display: flex;">
                <div>VAT</div>
                <div style="margin-left: auto">{{ $order->tax_rate }}%</div>
            </div>
        @else
            <div style="display: flex;">
                <div>SUBTOTAL</div>
                <div style="margin-left: auto">{{ $order->subtotal_view }}</div>
            </div>
            <div style="display: flex;">
                <div>TAX.AMOUNT</div>
                <div style="margin-left: auto">{{ $order->tax_amount_view }}</div>
            </div>
            <div style="display: flex;">
                <div>VAT {{ $order->tax_rate }}%</div>
                <div style="margin-left: auto">{{ $order->vat_view }}</div>
            </div>
        @endif
    @endif
    <div style="font-weight: 700">
        <div>TOTAL</div>
        <div style="display: flex;">
            <div style="margin-left: auto">
                {{ $order->total_view }}
            </div>
        </div>
        <div style="display: flex;">
            <div style="margin-left: auto">
                {{ $order->receipt_exchange_rate }}
            </div>
        </div>
    </div>
    <div style="text-align: center !important;margin-bottom: 0.5rem !important;">
        <span style="margin-right: 1rem">{{ $order->date_view }}</span> <span>{{ $order->time_view }}</span>
    </div>
    <div style="text-align: center !important;margin-bottom: 0.5rem !important;">
        {{ $order->number }}
    </div>
    <div style="display: flex;align-items: center !important;justify-content: center;margin-bottom: 0.5rem !important;">
        {!! DNS1D::getBarcodeSVG($order->number, 'C128', 2, 30, 'black', false) !!}
    </div>
    @if ($settings->storeAdditionalInfo)
        <div style="font-size: 0.875em;text-align: center !important;">
            {!! nl2br($settings->storeAdditionalInfo) !!}
        </div>
    @endif

</body>

</html>
<script>
    // document.addEventListener("DOMContentLoaded", function() {
    //     window.print();
    // });
</script>
