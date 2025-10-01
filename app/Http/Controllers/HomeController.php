<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models;
use App\Models\Certificates;
use App\Models\Contacts;
use App\Models\User;
use App\Models\Skills;
use App\Models\Organizations;
use App\Models\Educations;
use App\Models\Project;
use Livewire\Attributes\Validate;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::all();
        $certifs = Certificates::all();

        return view('welcome', compact('users', 'certifs'));
    }

    public function about()
    {
        $users = User::all();
        $skills = Skills::all();
        $eskuls = Organizations::all();
        $sekolah = Educations::all();
        $projects = project::all();

        return view('about', compact('users', 'skills', 'eskuls', 'sekolah', 'projects'));
    }
    public function contact()
    {
        $users = User::all();
        $contacts = Contacts::all();

        return view('contact', compact('users', 'contacts'));
    }
    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|min:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'body' => $request->message,
            ];

            Mail::send('emails.contact', $data, function ($message) use ($data) {
                $message->to('bangkitsann28@gmail.com') // Ganti dengan email kamu
                        ->subject($data['subject'])
                        ->replyTo($data['email'], $data['name']);
            });

            return response()->json([
                'success' => true,
                'message' => 'Pesan kamu berhasil terkirim! Saya akan segera membalas 😊'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengirim email: '.$e->getMessage()
            ], 500);
        }
    }
}
