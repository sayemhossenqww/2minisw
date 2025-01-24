<html lang="ar" dir="rtl">

<head>
    <title>{{ $order->number }} </title>
</head>

<body>
    <div style="margin-bottom: 0.2rem;text-align: center !important;">
        @if ($settings->logo)
            <div style="padding-right: 1rem;padding-left: 1rem;margin-bottom: 0.5rem">
                {!! $settings->logo !!}
            </div>
        @else
            @if ($settings->storeName)
                <div style="font-size: 1.50rem;">{{ $settings->storeName }}</div>
            @endif
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
            <div style="display: flex">
                <div> {{ $detail->product->name }} (x{{ $detail->quantity }})</div>
                <div style="margin-right: auto">{{ $detail->view_total }}</div>
            </div>
        @endforeach
    </div>

    @if ($order->discount > 0)
        <div style="display: flex;">
            <div>الخصم</div>
            <div style="margin-right: auto">{{ $order->discount_view }}</div>
        </div>
    @endif
    @if ($order->is_delivery)
        @if ($order->delivery_charge > 0)
            <div style="display: flex;">
                <div>رسوم التصويل</div>
                <div style="margin-right: auto">{{ $order->delivery_charge_view }}</div>
            </div>
        @endif
    @endif
    @if ($order->tax_rate > 0)
        @if ($order->tax_type == 'add')
            <div style="display: flex;">
                <div>ضريبة القيمة المضافة</div>
                <div style="margin-right: auto">{{ $order->tax_rate }}%</div>
            </div>
        @else
            <div style="display: flex;">
                <div>المجموع</div>
                <div style="margin-right: auto">{{ $order->subtotal_view }}</div>
            </div>
            <div style="display: flex;">
                <div>قيمة الضريبة</div>
                <div style="margin-right: auto">{{ $order->tax_amount_view }}</div>
            </div>
            <div style="display: flex;">
                <div>ضريبة القيمة المضافة {{ $order->tax_rate }}%</div>
                <div style="margin-right: auto">{{ $order->vat_view }}</div>
            </div>
        @endif
    @endif
    <div style="font-weight: 700">
        <div>الإجمالي</div>
        <div style="display: flex;">
            <div style="margin-right: auto">{{ $order->total_view }}</div>
        </div>
        <div style="display: flex;">
            <div style="margin-right: auto">
                {{ $order->receipt_exchange_rate }}
            </div>
        </div>
    </div>
    <div style="text-align: center !important;margin-bottom: 0.5rem !important;" dir="ltr">
        <span style="margin-right: 1rem">{{ $order->date_view }}</span> <span>{{ $order->time_view }}</span>
    </div>
    <div style="text-align: center !important;margin-bottom: 0.5rem !important;" dir="ltr">
        {{ $order->number }}
    </div>
    @if ($settings->storeAdditionalInfo)
        <div style="font-size: 0.875em;text-align: center !important;margin-bottom: 0.5rem !important;">
            {{ $settings->storeAdditionalInfo }}
        </div>
    @endif
    <div style="display: flex;align-items: center !important;justify-content: center">
        {!! DNS1D::getBarcodeSVG($order->number, 'C128', 2, 30, 'black', false) !!}
    </div>
</body>

</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.print();
    });
</script>
