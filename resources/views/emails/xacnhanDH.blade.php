<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xác nhận đơn hàng</title>
</head>
<body>
    <table align="center" bgcolor="#dcf0f8" border="0" cellpadding="0" cellspacing="0" style="margin:0;padding:0;background-color:#f2f2f2;width:100%!important;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px" width="100%">
        <tbody>
            <tr>
                <td align="center" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top">
                <table border="0" cellpadding="0" cellspacing="0" style="margin-top:15px" width="600">
                    <tbody>
                       
                        
                        <tr style="background:#fff">
                            <td align="left" height="auto" style="padding:15px" width="600">
                            <table>
                                <tbody>
                                   
                                    <tr>
                                        <td>
                                        <h1 style="font-size:17px;font-weight:bold;color:#444;padding:0 0 5px 0;margin:0">Cảm ơn quý khách đã đặt hàng tại Multishop,</h1>
                                        
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th align="left" style="padding:6px 9px 0px 9px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold" width="50%">Thông tin thanh toán</th>
                                                    <th align="left" style="padding:6px 9px 0px 9px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold" width="50%"> Địa chỉ giao hàng </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="padding:3px 9px 9px 9px;border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top"><span style="text-transform:capitalize">Ksor Sret</span><br>
                                                    <a href="mailto:sretksorjiu.nguyen@gmail.com" target="_blank">sretksorjiu.nguyen@gmail.com</a><br>
                                                    0343191473</td>
                                                    <td style="padding:3px 9px 9px 9px;border-top:0;border-left:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top"><span style="text-transform:capitalize">Ksor Sret</span><br>
                                                     <a href="mailto:sretksorjiu.nguyen@gmail.com" target="_blank">sretksorjiu.nguyen@gmail.com</a><br>
                                                    02- Thanh Bình -Ktx Cao Đẳng công Nghệ, Phường Thanh Bình, Quận Hải Châu, Đà Nẵng, Việt Nam<br>
                                                     T: 0343191473</td>
                                                </tr>
                                                    
                                            </tbody>
                                        </table>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>
                                        <h2 style="text-align:left;margin:10px 0;border-bottom:1px solid #ddd;padding-bottom:5px;font-size:13px;color:#02acea">CHI TIẾT ĐƠN HÀNG</h2>
    
                                        <table border="0" cellpadding="0" cellspacing="0" style="background:#f5f5f5" width="100%">
                                            <thead>
                                                <tr>
                                                    <th align="left" bgcolor="#02acea" style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">Sản phẩm</th>
                                                    <th align="left" bgcolor="#02acea" style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">Đơn giá</th>
                                                    <th align="left" bgcolor="#02acea" style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">Số lượng</th>
                                                    <th align="left" bgcolor="#02acea" style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">Giảm giá</th>
                                                    <th align="right" bgcolor="#02acea" style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">Tổng tạm</th>
                                                </tr>
                                            </thead>
                                            <tbody bgcolor="#eee" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">			@foreach ($cart as $item)
                                                
                                            
                                                <tr>
                                                    <td align="left" style="padding:3px 9px" valign="top"><span>{{ $item->name }}</span><br>
                                                    </td>

                                                    <td align="left" style="padding:3px 9px" valign="top"><span>{{ number_format($item->price, 0, ',', '.') }}đ</span>
                                                    </td>

                                                    <td align="left" style="padding:3px 9px" valign="top">{{ $item->qty }}</td>

                                                    <td align="left" style="padding:3px 9px" valign="top"><span>0đ</span>
                                                    </td>

                                                    <td align="right" style="padding:3px 9px" valign="top"><span>{{ number_format($item->price * $item->qty, 0, ',', '.') }}đ</span></td>
                                                </tr>

                                                @endforeach
                                                
                                            </tbody>
                                            <tfoot style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">											<tr>
                                                    <td align="right" colspan="4" style="padding:5px 9px">Tạm tính</td>
                                                    <td align="right" style="padding:5px 9px"><span>107.000đ</span></td>
                                                </tr>
                                                                                            <tr>
                                                    <td align="right" colspan="4" style="padding:5px 9px">Phí vận chuyển</td>
                                                    <td align="right" style="padding:5px 9px"><span>30.000đ</span></td>
                                                </tr>
                                                                                            <tr bgcolor="#eee">
                                                    <td align="right" colspan="4" style="padding:7px 9px"><strong><big>Tổng giá trị đơn hàng</big> </strong></td>
                                                    <td align="right" style="padding:7px 9px"><strong><big><span>137.000đ</span> </big> </strong></td>
                                                </tr>
                                            </tfoot>
                                        </table>
    
                                        <div style="margin:auto"><a href="https://tiki.vn/sales/order/view/472094975" style="display:inline-block;text-decoration:none;background-color:#00b7f1!important;margin-right:30px;text-align:center;border-radius:3px;color:#fff;padding:5px 10px;font-size:12px;font-weight:bold;margin-left:35%;margin-top:5px" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://tiki.vn/sales/order/view/472094975&amp;source=gmail&amp;ust=1642490873738000&amp;usg=AOvVaw0JSr8JSFUjcI50e9xUSHzM">Chi tiết đơn hàng tại Tiki</a></div>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>&nbsp;
                                        <p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;margin:0;padding:0;line-height:18px;color:#444;font-weight:bold">Một lần nữa Multishop cảm ơn quý khách.</p>
    
                                        <p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;text-align:right"><strong><a href="http://tiki.vn?utm_source=transactional+email&amp;utm_medium=email&amp;utm_term=logo&amp;utm_campaign=new+order" style="color:#00a3dd;text-decoration:none;font-size:14px" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://tiki.vn?utm_source%3Dtransactional%2Bemail%26utm_medium%3Demail%26utm_term%3Dlogo%26utm_campaign%3Dnew%2Border&amp;source=gmail&amp;ust=1642490873738000&amp;usg=AOvVaw2_gjX0iHUNcNuwgo29excw">Tiki</a> </strong></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </td>
            </tr>
            
        </tbody>
    </table>
</body>
</html>