<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

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
        // Pastikan hanya admin yang sudah login yang bisa masuk dashboard
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
        return view('admin.detail', compact('order'));
    }

    public function updateOrder(Request $request, $id)
    {
        $order = Booking::findOrFail($id);
        

        if ($order->status_barang == "belum diambil") {
            $order->status_barang = "PS Sudah Diambil";
        } elseif ($order->status_barang == "PS Sudah Diambil") {
            $order->status_barang = "PS Sudah Dikembalikan";
        }

        $order->save();

        return redirect()->route('admin.order.show', $id)->with('success', 'Status order berhasil diperbarui');
    }
}
