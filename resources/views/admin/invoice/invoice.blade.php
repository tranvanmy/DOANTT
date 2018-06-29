<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>HOA DON BAN HANG UTT-COOK</title>
    
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
        line-height: inherit;
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

    .panel-title{
        color: #333;
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
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                UTT-COOK   
                                <!-- {{ dump($order) }} -->
                            </td>
                            
                            <td>
                                Invoice #: {{ ($order['id']) }} <br>
                                Ngày Đặt Hàng: {{ ($order['created_at']) }}<br>
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
                                <h4>Thông tin đơn hàng:</h4>
                                Name:{{ ($order['name']) }}<br>
                                Email: {{ ($order['email']) }}<br>
                                Phone: {{ ($order['phone']) }} <br>
                                Address: {{ ($order['address']) }} <br>
                                Note: {{ ($order['note']) }}
                                <h4>Trang Thai</h4>
                                @if ($order['status'] === 0)
                                    Đang Chờ
                                @else
                                    Duyệt
                                @endif
                            </td>
                           
                            <td>
                                <h4>Phương Thức Thanh Toán:</h4>
                                Vận chuyển tận nhà. Thanh toán khi nhận hàng
                                <h4>Người bán hàng</h4>
                                {{ $order['sellerr']['name'] }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    <div class="panel panel-default">
   <div class="panel-heading" style="background-color: #a9a4a4;
    padding: 1px;">
      <h3 class="panel-title"><strong>Sản Phẩm</strong></h3>
   </div>
   <div class="panel-body">
      <div class="table-responsive">
         <table class="table table-condensed">
            <thead>
               <tr>
                  <td><strong>Sản phẩm</strong></td>
                  <td class="text-center"><strong>Gía Tiền</strong></td>
                  <td class="text-center"><strong>Số Lượng</strong></td>
                  <td class="text-right"><strong>Tổng Tiền</strong></td>
               </tr>
            </thead>
            <tbody>
                @php
                    $totalOrder = 0;
                @endphp
                @foreach ($order['orderDetail'] as $order)
               <tr>
                    <td>
                        <a href="/site/cooking/57" target="_blank">
                        {{ $order['cooking']['name']}}
                        </a>
                    </td>
                  <td class="text-center">{{ $order['cooking']['price']}} VND</td>
                  <td class="text-center">{{ $order['quantity'] }}</td>
                  <td class="text-right">{{ $order['quantity'] * $order['cooking']['price'] }} VND</td>
               </tr>
               <p style="display: none;">
                    {{ $total = $order['quantity'] * $order['cooking']['price']}}
                    {{ $totalOrder += $total  }}
               </p>
                @endforeach
               <tr>
                  <td class="thick-line"></td>
                  <td class="thick-line"></td>
                  <td class="thick-line text-center"><strong>Tổng Tiền</strong></td>
                  <td class="thick-line text-right">{{ $totalOrder }} VND</td>
               </tr>
               <tr>
                  <td class="no-line"></td>
                  <td class="no-line"></td>
                  <td class="no-line text-center"><strong>Vận Chuyển</strong></td>
                  <td class="no-line text-right">0đ</td>
               </tr>
               <tr>
                  <td class="no-line"></td>
                  <td class="no-line"></td>
                  <td class="no-line text-center"><strong>Tổng Tiền</strong></td>
                  <td>{{ $totalOrder }} VND</td>
               </tr>
            </tbody>
         </table>
         
      </div>
   </div>
</div>
    </div>
</body>
</html>
