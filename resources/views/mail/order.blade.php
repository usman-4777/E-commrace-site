 {{--<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
</head>
<body>

<h2>HTML Table</h2>

<table>
    <tr>
        <th>Order_id</th>
        <th>Image</th>
        <th>Title</th>
        <th>Quantity</th>
        <th>Discount</th>
        <th>Total</th>

    </tr>
    <tr>
        <td>{{$order->order->ref_id}}</td>
        <td>{{$order->product->image}}</td>
        <td>{{$order->product->name}}</td>
        <td>{{$order->quantity}}</td>
        <td>{{$order->discount}}</td>
        <td>{{$order->total_price}}</td>
    </tr>

</table>
--}}

{{--
<table>
    <tr>
        <th>Order_id</th>
        <th>Image</th>
        <th>Title</th>
        <th>Quantity</th>
        <th>Discount</th>
        <th>Total</th>

    </tr>
    <tr>
        <td>{{$order->order->ref_id}}</td>
        <td>{{$order->product->image}}</td>
        <td>{{$order->product->name}}</td>
        <td>{{$order->quantity}}</td>
        <td>{{$order->discount}}</td>
        <td>{{$order->total_price}}</td>
    </tr>
</table>
--}}

     <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml">
 <head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <title>Email Template for Order Confirmation Email</title>

     <!-- Start Common CSS -->
     <style type="text/css">
         #outlook a {padding:0;}
         body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0; font-family: Helvetica, arial, sans-serif;}
         .ExternalClass {width:100%;}
         .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;}
         .backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
         .main-temp table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; font-family: Helvetica, arial, sans-serif;}
         .main-temp table td {border-collapse: collapse;}
     </style>
     <!-- End Common CSS -->
 </head>
 <body>
 <table width="100%" cellpadding="0" cellspacing="0" border="0" class="backgroundTable main-temp" style="background-color: #d5d5d5;">
     <tbody>
     <tr>
         <td>
             <table width="600" align="center" cellpadding="15" cellspacing="0" border="0" class="devicewidth" style="background-color: #ffffff;">
                 <tbody>
                 <!-- Start header Section -->
                 <tr>
                     <td style="padding-top: 30px;">
                         <table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner" style="border-bottom: 1px solid #eeeeee; text-align: center;">
                             <tbody>


                             </tbody>
                         </table>
                     </td>
                 </tr>
                 <!-- End header Section -->

                 <!-- Start address Section -->
<div>
                 <tr>


                     @foreach($order->order_items as $item)
                         {{$item->order->ref_id}}
                         {{$item->product->image}}
                         {{$item->product->name}}
                         {{$item->quantity}}
                         {{$item->discount}}
                         <{{$item->total_price}}
                         @endforeach
                 </tr>
                     <td style="padding-top: 0;">
                         <table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner" style="border-bottom: 1px solid #bbbbbb;">
                             <tbody>
                             <tr>
                                 <th>Order_id</th>
                             </tr>
                             <tr>
                                    <td></td>
                             </tr>

                             </tbody>
                         </table>
                     </td>
                 </tr>
                 <!-- End address Section -->

                 <!-- Start product Section -->
                 <tr>
                     <td style="padding-top: 0;">
                         <table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner" style="border-bottom: 1px solid #eeeeee;">
                             <tbody>

                             <tr>
                                 <th>Image</th>
                             </tr>
                             <tr>
                                 <td>{{$order->product->image}}</td>
                             </tr>
                             </tbody>
                         </table>
                     </td>
                 </tr>
                 <tr>
                     <td style="padding-top: 0;">
                         <table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner" style="border-bottom: 1px solid #eeeeee;">
                             <tbody>
                             <tr>
                                 <th>Title</th>
                             </tr>
                             <tr>
                                 <td>{{$order->product->name}}</td>
                                 </tr>
                                                        </tbody>
                         </table>
                     </td>
                 </tr>



                 <tr>
                     <td style="padding-top: 0;">
                         <table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner" style="border-bottom: 1px solid #eeeeee;">
                             <tbody>
                             <tr>
                                 <th>Quantity</th>
                             </tr>
                             <tr>

                                 <td>{{$order->product->quantity}}</td>
                             </tr>
                             </tbody>
                         </table>
                     </td>
                 </tr>

                             </tbody>
                         </table>
                     </td>
                 </tr>
                 <!-- End product Section -->

                 <!-- Start calculation Section -->
                 <tr>
                     <td style="padding-top: 0;">
                         <table width="560" align="center" cellpadding="0" cellspacing="0" border="0"  style="border-bottom: 1px solid #bbbbbb; margin-top: -5px;">
                             <tbody>
                             <tr>
                                 <tr><th>Discount</th></tr>
                             <td>{{$order->discount}}</td>

                             </tbody>
                         </table>
                     </td>
                 </tr>

                 <!-- End calculation Section -->

                 <!-- Start payment method Section -->
                 <tr>
                     <td style="padding: 0 10px;">
                         <table width="560" align="center" cellpadding="0" cellspacing="0" border="0"  class="devicewidthinner">
                             <tbody>
                             <tr>
                                 <th>Total_Price</th>
                             </tr>
                             <td style="width: 55%; font-size: 14px; line-height: 18px; color: #666666;">
                             <td>{{$order->total_price}}</td>

                             </tbody>
                         </table>
                     </td>
                 </tr>
                 <!-- End payment method Section -->
                 </tbody>
             </table>
         </td>
     </tr>
     </tbody>
 </table>
 </div>
 </body>
 </html>
