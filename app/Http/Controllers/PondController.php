<?php

namespace App\Http\Controllers;

use App\Http\Requests\PantauKolamRequest;
use App\Http\Requests\UpdatePondRequest;
use App\Interfaces\PondRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PondController extends Controller
{
    private PondRepositoryInterface $pondRepository;

    public function __construct(PondRepositoryInterface $pondRepository) {
        $this->pondRepository = $pondRepository;
    }

    public function index(){
        $ponds = $this->pondRepository->getUserPond();
        return view('pages.admin.pantau-kolam', compact('ponds'));
    }

    public function store(PantauKolamRequest $req) {
        $data = $req->validated();
        $res = $this->pondRepository->addPond($data);
        return redirect()->route('pantau.kolam.show', [
            'id' => $res['PondRecommendation']->pond_id
        ])->with([
            'data' => $data,
            'res' => $res
        ]);
    }

    public function show($id)
    {
        $result = $this->pondRepository->getPondById($id);
        return view('pages.admin.hasil-pantau', [
            'data' => $result['data'],
            'res' => $result['res']
        ]);
    }

    public function update(UpdatePondRequest $req, $id){
        $data = $req->validated();
        $res = $this->pondRepository->editPond($data, $id);
        return redirect()->route('pantau.kolam.show', [
            'id' => $id
        ])->with([
            'data' => $data,
            'res' => $res
        ]);
    }

    public function destroy($id)
    {
        $this->pondRepository->deletePond($id);
        return redirect()->route('pantau.kolam')
            ->with('success', 'Kolam Berhasil Dihapus');
    }
}
