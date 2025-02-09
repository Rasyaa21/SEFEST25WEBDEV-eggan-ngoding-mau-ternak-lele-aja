<?php
namespace App\Livewire;

use Livewire\Component;
use App\Repositories\RekomChatRepository;
use Illuminate\Support\Facades\Log;

class RecommendationLivewire extends Component
{
    public $fish;
    public $length;
    public $width;
    public $height;
    public $management;
    public $showRecommendation = false;
    public $recommendation;
    public $temperature;
    public $fishCount;
    public $oxygenLevel;
    public $phLevel;
    public $salinity;
    public $managementRecommendation;

    protected $rules = [
        'fish' => 'required',
        'length' => 'required|numeric',
        'width' => 'required|numeric',
        'height' => 'required|numeric',
        'management' => 'required',
    ];

    protected $messages = [
        'fish.required' => 'Jenis ikan harus diisi.',
        'length.required' => 'Panjang harus diisi.',
        'width.required' => 'Lebar harus diisi.',
        'height.required' => 'Tinggi harus diisi.',
        'management.required' => 'Metode pengelolaan harus diisi.',
    ];

    protected RekomChatRepository $rekomRepo;

    public function __construct()
    {
        $this->rekomRepo = new RekomChatRepository();
    }

    private function parseAIResponse($response)
    {
        $metrics = [
            'temperature' => null,
            'fishCount' => null,
            'oxygenLevel' => null,
            'phLevel' => null,
            'salinity' => null,
            'managementRecommendation' => '',
        ];

        $lines = explode("\n", $response);
        foreach ($lines as $line) {
            if (preg_match('/(?:suhu|temperatur).*?(\d+(?:\.\d+)?)/i', $line, $matches)) {
                $metrics['temperature'] = $matches[1];
            }
            if (preg_match('/(?:jumlah ikan|tebar).*?(\d+)/i', $line, $matches)) {
                $metrics['fishCount'] = $matches[1];
            }
            if (preg_match('/(?:oksigen|oxygen).*?(\d+(?:\.\d+)?)/i', $line, $matches)) {
                $metrics['oxygenLevel'] = $matches[1];
            }
            if (preg_match('/(?:ph|keasaman).*?(\d+(?:\.\d+)?)/i', $line, $matches)) {
                $metrics['phLevel'] = $matches[1];
            }
            if (preg_match('/(?:salinitas|kadar garam).*?(\d+(?:\.\d+)?)/i', $line, $matches)) {
                $metrics['salinity'] = $matches[1];
            }
            if (preg_match('/(?:rekomendasi|saran|pengelolaan):?\s*(.*)/i', $line, $matches)) {
                $metrics['managementRecommendation'] = trim($matches[1]);
            }
        }
        return $metrics;
    }

    public function submit()
    {
        $this->validate();
        try {
            $response = $this->rekomRepo->recommendation([
                'fish' => $this->fish,
                'length' => $this->length,
                'width' => $this->width,
                'height' => $this->height,
                'management' => $this->management,
            ]);
            $this->showRecommendation = true;

            $metrics = $this->parseAIResponse($response);
            $this->temperature = $metrics['temperature'] ?? '-';
            $this->fishCount = $metrics['fishCount'] ?? '-';
            $this->oxygenLevel = $metrics['oxygenLevel'] ?? '-';
            $this->phLevel = $metrics['phLevel'] ?? '-';
            $this->salinity = $metrics['salinity'] ?? '-';
            $this->recommendation = $metrics['managementRecommendation'];
            Log::info("berhasil");
        } catch (\Exception $e) {
            Log::error('Error processing recommendation: ' . $e->getMessage());
            session()->flash('error', 'Terjadi kesalahan saat memproses rekomendasi.');
        }
    }

    public function render()
    {
        return view('livewire.recommendation-livewire');
    }
}
