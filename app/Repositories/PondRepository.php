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

        $prompt = "Kamu adalah seorang peternak ikan profesional dengan pengalaman bertahun-tahun dalam budidaya ikan.

                Tugasmu adalah:
                1. Menganalisis kondisi kolam yang diberikan
                2. Memberikan nilai parameter IDEAL yang DIREKOMENDASIKAN (bukan mengulang input) untuk ikan jenis {$req['fish_type']}
                3. Memberikan rekomendasi detail langkah-langkah perbaikan jika diperlukan

                PENTING:
                - Berikan nilai IDEAL yang direkomendasikan, JANGAN mengulang nilai input
                - Rekomendasi harus detail minimal 3-4 poin
                - Kondisi dianggap 'good' jika:
                * Minimal 3 dari 4 parameter berada dalam rentang toleransi
                * Toleransi yang diperbolehkan:
                    - Suhu: ±2°C dari nilai ideal
                    - pH: ±0.5 dari nilai ideal
                    - Salinitas: ±1.5 ppt dari nilai ideal
                    - Oksigen: ±1.5 mg/L dari nilai ideal
                - Jika kurang dari 3 parameter dalam rentang toleransi, status 'Kondisi' adalah 'bad'

                Format output yang WAJIB diikuti:
                //start format output
                Suhu: [tulis angka ideal sesuai jenis ikan, misal: 27] °C
                pH Air: [tulis angka ideal sesuai jenis ikan, misal: 7.5]
                Salinitas: [tulis angka ideal sesuai jenis ikan, misal: 5] ppt
                Oksigen: [tulis angka ideal sesuai jenis ikan, misal: 6] mg/L
                Kondisi: [tulis 'good' atau 'bad']
                Rekomendasi: [minimal 3-4 poin detail langkah perbaikan]
                //end format output

                    Contoh output yang BENAR (jika input buruk):
                    Suhu: 27 °C
                    pH Air: 7.5
                    Salinitas: 5 ppt  
                    Oksigen: 6 mg/L
                    Kondisi: bad
                    Rekomendasi:
                    1. Pasang 2 unit pemanas air 1000W dan atur ke suhu 27°C
                    2. Tambahkan 3 aerator 100W di titik A, B, dan C kolam
                    3. Tambahkan 50kg garam kualitas akuakultur secara bertahap (15kg/hari)
                    4. Lakukan pengukuran parameter setiap 6 jam selama penyesuaian
                    5. Pasang termometer digital dengan alarm untuk monitoring

                    Data kondisi kolam saat ini:
                    Suhu: {$req['water_temp']} °C
                    pH: {$req['ph_level']}
                    Salinitas: {$req['salinity']} ppt  
                    Oksigen: {$req['dissolved_oxygen']} mg/L
                    Kolam: {$req['length']} x {$req['width']} x {$req['height']} meter
                    Sistem pengelolaan: {$req['management_type']}

                    Parameter ideal umum (sesuaikan dengan jenis ikan):
                    - Suhu: 25-30°C 
                    - pH: 6.5-8.5
                    - Salinitas: 5-5.5 ppt (air tawar = 0 ppt)
                    - Oksigen: 5-8 mg/L";

        $prompt = preg_replace('/\s+/', ' ', $prompt);

        $response = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
            ['role' => 'user', 'content' => $prompt]
            ]
        ]);
        
        $responseContent = trim($response['choices'][0]['message']['content']);
        Log::info($responseContent);

        if (preg_match('/Suhu:.*?(?=Data kondisi kolam|$)/s', $responseContent, $matches)) {
            $responseContent = trim($matches[0]);
        }

        $lines = explode("\n", $responseContent);
        $lines = array_map('trim', array_filter($lines));

        $res = [
            'recommended_temp' => 0.0,
            'recommended_ph' => 0.0,
            'recommended_salinity' => 0.0,
            'recommended_oxygen' => 0.0,
            'pond_status' => 'bad',
            'recommendation_notes' => 'No recommendations available'
        ];
        
        foreach ($lines as $line) {
            if (preg_match('/Suhu:\s*([\d.-]+)\s*°C/', $line, $matches)) {
            $res['recommended_temp'] = $matches[1];
            } elseif (preg_match('/pH Air:\s*([\d.-]+)/', $line, $matches)) {
            $res['recommended_ph'] = $matches[1];
            } elseif (preg_match('/Salinitas:\s*([\d.-]+)\s*ppt/', $line, $matches)) {
            $res['recommended_salinity'] = $matches[1];
            } elseif (preg_match('/Oksigen:\s*([\d.-]+)\s*mg/', $line, $matches)) {
            $res['recommended_oxygen'] = $matches[1];
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

        $prompt = "Kamu adalah seorang peternak ikan profesional dengan pengalaman bertahun-tahun dalam budidaya ikan.

                Tugasmu adalah:
                1. Menganalisis kondisi kolam yang diberikan
                2. Memberikan nilai parameter IDEAL yang DIREKOMENDASIKAN (bukan mengulang input) untuk ikan jenis {$fishType}
                3. Memberikan rekomendasi detail langkah-langkah perbaikan jika diperlukan

                PENTING:
                - Berikan nilai IDEAL yang direkomendasikan, JANGAN mengulang nilai input
                - Rekomendasi harus detail minimal 3-4 poin
                - Kondisi dianggap 'good' jika:
                * Minimal 3 dari 4 parameter berada dalam rentang toleransi
                * Toleransi yang diperbolehkan:
                    - Suhu: ±2°C dari nilai ideal
                    - pH: ±0.5 dari nilai ideal
                    - Salinitas: ±1.5 ppt dari nilai ideal
                    - Oksigen: ±1.5 mg/L dari nilai ideal
                - Jika kurang dari 3 parameter dalam rentang toleransi, status 'Kondisi' adalah 'bad'

                Format output yang WAJIB diikuti:
                //start format output
                Suhu: [tulis angka ideal sesuai jenis ikan, misal: 27-29] °C
                pH Air: [tulis angka ideal sesuai jenis ikan, misal: 7.5-8]
                Salinitas: [tulis angka ideal sesuai jenis ikan, misal: 5-6] ppt
                Oksigen: [tulis angka ideal sesuai jenis ikan, misal: 6-7] mg/L
                Kondisi: [tulis 'good' atau 'bad']
                Rekomendasi: [minimal 3-4 poin detail langkah perbaikan]
                //end format output

                    Contoh output yang BENAR (jika input buruk):
                    Suhu: 27 °C
                    pH Air: 7.5
                    Salinitas: 5 ppt  
                    Oksigen: 6 mg/L
                    Kondisi: bad
                    Rekomendasi:
                    1. Pasang 2 unit pemanas air 1000W dan atur ke suhu 27°C
                    2. Tambahkan 3 aerator 100W di titik A, B, dan C kolam
                    3. Tambahkan 50kg garam kualitas akuakultur secara bertahap (15kg/hari)
                    4. Lakukan pengukuran parameter setiap 6 jam selama penyesuaian
                    5. Pasang termometer digital dengan alarm untuk monitoring
                    
                    Data kondisi kolam saat ini:
                    Suhu: {$req['water_temp']} °C
                    pH: {$req['ph_level']}
                    Salinitas: {$req['salinity']} ppt  
                    Oksigen: {$req['dissolved_oxygen']} mg/L
                    Kolam: {$length} x {$width} x {$height} meter
                    Sistem pengelolaan: {$managementType}

                    Parameter ideal umum (sesuaikan dengan jenis ikan):
                    - Suhu: 25-30°C 
                    - pH: 6.5-8.5
                    - Salinitas: 5-5.5 ppt (air tawar = 0 ppt)
                    - Oksigen: 5-8 mg/L";

        $prompt = trim(preg_replace(['/\s+/', '/\n\s*\n/'], [' ', "\n"], $prompt));

        $response = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
            ['role' => 'user', 'content' => $prompt]
            ]
        ]);
        
        $responseContent = trim($response['choices'][0]['message']['content']);
        Log::info($responseContent);

        if (preg_match('/Suhu:.*?(?=Data kondisi kolam|$)/s', $responseContent, $matches)) {
            $responseContent = trim($matches[0]);
        }

        $lines = explode("\n", $responseContent);
        $lines = array_map('trim', array_filter($lines));
        
        $res = [
            'recommended_temp' => 0.0,
            'recommended_ph' => 0.0,
            'recommended_salinity' => 0.0,
            'recommended_oxygen' => 0.0,
            'pond_status' => 'bad',
            'recommendation_notes' => 'No recommendations available'
        ];
        
        foreach ($lines as $line) {
            if (preg_match('/Suhu:\s*([\d.-]+)\s*°C/', $line, $matches)) {
            $res['recommended_temp'] = $matches[1];
            } elseif (preg_match('/pH Air:\s*([\d.-]+)/', $line, $matches)) {
            $res['recommended_ph'] = $matches[1];
            } elseif (preg_match('/Salinitas:\s*([\d.-]+)\s*ppt/', $line, $matches)) {
            $res['recommended_salinity'] = $matches[1];
            } elseif (preg_match('/Oksigen:\s*([\d.-]+)\s*mg/', $line, $matches)) {
            $res['recommended_oxygen'] = $matches[1];
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