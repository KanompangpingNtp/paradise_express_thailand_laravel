<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

class LineMessageController extends Controller
{
    public function send(Request $request)
{
    try {
        // ข้อมูลจากฟอร์ม
        $tourName = $request->tour_name;
        $tourDate = $request->tour_date;
        $adults = $request->adults;
        $children = $request->children;
        $fullname = $request->fullname;
        $email = $request->email;
        $phone = $request->phone;
        $bookingId = 'BK' . now()->format('YmdHis');
        $sentAt = now()->format('Y-m-d H:i:s');

        $message = "
📥 Reservation Submitted
🆔 Booking ID: {$bookingId}
🕒 Sent At: {$sentAt}
📌 Booking: {$tourName}
📅 Date: {$tourDate}
👨 Adults: {$adults} | 👶 Children: {$children}
🙍 Name: {$fullname}
✉️ Email: {$email}
📞 Phone: {$phone}
        ";

        $token = env('LINE_CHANNEL_ACCESS_TOKEN');
        $userId = env('LINE_USER_ID');

        $response = Http::withToken($token)->post('https://api.line.me/v2/bot/message/push', [
            'to' => $userId,
            'messages' => [
                [
                    'type' => 'text',
                    'text' => $message,
                ]
            ]
        ]);

        if ($response->successful()) {
            session()->flash('line_status', [
                'type' => 'success',
                'message' => 'Successfully received!',
                'text' =>'We will contact you soon.',
            ]);
        } else {
            session()->flash('line_status', [
                'type' => 'error',
                'message' => 'Booking failed.',
                'text' =>'Please try again later or contact support.',
            ]);
        }
    } catch (\Exception $e) {
        session()->flash('line_status', [
            'type' => 'error',
            'message' => 'An error occurred while processing your booking.',
            'text' =>' Please try again later. (' . $e->getMessage() . ')',
        ]);
    }

    return redirect()->back();
}

}
