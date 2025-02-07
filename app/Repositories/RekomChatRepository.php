<?php
namespace App\Repositories;
use OpenAI\Laravel\Facades\OpenAI;
use OpenAI\Responses\Completions\CreateResponse;
use Illuminate\Support\Facades\Log;
use App\Interfaces\RekomChatRepositoryInterface;


class RekomChatRepository implements RekomChatRepositoryInterface{
    public function recommendation($req)
    {
        $prompt = "Kamu adalah seorang peternak ikan profesional dengan pengalaman bertahun-tahun dalam budidaya ikan.
                Berikan rekomendasi dalam format berikut:
                1. Suhu: [angka] °C
                2. Jumlah Ikan: [angka] ekor
                3. Kadar Oksigen: [angka] mg/L
                4. pH Air: [angka]
                5. Salinitas: [angka] ppt
                6. Rekomendasi: [text]

                Untuk ikan jenis {$req['fish']}.
                Kolam memiliki ukuran {$req['length']} meter panjang, {$req['width']} meter lebar, dan {$req['height']} meter tinggi.
                Sistem pengelolaan kolam yang digunakan adalah {$req['management']}.";

        $response = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);
        Log::info('Respons OpenAI:', $response->toArray());
        $generatedText = $response['choices'][0]['message']['content'] ?? 'Tidak ada respons';
        return $generatedText;
    }

    public function chatbot($req)
    {

    }

    public function testChatbot()
    {
        $prompt = "PHP adalah ";

        $response = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);

        Log::info('Respons OpenAI:', $response->toArray());

        $generatedText = $response['choices'][0]['message']['content'] ?? 'Tidak ada respons';
        return $generatedText;
    }
}
