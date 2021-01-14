<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $order->invoice }}</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: normal; /* inherit */
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
<?php use App\OrderDetail; use App\Product; ?>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="data_file/ji capster.png" width="170px"  height="60px">
                            </td>
                            
                            <td>
                                Invoice : <strong>#{{ $order->invoice }}</strong><br>
                                {{ $order->created_at }}<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <strong> PEMESAN </strong><br>
                                {{ $order->customer_name }}<br>
                                {{ $order->customer_phone }}<br>
                                {{ $order->customer_address }}<br>
                                {{ $order->prody->faculty->name }}<br>
                                
                            </td>
                            
                            <td>
                                <strong> JI CAPSTER </strong><br>
                                JAMBI Campus Shopping Center <br>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>Produk</td>
                <td>Subtotal</td>
            </tr>
            <?php $detail = OrderDetail::where('order_id', $order->id)->get() ?>
            @foreach ($detail as $row)
            <tr class="item">
                <td><?php $name = Product::where('id',$row->product_id)->value('name') ; ?> {{ $name }}
                    <br>
                    <strong>Harga</strong>: Rp {{ number_format($row->price) }} x {{ $row->qty }}
                </td>
                <td>Rp {{ number_format($row->price * $row->qty) }}</td>
            </tr>
            @endforeach
            
            <tr class="total">
                <td></td>
                <td>
                   Total Harga: Rp {{ number_format($order->subtotal) }}
                </td>
            </tr>
            
           
            <!-- <tr class="total">
                <td></td>
                <td>
                   Pembayaran: Rp -{{ number_format($order->cash) }}
                </td>
            </tr>
            <tr>
                <td><strong>Detail Pembayaran</strong></td>
                <td>
                Kembalian : Rp {{ number_format($order->change) }}<br>
                Utang : Rp {{ number_format($order->piutang) }}</td>
            </tr> -->
        
        </table>
    </div>
</body>
</html>
