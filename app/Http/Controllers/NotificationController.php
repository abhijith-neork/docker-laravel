<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Role;
use App\Models\User;
use App\Models\NotificationRecipient;
Use Mail;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Mail\UserNotificationMail; 

class NotificationController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.notifications.index', compact('users'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => [
                'required',
                'min:3',
                'max:60',
            ],
            'description' => [
                'required',
            ],
            'recipient_type' => 'required',

        ]);

        // try {
            $input = $request->only(['title', 'description', 'recipient_type']);
            $input['date'] = $this->date_format(now());
            $input['created_by'] = Auth::user()->id;
            $recipients = $request->recipient;
            if ($input['recipient_type'] == 'users') {
                $recipient_array = User::whereIn('id', $recipients)->get();

            } elseif ($input['recipient_type'] == 'roles') {
                $recipient_array = User::with('role')
                ->whereHas('role', function ($query) use ($recipients) {
                    $query->whereIn('id', $recipients);
                })
                ->get();
            } else {
                $recipient_array = User::get();
            }

            $notification_id = Notification::create($input)->id;
            if($notification_id){


                foreach($recipient_array as $user){
                    NotificationRecipient::create([
                        'notification_id'=>$notification_id,
                        'user_id'=>$user->id
                    ]);
                    $email=$user->email;
                    $mailData = [
                        'subject' => $input['title'],
                        'content' => $input['description'],
                    ];
                
                    // Send the email using the Mail facade
                    Mail::to($email)->send(new UserNotificationMail($mailData));

                }

            }

        // } catch (\Exception $e) {

        //     DB::rollback();

        //     return redirect()->route('notifications')->with('error', 'Something went wrong.');

        // }

        return redirect()->route('notifications')->with('success', 'New Notification successfully added.');
    }

    public function date_format($date = '')
    {
        return Carbon::parse($date)->format('Y-m-d ');
    }

    public function destroy(Request $request)
    {

        try {
            $id = Crypt::decrypt($request->notification_id);

            $notification = Notification::find($id);
            $notification->delete();
        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->route('notifications')->with('error', 'Something went wrong.');

        }

        return redirect()->route('notifications')->with('success', 'Notification successfully deleted.');

    }

    public function get_notifications(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length");

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        if (empty($columnIndex_arr)) {
            $columnName = "id";
            $columnSortOrder = "desc";
        } else {
            // Column index
            $columnIndex = $columnIndex_arr[0]['column'];
            $columnName = $columnName_arr[$columnIndex]['data']; // Column name
            $columnSortOrder = $order_arr[0]['dir'];
        }
        if ($search_arr['value'] != '') {
            $_SESSION['searchValNotification'] = $search_arr['value'];
        } else if (isset($_SESSION['searchValMainCat'])) {
            $search_arr['value'] = $_SESSION['searchValNotification'];
        }
        $searchValue = $search_arr['value']; // Search value
        $status = '';

        $notification = new Notification;
        // Total records
        $totalRecords = $notification->get_notification_count();
        $totalRecordswithFilter = $notification->get_notification_count($searchValue, $status);

        // Fetch records
        $records = $notification->get_notification_records($columnName, $columnSortOrder, $searchValue, $start, $rowperpage, $status);

        $data_arr = array();
        foreach ($records as $record) {
            $date = $record->date;
            $title = $record->title;
            $desc = $record->description;

            $data_arr[] = array(
                "date" => $date,
                "title" => $title,
                "description" => $desc,
                'action' => view('admin/notifications/actions', compact('record'))->render(),

            );
        }
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr,
        );

        return response()->json($response);
    }

    public function recipientDetails(Request $request)
    {
        try {
            $type = $request->type;
            $data = '';
            if ($type == 'users') {
                $data = User::all();
            } elseif ($type == 'roles') {
                $data = Role::all();
            }

            return response()->json([
                'success' => true,
                'data' => $data,

            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred',
            ], 500);
        }
    }

}
