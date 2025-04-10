<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
        }
    </style>
</head>
<body>
    <div>
        <div>
            <img src="{{ public_path('assets/image/sgc_logo.jpg') }}" alt="" width="230" style="margin-left: 230px">
        </div>
        <table border="1" width="100%">
            <tr>
                <th style=" padding: 10px 0 ; font-size: 20px; color: red;" colspan="3">TICKET REQUEST FORM</th>
            </tr>
            <tr>
                <td style="font-size: 14px; color: red;">Company / Branch : <span style="color: black;">{{ $report->company_name }}</span></td>
                <td></td>
                <td style="font-size: 14px; color: red;">Ticket No : <span style="color: black;">{{ $report->ticket_no }}</span></td>
            </tr>
            <tr>
                <td style="font-size: 14px; color: red;">Name : <span style="color: black;"> {{ $report->name }}</span></td>
                <td></td>
                <td style="font-size: 14px; color:red ;">Date Request : <span style="color: black; "> {{ Carbon\Carbon::parse($report->created_at)->format('M d, Y - H:i a') }}</span></td>
            </tr>
            <tr>
                <td style="font-size: 14px; color: red;">Employee No : <span  style="color: black;">{{ $report->emp_no }}</span></td>
                <td></td>
                <td style="font-size: 14px; color: red;">Dept : <span  style="color: black;">{{ $report->dept }}</span></td>
            </tr>
            <tr>
                <td style="padding: 15px;" colspan="3"></td>
            </tr>
            <tr>
                <td style="font-size: 14px; color: red; width: 35%;">Classification : <span  style="color: black;">{{ $report->classification }}</span></td>
                <td></td>
                <td style="font-size: 14px; color: red;">Urgent : <span  style="color: black;">{{ $report->urgent }}</span></td>
            </tr>
            <tr>
                <td style="font-size: 14px; color: red;">Reason :</td>
                <td style="font-size: 13px; padding: 5px;" colspan="2">{{ $report->reason }}</td>
            </tr>

            <tr>
                <th style="padding-top: 25px;" ><p style="border-top: 2px solid black; font-size: 12px;">Request Signature</p></th>
                <td></td>
                <th style="padding-top: 25px;"><p style="border-top: 2px solid black; font-size: 12px;">Immediate Head Signature</p></th>
            </tr>
        </table>
    </div>
</body>
</html>
