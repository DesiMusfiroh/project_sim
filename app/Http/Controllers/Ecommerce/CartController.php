<?php
namespace App\Http\Controllers\Ecommerce;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\University;
use App\Faculty;
use App\Prody;
use App\Customer;
use App\Order;
use App\OrderDetail;
use Illuminate\Support\Str;
use DB;
use Auth;
class CartController extends Controller
{
    private function getCarts()
    {
        $carts = json_decode(request()->cookie('dw-carts'), true);
        $carts = $carts != '' ? $carts:[];
        return $carts;
    }
    public function addToCart(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer'
        ]);
        $carts = $this->getCarts();
        if ($carts && array_key_exists($request->product_id, $carts)) {
            $carts[$request->product_id]['qty'] += $request->qty;
        } else {
            $product = Product::find($request->product_id);
            $carts[$request->product_id] = [
                'qty' => $request->qty,
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'product_image' => $product->image
            ];
        }
        $cookie = cookie('dw-carts', json_encode($carts), 2880);
        return redirect('cart')->cookie($cookie);
    }
    public function listCart()
    {
        $carts = $this->getCarts();
        $subtotal = collect($carts)->sum(function($q) {
            return $q['qty'] * $q['product_price'];
        });
        return view('ecommerce.cart', compact('carts', 'subtotal'));
    }
    public function updateCart(Request $request)
    {
        $carts = $this->getCarts();
        foreach ($request->product_id as $key => $row) {
            if ($request->qty[$key] == 0) {
                unset($carts[$row]);
            } else {
                $carts[$row]['qty'] = $request->qty[$key];
            }
        }
        $cookie = cookie('dw-carts', json_encode($carts), 2880);
        return redirect()->back()->cookie($cookie);
    }
    public function checkout()
    {
        $universities = University::orderBy('created_at', 'DESC')->get();
        $carts = $this->getCarts();
        $subtotal = collect($carts)->sum(function($q) {
            return $q['qty'] * $q['product_price'];
        });
        //$user_id = Auth::user()->value('id');
        return view('ecommerce.checkout', compact('universities', 'carts', 'subtotal'));
    }
    public function getFaculty()
    {
        $faculties = Faculty::where('university_id', request()->university_id)->get();
        return response()->json(['status' => 'success', 'data' => $faculties]);
    }
    public function getPrody()
    {
        $prodies = Prody::where('faculty_id', request()->faculty_id)->get();
        return response()->json(['status' => 'success', 'data' => $prodies]);
    }
    public function processCheckout(Request $request)
    {
        $this->validate($request, [
            'customer_name' => 'required|string|max:100',
            'customer_phone' => 'required',
            'email' => 'required|email',
            'customer_address' => 'required|string',
            'prody_id' => 'required',
            // 'university_id' => 'required|exists:universities,id',
            // 'faculty_id' => 'required|exists:faculties,id',
            // 'prody_id' => 'required|exists:prodies,id'
        ]);
        DB::beginTransaction();
        try {
            $customer = Auth::user()->where('email', $request->email)->first();
            if (!auth()->check() && $customer) {
                return redirect()->back()->with(['error' => 'Silahkan Login Terlebih Dahulu']);
            }
            $carts = $this->getCarts();
            $subtotal = collect($carts)->sum(function($q) {
                return $q['qty'] * $q['product_price'];
            });
            // $customer = Customer::create([
            //     'name' => $request->customer_name,
            //     'email' => $request->email,
            //     'phone_number' => $request->customer_phone,
            //     'address' => $request->customer_address,
            //     'prody_id' => $request->prody_id,
            //     'status' => false
            // ]);
            $order = Order::create([
                'invoice' => Str::random(4) . '-' . time(),
                'customer_id' => $customer->id,
                'customer_name' => $request->customer_name,
                'customer_phone' => $request->customer_phone,
                'customer_address' => $request->customer_address,
                'prody_id' => $request->prody_id,
                'subtotal' => $subtotal
            ]);
            foreach ($carts as $row) {
                $product = Product::find($row['product_id']);
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $row['product_id'],
                    'price' => $row['product_price'],
                    'qty' => $row['qty'],
                    //'weight' => $product->weight
                ]);
            }
            DB::commit();
            $carts = [];
            $cookie = cookie('dw-carts', json_encode($carts), 2880);
            return redirect(route('front.finish_checkout', $order->invoice))->cookie($cookie);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function checkoutFinish($invoice)
    {
        $order = Order::with(['prody.faculty'])->where('invoice', $invoice)->first();
        return view('ecommerce.checkout_finish', compact('order'));
    }
}