<?php 

namespace App\Repositories;

use App\Interfaces\PondRepositoryInterface;
use App\Models\Pond;
use App\Models\PondRecommendation;
use Illuminate\Support\Facades\Log;
use OpenAI\Laravel\Facades\OpenAI;

class PondRepository implements PondRepositoryInterface{
    public function getUserPond(){
        $user = request()->session()->get('user');
        $pond = Pond::where('user_id', $user->id)->get();
        return $pond;
    }
    public function addPond($req)
    {
        $user = request()->session()->get('user');
        $pond = Pond::create([
            "user_id" => $user->id,
            "pond_name" => $req['pond_name'],
            "fish_type" => $req['fish_type'],
            "management_type" => $req['management_type'],
            "water_temp" => $req["water_temp"],
            "ph_level" => $req["ph_level"],
            "dissolved_oxygen" => $req["dissolved_oxygen"],
            "salinity" => $req["salinity"],
            "measurement_date" => now(),
            "length" => $req["length"],
            "width" => $req["width"],
            "height" => $req["height"]
        ]);

        $prompt = trim("
            Kamu adalah seorang peternak ikan profesional dengan pengalaman bertahun-tahun dalam budidaya ikan. 
            Tugasmu adalah memantau kondisi kolam dan memberikan rekomendasi nilai parameter ideal untuk ikan jenis {$req['fish_type']}.
            HARUS memberikan angka rekomendasi yang sesuai untuk jenis ikan ini, bukan menulis ulang data yang diberikan.
            
            Format output HARUS seperti berikut:
            1. Suhu: [angka] °C (Rekomendasi suhu ideal untuk ikan jenis {$req['fish_type']})
            2. pH Air: [angka] (Rekomendasi pH ideal)
            3. Salinitas: [angka] ppt (Rekomendasi salinitas ideal)
            4. Kadar Oksigen: [angka] mg/L (Rekomendasi kadar oksigen ideal)
            Kondisi: good/bad (Penilaian kondisi kolam saat ini berdasarkan data)
            Rekomendasi: [Berikan saran spesifik tentang perubahan yang perlu dilakukan untuk mencapai kondisi ideal budidaya ikan jenis {$req['fish_type']}] jelaskan secara rinci dan detail berikan step stepnya 

            Data kondisi kolam saat ini:
            - Suhu: {$req['water_temp']} °C
            - pH: {$req['ph_level']}
            - Salinitas: {$req['salinity']} ppt
            - oksigen: {$req['dissolved_oxygen']} mg/L
            
            Kolam memiliki ukuran {$req['length']} meter (panjang) x {$req['width']} meter (lebar) x {$req['height']} meter (tinggi).
            Sistem pengelolaan kolam yang digunakan adalah {$req['management_type']}.
            
            Harap berikan output hanya dalam format di atas tanpa menambahkan penjelasan lain.
        ");

        $prompt = preg_replace('/\s+/', ' ', $prompt);

        $response = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
            ['role' => 'user', 'content' => $prompt]
            ]
        ]);
        
        $responseContent = trim($response['choices'][0]['message']['content']);
        Log::info($responseContent);

        $lines = explode("\n", $responseContent);
        $lines = array_map('trim', array_filter($lines));
        
        $res = [
            'recommended_temp' => '',
            'recommended_ph' => '',
            'recommended_salinity' => '',
            'recommended_oxygen' => '',
            'pond_status' => '',
            'recommendation_notes' => ''
        ];
        
        foreach ($lines as $line) {
            if (preg_match('/1\.\s*Suhu:\s*([\d.]+)\s*°C/', $line, $matches)) {
                $res['recommended_temp'] = floatval($matches[1]);
            } elseif (preg_match('/2\.\s*pH Air:\s*([\d.]+)\s*\(/', $line, $matches)) {
                $res['recommended_ph'] = floatval($matches[1]);
            } elseif (preg_match('/3\.\s*Salinitas:\s*([\d.]+)\s*ppt/', $line, $matches)) {
                $res['recommended_salinity'] = floatval($matches[1]);
            } elseif (preg_match('/4\.\s*Kadar Oksigen:\s*([\d.]+)\s*mg/', $line, $matches)) {
                $res['recommended_oxygen'] = floatval($matches[1]);
            } elseif (preg_match('/Kondisi:\s*(good|bad)/i', $line, $matches)) {
            $res['pond_status'] = strtolower($matches[1]);
            }
        }

        if (strpos($responseContent, 'Rekomendasi:') !== false) {
            $recommendationPart = substr($responseContent, strpos($responseContent, 'Rekomendasi:') + strlen('Rekomendasi:'));
            $res['recommendation_notes'] = trim($recommendationPart);
        }

        $PondRecommendation = PondRecommendation::create([
            "pond_id" => $pond->id,
            "recommended_ph" => $res['recommended_ph'],
            "recommended_temp" => $res['recommended_temp'],
            "recommended_oxygen" => $res['recommended_oxygen'],
            "recommended_salinity" => $res["recommended_salinity"],
            "pond_status" => $res['pond_status'],
            "recommendation_notes" => $res['recommendation_notes']
        ]);

        Log::info('Respons OpenAI:', $response->toArray());
        Log::info('Berhasil Generate');
        $generatedText = $response['choices'][0]['message']['content'] ?? 'Tidak ada respons';
        return [
            'res' => $res,
            'PondRecommendation' => $PondRecommendation
        ];
    }

    public function editPond($req, $id)
    {
        $pond = Pond::findOrFail($id);
        
        $pond->update([
            'water_temp' => $req['water_temp'],
            'ph_level' => $req['ph_level'],
            'dissolved_oxygen' => $req['dissolved_oxygen'], 
            'salinity' => $req['salinity'],
            'measurement_date' => now()
        ]);

        $fishType = $pond->fish_type;
        $managementType = $pond->management_type;
        $length = $pond->length;
        $width = $pond->width; 
        $height = $pond->height;

        $prompt = trim("
            Kamu adalah seorang peternak ikan profesional dengan pengalaman bertahun-tahun dalam budidaya ikan. 
            Tugasmu adalah memantau kondisi kolam dan memberikan rekomendasi nilai parameter ideal untuk ikan jenis {$fishType}.
            SANGAT PENTING: Berikan nilai rekomendasi ideal yang BERBEDA dari nilai input. Nilai rekomendasi harus sesuai standar ideal untuk jenis ikan ini.
            
            Parameter kolam saat ini:
            - Suhu saat ini: {$req['water_temp']} °C
            - pH saat ini: {$req['ph_level']}
            - Salinitas saat ini: {$req['salinity']} ppt
            - Oksigen saat ini: {$req['dissolved_oxygen']} mg/L
            
            Format output HARUS seperti berikut:
            1. Suhu: [angka] °C (Rekomendasi suhu ideal untuk ikan jenis {$fishType})
            2. pH Air: [angka] (Rekomendasi pH ideal)
            3. Salinitas: [angka] ppt (Rekomendasi salinitas ideal)
            4. Kadar Oksigen: [angka] mg/L (Rekomendasi kadar oksigen ideal)
            Kondisi: good/bad (Penilaian kondisi kolam berdasarkan parameter baru)
            Rekomendasi: [Berikan saran spesifik berdasarkan perbandingan parameter baru dengan nilai ideal]

            Kolam memiliki ukuran {$length} meter (panjang) x {$width} meter (lebar) x {$height} meter (tinggi).
            Sistem pengelolaan kolam yang digunakan adalah {$managementType}.
            
            Harap berikan output hanya dalam format di atas tanpa menambahkan penjelasan lain.
        ");

        $prompt = preg_replace('/\s+/', ' ', $prompt);

        $response = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $prompt]
            ]
        ]);
        
        $responseContent = trim($response['choices'][0]['message']['content']);
        Log::info($responseContent);

        $lines = explode("\n", $responseContent);
        $lines = array_map('trim', array_filter($lines));
        
        $res = [
            'recommended_temp' => '',
            'recommended_ph' => '',
            'recommended_salinity' => '',
            'recommended_oxygen' => '',
            'pond_status' => '',
            'recommendation_notes' => ''
        ];
        
        foreach ($lines as $line) {
            if (preg_match('/1\.\s*Suhu:\s*([\d.]+)/', $line, $matches)) {
                $res['recommended_temp'] = floatval($matches[1]);
            } elseif (preg_match('/2\.\s*pH Air:\s*([\d.]+)/', $line, $matches)) {
                $res['recommended_ph'] = floatval($matches[1]);
            } elseif (preg_match('/3\.\s*Salinitas:\s*([\d.]+)/', $line, $matches)) {
                $res['recommended_salinity'] = floatval($matches[1]);
            } elseif (preg_match('/4\.\s*Kadar Oksigen:\s*([\d.]+)/', $line, $matches)) {
                $res['recommended_oxygen'] = floatval($matches[1]);
            } elseif (preg_match('/Kondisi:\s*(good|bad)/i', $line, $matches)) {
                $res['pond_status'] = strtolower($matches[1]);
            }
        }

        if (strpos($responseContent, 'Rekomendasi:') !== false) {
            $recommendationPart = substr($responseContent, strpos($responseContent, 'Rekomendasi:') + strlen('Rekomendasi:'));
            $res['recommendation_notes'] = trim($recommendationPart);
        }

        $PondRecommendation = PondRecommendation::where('pond_id', $pond->id)->update([
            "recommended_ph" => $res['recommended_ph'],
            "recommended_temp" => $res['recommended_temp'],
            "recommended_oxygen" => $res['recommended_oxygen'],
            "recommended_salinity" => $res["recommended_salinity"],
            "pond_status" => $res['pond_status'],
            "recommendation_notes" => $res['recommendation_notes']
        ]);
        Log::info('Berhasil Update Rekomendasi');
        
        return [
            'res' => $res,
            'PondRecommendation' => $PondRecommendation
        ];
    }

    public function getPondById($id)
    {
        $pond = Pond::with('recommendations')->findOrFail($id);
        return [
            'data' => $pond->toArray(),
            'res' => $pond->recommendations->last()->toArray()
        ];
    }

    public function deletePond($id)
    {
        return Pond::findOrFail($id)->delete();
    }
}