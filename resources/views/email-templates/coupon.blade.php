<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>{{\App\CPU\translate('Coupon Code')}}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
  /**
   * Google webfonts. Recommended to include the .woff version for cross-client compatibility.
   */

  @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
  /**
   * Avoid browser level font resizing.
   * 1. Windows Mobile
   * 2. iOS / OSX
   */
   body{
    font-family: 'Roboto', sans-serif;
   }
  body,
  table,
  td,
  a {
    -ms-text-size-adjust: 100%; /* 1 */
    -webkit-text-size-adjust: 100%; /* 2 */
  }

  /**
   * Remove extra space added to tables and cells in Outlook.
   */
  table,
  td {
    mso-table-rspace: 0pt;
    mso-table-lspace: 0pt;

  }

  /**
   * Better fluid images in Internet Explorer.
   */
  img {
    -ms-interpolation-mode: bicubic;
  }

  /**
   * Remove blue links for iOS devices.
   */
  a[x-apple-data-detectors] {
    font-family: inherit !important;
    font-size: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
    color: inherit !important;
    text-decoration: none !important;
  }

  /**
   * Fix centering issues in Android 4.4.
   */
  /* div[style*="margin: 16px 0;"] {
    margin: 0 !important;
  } */



  /**
   * Collapse table borders to avoid space between cells.
   */
  table {
    border-collapse: collapse !important;
  }

  a {
    color: #1a82e2;
  }

  img {
    height: auto;
    line-height: 100%;
    text-decoration: none;
    border: 0;
    outline: none;
  }

  </style>

</head>
<body style="background-color: #ececec;margin:0;padding:0">
  <?php
    use App\Model\BusinessSetting;
    $company_phone =BusinessSetting::where('type', 'company_phone')->first()->value;
    $company_email =BusinessSetting::where('type', 'company_email')->first()->value;
    $company_name =BusinessSetting::where('type', 'company_name')->first()->value;
    $company_web_logo =BusinessSetting::where('type', 'company_web_logo')->first()->value;
    $company_mobile_logo =BusinessSetting::where('type', 'company_mobile_logo')->first()->value;
?>
<div style="width:650px;margin:auto; background-color:#ececec;height:50px;">

</div>
<p style="padding:5px;width:650px;margin:auto;margin-top:5px; margin-bottom:50px;">
    {{-- @foreach ($body['customer'] as $b) --}}
           <p style="margin:auto;width:90%; color:#777777;">
            Save your next order. <br>
           {{$body['customer']->f_name .' '. $body['customer']->l_name}}, {{$body['start_date']}} days have passed since your last order. <br>
            We want to encourage you to treat yourself to a little something extra with this coupon:

          <b style="font-size:17px; color:#18e957;">{{$body['Coupon_Code']}}</b> <br>

            It’s valid for until {{$body['expire_date']}} and gives   your purchase! <br>

            Go to our store to redeem the coupon code: <b style="font-size:17px; color:#12e486;">{{$body['Coupon_Code']}}</b>.

           </p>
    {{-- @endforeach --}}
</p>

<div style="padding:5px;width:650px;margin:auto;margin-top:5px; margin-bottom:50px;">

    <table style="margin:auto;width:90%; color:#777777;">
        <tbody>
            <tr>
                <th style="text-align: left;">
                    <h1>
                        {{$company_name = \App\Model\BusinessSetting::where('type', 'company_name')->first()->value}}
                    </h1>
                </th>
            </tr>
            <tr>
                <th style="text-align: left;">
                    <div> {{\App\CPU\translate('phone')}}
                        : {{\App\Model\BusinessSetting::where('type','company_phone')->first()->value}}</div>
                    <div> {{\App\CPU\translate('website')}}
                        : {{url('/')}}</div>
                    <div > {{\App\CPU\translate('email')}}
                        : {{$company_email}}</div>
                </th>

            </tr>
            <tr>
                @php($social_media = \App\Model\SocialMedia::where('active_status', 1)->get())

                @if(isset($social_media))
                    <th style="text-align: left; padding-top:20px;">
                        <div style="width: 100%;display: flex;
                        justify-content: flex-start;">
                          @foreach ($social_media as $item)

                            <div class="" >
                              <a href="{{$item->link}}" target=”_blank”>
                              <img src="{{asset('public/assets/back-end/img/'.$item->name.'.png')}}" alt="" style="height: 50px; width:50px; margin:10px;">
                              </a>
                            </div>

                          @endforeach
                        </div>
                    </th>
                @endif
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>
