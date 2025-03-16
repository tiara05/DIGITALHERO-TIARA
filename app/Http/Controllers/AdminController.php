<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\PlayStation;

class AdminController extends Controller
{
    public function showLogin()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.index');
        }
        return view('admin.login');
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // Simpan session untuk menandakan admin sudah login
            session(['admin_logged_in' => true]);

            return redirect()->route('admin.index');
        }

        return back()->withErrors(['email' => 'Login gagal, periksa kembali email & password.']);
    }

    public function dashboard()
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login.form')->withErrors(['msg' => 'Silakan login terlebih dahulu.']);
        }

        return view('admin.index');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login.form'); 
    }

    public function search(Request $request)
    {
        $order_id = $request->input('order_id');
        $orders = Booking::where('id', $order_id)->get();

        return view('admin.index', compact('orders'));
    }

    public function showOrder($id)
    {
        $order = Booking::findOrFail($id);
        $availableSlots = PlayStation::where('status', 'tersedia')
        ->where('jenis', $order->rental_type) // Filter berdasarkan jenis PS yang dipilih user
        ->get();
        return view('admin.detail', compact('order', 'availableSlots'));
    }


    public function updateOrder(Request $request, $id)
    {
        $order = Booking::findOrFail($id);
        
        if ($request->status_barang == "PS Sudah Diambil") {
            // Validasi slot PS yang dipilih
            $request->validate([
                'kode_ps' => 'required|exists:playstations,id',
            ]);

            // Update status PS menjadi dipinjam
            $playstation = PlayStation::findOrFail($request->kode_ps);
            $playstation->status = 'dipinjam';
            $playstation->save();

            // Simpan status peminjaman
            $order->status_barang = "PS Sudah Diambil";
            $order->kode_ps = $playstation->slot;
            $order->save();


        } elseif ($request->status_barang == "PS Sudah Dikembalikan") {
            // Kembalikan PS ke status tersedia
            PlayStation::where('slot', $order->kode_ps)->update(['status' => 'tersedia']);

            // Update status order
            $order->status_barang = "PS Sudah Dikembalikan";
            $order->save();
        }

        return redirect()->back()->with('success', 'Status berhasil diperbarui');
    }

}
