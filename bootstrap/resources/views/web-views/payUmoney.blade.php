<html>
<head>
</head>
<body onload="submitPayuForm()">

Processing Payment.....
<form action="{{$action}}" method="post" name="payuForm"><br />
    <input type="hidden" name="key" value="{{$MERCHANT_KEY}}" /><br />
    <input type="hidden" name="hash" value="{{$hash}}"/><br />
    <input type="hidden" name="txnid" value="{{$post_data['tran_id'] }}" /><br />
    <input type="hidden" name="amount" value="{{$post_data['total_amount']}}" /><br />
    <input type="hidden" name="firstname" id="firstname" value="{{$post_data['cus_name']}}" /><br />
    <input type="hidden" name="email" id="email" value="{{$post_data['cus_email']}}" /><br />
    <input type="hidden" name="phone" id="phone" value="{{$post_data['cus_phone']}}" /><br />
    <input type="hidden" name="productinfo" value="{{$post_data['product_name']}}"><br />
    <input type="hidden" name="surl" value="{{ $post_data['success_url'] }}" /><br />
    <input type="hidden" name="furl" value="{{ $post_data['cancel_url'] }}" /><br />
    <input type="hidden" name="service_provider" value="payu_paisa"  /><br />
    <?php
    if(!$hash) { ?>
        <input type="submit" value="Submit" />
    <?php } ?>
</form>
<script>
var payuForm = document.forms.payuForm;
payuForm.submit();
</script>
</body>
</html>
