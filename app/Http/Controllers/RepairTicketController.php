<?php

namespace App\Http\Controllers;

use App\Models\RepairTicket;
use Illuminate\Http\Request;

class RepairTicketController extends Controller
{
    // แสดงฟอร์มแจ้งซ่อม
    public function create()
    {
        return view('repair.create');
    }

    // บันทึกข้อมูลแจ้งซ่อม
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'problem_description' => 'required',
        ]);

        RepairTicket::create([
            'name' => $request->name,
            'email' => $request->email,
            'problem_description' => $request->problem_description,
        ]);

        return redirect()->route('repair.index');
    }

    // แสดงรายการแจ้งซ่อมทั้งหมด
    public function index()
    {
        $tickets = RepairTicket::all();
        return view('repair.index', compact('tickets'));
    }
     // ฟังก์ชันลบการแจ้งซ่อม
     public function destroy($id)
     {
         // ค้นหาการแจ้งซ่อมที่มี id ตรงกับที่ส่งมา
         $ticket = RepairTicket::findOrFail($id);
 
         // ลบการแจ้งซ่อม
         $ticket->delete();
 
         // รีไดเร็กต์กลับไปยังหน้าแสดงรายการ
         return redirect()->route('repair.index')->with('success', 'การแจ้งซ่อมถูกลบเรียบร้อยแล้ว');
     }
     public function edit($id)
     {
         // ค้นหาการแจ้งซ่อมที่มี id ตรงกับที่ส่งมา
         $ticket = RepairTicket::findOrFail($id);
         
         // ส่งข้อมูลการแจ้งซ่อมไปยังฟอร์ม
         return view('repair.edit', compact('ticket'));
     }
 
     // ฟังก์ชันบันทึกการแก้ไข
     public function update(Request $request, $id)
     {
         // ตรวจสอบข้อมูลที่รับมาจากฟอร์ม
         $validated = $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|max:255',
             'problem_description' => 'required|string|max:500',
         ]);
 
         // ค้นหาการแจ้งซ่อมที่มี id ตรงกับที่ส่งมา
         $ticket = RepairTicket::findOrFail($id);
 
         // อัปเดตข้อมูลการแจ้งซ่อม
         $ticket->update($validated);
 
         // รีไดเร็กต์กลับไปยังหน้าแสดงรายการ
         return redirect()->route('repair.index')->with('success', 'ข้อมูลการแจ้งซ่อมถูกแก้ไขเรียบร้อยแล้ว');
     }
}
