<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Qytetet;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class QytetetController extends Controller
{
    // QytetetController.php
    public function index()
    {
        $qytetet = Qytetet::all();
        return view('qytetet.qytetet', ['qytetet' => $qytetet]);
    }

    public function show($id)
    {
        $qytetet = Qytetet::findOrFail($id);
        return view('qytetet.detaje', ['qytetet' => $qytetet]);
    }



    public function edit($id)
    {
        $qytet = Qytetet::findOrFail($id);
        return view('qytetet.edit', ['qytet' => $qytet]);
    }
    public function update(Request $request, $id)
    {
        $qytet = Qytetet::findOrFail($id);
        $qytet->emri = $request->input('emri');
        $qytet->save();

        return redirect()->route('qytetet.index')
        ->with('success', 'Qyteti u përditësua me sukses.');
    }

    public function create()
    {
        return view('qytetet.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'emri' => 'required|string|max:255|unique:qytetet',
        ]);

        Qytetet::create([
            'emri' => $validated['emri'],
        ]);

        return redirect()->route('qytetet.index')
        ->with('success', 'Qyteti u shtua me sukses.');
    }
    public function delete($id)
    {
        $qytetet = Qytetet::findOrfail($id);
        $qytetet->delete();
        return $qytetet;
    }

    public function destroy($id)
    {
        $qytet = Qytetet::findOrFail($id);
        $qytet->delete();

        return redirect()->route('qytetet.index')
        ->with('success', 'Qytet deleted successfully.');
    }
}