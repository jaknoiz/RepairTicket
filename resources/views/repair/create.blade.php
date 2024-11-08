<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แจ้งซ่อม</title>
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

        /* การจัดการฟอร์ม */
        .form-container {
            width: 50%;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

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
    </style>
</head>
<body>

    <h1>แจ้งซ่อม</h1>

    <div class="form-container">
        <form action="{{ route('repair.store') }}" method="POST">
            @csrf

            <label for="name">ชื่อ:</label>
            <input type="text" name="name" id="name" required>

            <label for="email">อีเมล:</label>
            <input type="email" name="email" id="email" required>

            <label for="problem_description">รายละเอียดปัญหา:</label>
            <textarea name="problem_description" id="problem_description" required></textarea>

            <button type="submit">ส่งข้อมูล</button>
        </form>
    </div>

    <br>
    <a href="{{ route('repair.index') }}" class="back-link">ดูรายการแจ้งซ่อมทั้งหมด</a>

</body>
</html>
