<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการแจ้งซ่อม</title>
    <style>
        /* ปรับขนาดและระยะห่างพื้นฐาน */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #4CAF50;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        /* การจัดการตาราง */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #4CAF50;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table td button {
            background-color: #f44336;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 5px;
        }

        table td a {
            background-color: #FF9800;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-left: 5px;
            display: inline-block;
        }

        table td button:hover {
            background-color: #e53935;
        }

        table td a:hover {
            background-color: #e65100;
        }

        /* แจ้งข้อความ Success */
        .success-message {
            color: green;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-link:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>รายการแจ้งซ่อม</h1>

        <!-- แสดงข้อความ Success หากมีการอัปเดตหรือลบข้อมูล -->
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>ชื่อ</th>
                    <th>อีเมล</th>
                    <th>รายละเอียดปัญหา</th>
                    <th>วันที่แจ้ง</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->name }}</td>
                        <td>{{ $ticket->email }}</td>
                        <td>{{ $ticket->problem_description }}</td>
                        <td>{{ \Carbon\Carbon::parse($ticket->created_at)->format('d-m-Y H:i') }}</td>
                        <td>
                            <!-- ฟอร์มสำหรับลบ -->
                            <form action="{{ route('repair.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('คุณต้องการลบการแจ้งซ่อมนี้หรือไม่?');" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">ลบ</button>
                            </form>
                            <a href="{{ route('repair.edit', $ticket->id) }}">แก้ไข</a>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('repair.create') }}" class="back-link">กลับไปที่ฟอร์มแจ้งซ่อม</a>
    </div>

</body>
</html>
