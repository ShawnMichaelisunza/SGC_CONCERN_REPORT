<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body{
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
    }
</style>
<body>

    <div>
        <div>
            <table border="1" style="width:100%">
            @foreach ( $maintenances as $maintenance)
                <tr>
                    <th style=" padding: 10px 0 ; font-size: 20px; color: red;" colspan="3">SGC TICKET REQUEST FORM</th>
                </tr>
                <tr>
                    <td style="font-size: 14px; color: red;">Company / Branch : <span style="color: black;">{{ $report->user_cn }}</span></td>
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
                    <td style="font-size: 14px; color: red;">Dept : <span  style="color: black;">{{ $report->user_dept }}</span></td>
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
                    <th style=" padding: 10px 0 ; font-size: 20px; color: red;" colspan="3">SGC TICKET COMPLETED FORM</th>
                </tr>
                <tr>
                    <td style="font-size: 15px; color: red; padding-top: 5px;">Name : <span style="color: black;">{{ $maintenance->user->name }}</span></td>
                    <td></td>
                    <td style="font-size: 15px; color: red; padding-top: 5px;">Date : <span style="color: black;">{{ Carbon\Carbon::parse($maintenance->created_at)->format('M d, Y')}}</span></td>
                </tr>
                <tr>
                    <td style="font-size: 14px; color: red; ">Company / Branch : <span style="color: black;">{{ $maintenance->user->company_name }}</span></td>
                    <td></td>
                    <td style="font-size: 14px; color: red; ">Dept : <span style="color: black;">{{ $maintenance->user->dept }}</span></td>
                </tr>
                <tr>
                    <td style="font-size: 13px; color: red;  ">Date Started : <span  style="color: black;">{{ Carbon\Carbon::parse($maintenance->date_start)->format('M d, Y') }}</span></td>
                    <td></td>
                    <td style="font-size: 13px; color: red; ">Date End : <span  style="color: black;">{{ Carbon\Carbon::parse($maintenance->date_end)->format('M d, Y') }}</span></td>
                </tr>
                <tr>
                    <td style="font-size: 13px; color: red;  ">Ticket No :</td>
                    <td style="text-align: center; padding: 5px; " colspan="2"><span  style="color: black;">{{ $report->ticket_no }}</span></td>
                </tr>
                <tr>
                    <td style="font-size: 14px; color: red; ">Action :</td>
                    <td style="font-size: 13px; padding: 5px; " colspan="2">{{ $maintenance->action }}</td>
                </tr>
                <tr>
                    <td style="font-size: 14px; color: red; ">Materials :</td>
                    <td style="font-size: 13px; padding: 5px;" colspan="2">{{ $maintenance->materials }}</td>
                </tr>
                <tr>
                    <td style="font-size: 16px; color: red;">Before :</td>
                    <td style="padding: 5px;" colspan="2"><img src="{{ public_path($maintenance->img_before) }}" alt="" width="400" height="150" height="170"></td>
                </tr>
                <tr>
                    <td style="font-size: 16px; color: red;">After :</td>
                    <td style=" padding: 5px; " colspan="2"><img src="{{ public_path($maintenance->img_after) }}" alt="" width="400" height="150" height="170"></td>
                </tr>

                @endforeach

                <tr>
                    <th style="padding-top: 25px;" ><p style="border-top: 2px solid black; font-size: 12px;">Signature</p></th>
                    <td></td>
                    <th style="padding-top: 25px;"><p style="border-top: 2px solid black; font-size: 12px;">Immediate Head Signature</p></th>
                </tr>

            </table>

        </div>
    </div>

</body>
</html>
