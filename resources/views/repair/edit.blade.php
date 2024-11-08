<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขการแจ้งซ่อม</title>
    <style>
        /* การตั้งค่าพื้นฐานสำหรับหน้าฟอร์ม */
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

        .form-container {
            width: 50%;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        /* ปรับสไตล์ของ label และช่องกรอกข้อมูล */
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            height: 150px;
            resize: vertical;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        /* การจัดการลิงก์กลับ */
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #FF9800;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-link:hover {
            background-color: #e65100;
        }

        /* เพิ่มการจัดการข้อความสำเร็จ */
        .success-message {
            color: green;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <h1>แก้ไขการแจ้งซ่อม</h1>

    <!-- แสดงข้อความเมื่อการอัปเดตสำเร็จ -->
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <div class="form-container">
        <!-- ฟอร์มแก้ไขข้อมูลการแจ้งซ่อม -->
        <form action="{{ route('repair.update', $ticket->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="name">ชื่อ:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $ticket->name) }}" required>
            </div>

            <div>
                <label for="email">อีเมล:</label>
                <input type="email" name="email" id="email" value="{{ old('email', $ticket->email) }}" required>
            </div>

            <div>
                <label for="problem_description">รายละเอียดปัญหา:</label>
                <textarea name="problem_description" id="problem_description" required>{{ old('problem_description', $ticket->problem_description) }}</textarea>
            </div>

            <button type="submit">อัปเดตข้อมูล</button>
        </form>
    </div>

    <br>
    <a href="{{ route('repair.index') }}" class="back-link">กลับไปที่รายการแจ้งซ่อม</a>

</body>
</html>
