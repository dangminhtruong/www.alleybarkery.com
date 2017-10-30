<!DOCTYPE html>
<html>
<head>
    <title>AlleyBakerry - xác nhận đơn hàng</title>
</head>
<body>
    <h2>Thư xác nhận đơn hàng</h2>
    <p>Kính chào quý khách 
        <b>
            @if($userInfo->full_name)
                {{ $userInfo->full_name }}
            @elseif($userInfo->name)
                {{ $userInfo->name }}
            @endif
        </b><br/> 
       Xin cám ơn bạn đã mua hàng online tại cửa hàng <a href="http://localhost:8000/">AlleyBakerry</a> của chúng tôi. Dưới đây là thông tin thanh toán của bạn: <br/>
       <b>Họ tên khách hàng: </b> 
            <i>
                @if($userInfo->full_name)
                    {{ $userInfo->full_name }}
                @elseif($userInfo->name)
                    {{ $userInfo->name }}
                @endif
            </i><br/>
       <b>Số điện thoại: </b>
            <i>
                 @if($userInfo->phone)
                    {{ $userInfo->phone }}
                @elseif($userInfo->phone_number)
                    {{ $userInfo->phone_number }}
                @endif
            </i><br/>
       <b>Địa chỉ nhận hàng: </b><i>{{ $userInfo->address }}</i><br/>
       <b>Tổng thanh toán :</b>{{ $userBillInfor->total }} vnđ <br/>
       <b>Hình thức thanh toán: </b> {{  $userBillInfor->payment }}<br/>
       <h5>Chi tiết đơn hàng: </h5><br/>
       @foreach($userBillInfor->bill_detail as $detail)
            <p>
                <b>Tên sản phẩm: </b> <u>{{ $detail->products->name }} </u>
                <b>Đơn giá: </b><u>{{ $detail->unit_price }} vnđ </u> 
                <b>Số lượng: </b><u>{{ $detail->quantity }} </u>
            </p>
       @endforeach
       <b>Nếu bạn không thực hiện giao dịch trên vui lòng bấm vào 
        <a href="{{ route('userCancelOrder', [$userBillInfor->id]) }}">ĐÂY</a> để hủy bỏ đơn hàng...
      </b>
    </p>
</body>
</html>