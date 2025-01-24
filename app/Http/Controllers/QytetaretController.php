<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Qytetaret;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class QytetaretController extends Controller
{
    public function index()
    {
        $qytetaret = Qytetaret::all();
        return view('qytetaret.qytetaret', ['qytetaret' => $qytetaret]);
    }

    public function show($id)
    {
        $qytetar = Qytetaret::findOrFail($id);
        return view('qytetaret.detaje', ['qytetar' => $qytetar]);
    }

    public function edit($id)
    {
        $qytetar = Qytetaret::findOrFail($id);
        return view('qytetaret.edit', ['qytetar' => $qytetar]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(rules: [
            'emri' => 'required|string|max:255',
            'mbiemri' => 'required|string|max:255',
            'gjinia' => 'required|string|in:M,F',
            'viti_i_lindjes' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        $qytetar = Qytetaret::findOrFail($id);
        $qytetar->update([
            'emri' => $request->emri,
            'mbiemri' => $request->mbiemri,
            'gjinia' => $request->gjinia,
            'viti_i_lindjes' => $request->viti_i_lindjes,
        ]);

        return redirect()->route('qytetaret.index');
    }

    // Funksioni create per te shfaqur formen e krijimit
    public function create()
    {
        return view('qytetaret.create');
    }

    // Funksioni store per te ruajtur nje qytetar te ri
    public function store(Request $request)
    {
        $request->validate([
            'emri' => 'required|string|max:255',
            'mbiemri' => 'required|string|max:255',
            'gjinia' => 'required|string|in:M,F',
            'viti_i_lindjes' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        Qytetaret::create([
            'emri' => $request->emri,
            'mbiemri' => $request->mbiemri,
            'gjinia' => $request->gjinia,
            'viti_i_lindjes' => $request->viti_i_lindjes,
        ]);

        return redirect()->route('qytetaret.index')->with('success', 'Qytetari u shtua me sukses.');
    }

    // Funksioni delete per te fshire nje rekord nga databaza (vetem kthimi i objektit)
    public function delete($id)
    {
        $qytetar = Qytetaret::findOrFail($id);
        $qytetar->delete();

        return $qytetar;
    }

    // Funksioni destroy per fshirje dhe ridrejtim
    public function destroy($id)
    {
        $qytetar = Qytetaret::findOrFail($id);
        $qytetar->delete();

        return redirect()->route('qytetaret.index')->with('success', 'Qytetari u fshi me sukses.');
    }
}
