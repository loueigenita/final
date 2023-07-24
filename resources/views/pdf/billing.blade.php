<!DOCTYPE html>
<html>
<head>
    <title>Billing Information</title>
    <style>
        * {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif';
            font-size: 10pt;
        }

        table {
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <!-- <div style="display: flex; justify-content: center; align-items: center; width: 100%;">
        <img src="{{public_path('images/companylogo.png')}}" alt="" style="width: 50px;"> -->
        <p style="text-align: center; font-size: 16px; font-style: bold; margin-bottom: 0;">Sunnies Electric Cooperative, Inc.</p>
        <p style="text-align: center; font-size: 14px; margin-top: 0;">Tubigon, Bohol. <br>
        Tel. Nos. (452) 684-9823 | 735-9457
        </p>

        <h1 style="font-size: 18pt; margin-top: 50px; margin-bottom: 0px;">Billing Information</h1>
        <hr>
        <p style="text-align: right;  font-size: 14px; font-style: bold;">Billing no. 0000{{ $billing->id }}</p>

        <table style="width: 100%;">
            <thead style="background-color: #32a852">
                <tr>
                <th style="color: white; text-align: left;">BILLING MONTH</th>
                <th style="color: white; text-align: left;">KWH USED</th>
                <th style="color: white; text-align: left;">AMOUNT</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="font-size: 14px;">{{ $billing->billing_date }}</td>
                    <td style="font-size: 14px;">{{ $billing->kwh_used }}</td>
                    <td style="font-size: 14px;">{{ $billing->amount }}</td>
                </tr>
                <tr>
                    <td style="font-size: 14px;">&nbsp;</td>
                    <td style="font-size: 14px;">VAT</td>
                    <td style="font-size: 14px;">{{ $billing->vat }}</td>
                </tr>
                <tr>
                    <td style="font-size: 14px;">&nbsp;</td>
                    <td style="font-size: 14px; border-top: solid 1px black;">AMOUNT DUE</td>
                    <td style="font-size: 14px; border-top: solid 1px black;">{{ $billing->amount + $billing->vat }}</td>
                </tr>
            </tbody>
        </table>
        
        <p style="text-align: left;  font-size: 14px; font-style: bold;">Due date: {{ $billing->due_date }}</p>
        <!-- <div style="display: flex; justify-content: end; align-items: center; width: 100%;">
        </div> -->
</body>
</html>