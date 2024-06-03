<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('id', 'DESC')->paginate(10);
        return view('welcome', compact('contacts'));
    }

    public function store(Request $request)
    {
        $validator = $this->validateContact($request);
        if ($validator->fails()) {
            return response()->json(['status' => 333, 'errors' => $validator->errors()]);
        }
        if (Contact::where(['nom' =>  ucwords(strtolower($request->nom)), 'prenom' => ucwords(strtolower($request->prenom))])->exists()) {
            if (!$request->has('doublon')) {
                return response()->json(['status' => 888, 'info' => 'Contact Exists!']);
            }
        }
        $this->createOrUpdateContact(new Contact(), $request);
        if ($request->has('doublon')) {
            return back();
        }
        return response()->json(['status' => true, 'success' => 'Contact created successfully!']);
    }

    public function show($id)
    {
        try {
            $contact = Contact::findOrFail($id);
            return response()->json($contact);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        $validator = $this->validateContact($request);
        if ($validator->fails()) {
            return response()->json(['status' => 333, 'errors' => $validator->errors()]);
        }

        $contact = Contact::findOrFail($request->id);

        $exQuery = Contact::where(['nom' =>  ucwords(strtolower($request->nom)), 'prenom' => ucwords(strtolower($request->prenom))]);
        if ($exQuery->count() >= 1 && ucwords(strtolower($request->nom)) != $contact->nom &&  ucwords(strtolower($request->prenom)) !=  $contact->prenom) {
            if (!$request->has('doublon')) {
                return response()->json(['status' => 888, 'info' => 'Contact Exists!']);
            }
        }

        $this->createOrUpdateContact($contact, $request);
        if ($request->has('doublon')) {
            return back();
        }
        return response()->json(['status' => true, 'success' => 'Contact updated successfully!']);
    }

    public function destroy($id)
    {
        try {
            $contact = Contact::findOrFail($id);
            $contact->delete();
            return response()->json(['success' => 'Contact deleted successfully!']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()]);
        }
    }

    public function sortContacts(Request $request)
    {
        $column = $request->input('column');
        $order = $request->input('order');

        $contacts = Contact::orderBy($column, $order)->get();
        return response()->json($contacts);
    }

    private function validateContact(Request $request)
    {
        return Validator::make($request->all(), [
            'nom' => 'required|regex:/^[a-zA-Z]+$/',
            'prenom' => 'required|regex:/^[a-zA-Z]+$/',
            'email' => 'required|email',
            'entreprise' => 'required|regex:/^[a-zA-Z0-9 ]+$/',
            'address' => 'required|string',
            'code_postal' => 'required|numeric',
            'ville' => 'required|string',
            'status' => 'required|string',
        ]);
    }

    private function createOrUpdateContact(Contact $contact, Request $request)
    {
        $contact->nom = $request->nom;
        $contact->prenom = $request->prenom;
        $contact->email = $request->email;
        $contact->entreprise = $request->entreprise;
        $contact->address = $request->address;
        $contact->code_postal = $request->code_postal;
        $contact->ville = $request->ville;
        $contact->status = $request->status;
        $contact->save();
    }
}
