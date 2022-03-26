<?php
/*
 * Created by Beatific Angel
 *  20222/3/25 9.00am
 * */
namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TicketController extends Controller
{

    public function index()
    {
        $tickets = Ticket::paginate(10);

        return view('tickets.index', compact('tickets'));
    }


    public function create()
    {
        $users = User::all();
        return view('tickets.create', compact('users'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'user_id' => 'required',
            'priority' => 'required',
            'message' => 'required'
        ]);

        $ticket = new Ticket([
            'title' => $request->input('title'),
            'user_id' => $request->input('user_id'),
            'ticket_id' => strtoupper(Str::random(10)),
            'priority' => $request->input('priority'),
            'message' => $request->input('message'),
            'status' => "Open"
        ]);

        $ticket->save();

        return redirect()->back()->with("success", "A ticket with ID: #$ticket->ticket_id has been opened.");
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'user_id' => 'required',
            'priority' => 'required',
            'message' => 'required'
        ]);
        $ticket = Ticket::where('ticket_id', $request->ticket_id)->firstOrFail();

        $ticket->title = $request->title;
        $ticket->user_id = $request->user_id;
        $ticket->priority = $request->priority;
        $ticket->message = $request->message;
        $ticket->save();

        return redirect()->back()->with("success", "A ticket with ID: #$ticket->ticket_id has been updated.");
    }


    public function Edit($ticket_id)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();

        return view('tickets.edit', compact('ticket'));
    }


    public function close($ticket_id)
    {

        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
        $ticket->status = "Closed";

        $ticket->save();

        return redirect()->back()->with("success", "The ticket has been closed.");
    }
    public function delete($id)
    {
        $ticket_query = "delete from tickets where id = '$id'";
        $ticket_query_res = DB::select($ticket_query);
        return redirect()->back()->with("success", "The Ticket has been deleted.");
    }
    public function print_ticket($id)
    {

        return view('tickets.print', compact('ticket'));
    }
}
