<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Mostra la pagina "About"
    public function about()
    {
        return view('pages.about');
    }

    // Mostra la pagina "Contatti"
    public function contact()
    {
        return view('pages.contact');
    }

    // Gestisce l'invio del form contatti
    public function sendContact(Request $request)
    {
        // ✅ Validazione base dei dati
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|string|max:1000',
        ]);

        // In un progetto reale qui potresti:
        // - inviare una mail
        // - salvare il messaggio nel database
        // - notificare un admin, ecc.

        // ✅ Messaggio di conferma (visibile nella vista con session('success'))
        return redirect()
            ->route('contact')
            ->with('success', 'Il tuo messaggio è stato inviato con successo! 🎉');
    }
}
