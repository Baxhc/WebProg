<?php

namespace App\Http\Controllers;

use App\Models\Tours;
use App\Models\tour_guides;
use App\Models\Regions;
use App\Models\Tour_Bookings;
use App\Models\User;
use Illuminate\Http\Request;
use PhpOption\None;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    //
    public function index(){
        return view('home');
    }

    public function tour(){
        // $tour = Tours::all();
        // $tour = Tours::Paginate(3);
        // $tour = Tours::with('tour_guides')->get();
        $tour = Tours::with('tour_guides')->paginate(3);
        return view('tour', ['tour' => $tour]);
        // return view('tour', compact("tour"));
    }

    public function aboutus(){
        return view('aboutus');
    }

    public function profile() {
        $customerId = auth()->id(); // Get logged-in user ID
        $profile = User::with('tour_bookings.tours')->find($customerId);
    
        if (!$profile) {
            return redirect()->route('home')->with('error', 'Customer not found.');
        }
    
        return view('profile', compact('profile'));
    }

    // public function profile($customerId){
    //     // $profile = Tour_Bookings::with(['tours', 'customers'])
    //     // ->whereHas('customers', function($query){
    //     //     $query->where('id', 1);
    //     // })->get();
    //     // $profile = DB::table('tour_bookings')
    //     // ->join('customers', 'customers.id', '=', 'tour_bookings.customer_id')
    //     // ->where('customers_id', 1)
    //     // ->select('tour_bookings*', 'customers.*');
    //     $profile = User::with('tour_bookings.tours')->find($customerId);
    //     if(!$profile){
    //         return redirect()->route('home')->with('error', 'Customer not found.');
    //     }
    //     return view('profile', ['profile' => $profile]);
    // }

    // public function booknow($tourId){
    //     $tour = Tours::findOrFail($tourId); // Find the tour by ID
    //     return view('booknow', compact('tour'));
    // }

    public function showTourGuides(){
        $tour_guides = tour_guides::all();
        return view('tour_guides.index', compact('tour_guides'));
    }

    public function tourDetails($id){
        // $tour = Tours::find($id);
        $tour = Tours::with(['tour_guides', 'region'])->find($id);
        return view("tourDetails", ['tour'=>$tour]);
    }

    public function bookTour(Request $request, $id){
        // $validatedData = $request->validate([
        //     'quantity' => 'required|integer|min:1',
        //     'total' => 'required|numeric|min:1',
        // ]);

        // // $quantity = $validatedData['quantity'];
        // $total = $validatedData['total'];

        // Tour_Bookings::create([
        //     'user_id' => auth()->id(),
        //     'tour_id' => $id,
        //     'total_price' => $total,
        // ]);

        // $tour_booking = Tour_Bookings::find($id);

        $tour = Tours::find($id);
        $booking = new Tour_Bookings();
        $booking->customer_id = 1;
        $booking->tour_id = $tour->id;
        $booking->total_price = $request->total;
        $booking->quantity = $request->quantity;
        $booking->save();

        return view("bookTour", ['booking'=>$booking]);
    }

    public function showSuccess()
    {
        return view('paymentSuccess');
    }

    public function refund($booking_id, $tour_id, $price, $customer_id){
        // Retrieve the profile and tour using the IDs
        $tour = Tours::with(['tour_guides'])->find($tour_id);

        return view('refund', compact('booking_id', 'tour', 'price', 'customer_id'));
    }

    public function destroy($booking_id, $customer_id){
        $booking = Tour_Bookings::findOrFail($booking_id);
        $booking->delete();

        return redirect()->route('profile', ['id' => $customer_id])->with('success', 'Booking refunded successfully.');
    }
}
