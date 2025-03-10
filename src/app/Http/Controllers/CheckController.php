<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Check;

class CheckController extends Controller
{
    public function check(Request $request)
    {
        $input = $request->input('text');
        $language = $this->detectLanguage($input);
        $output = $this->highlight($input, $language);

        if ($request->isMethod('post')) {
            Check::create([
                'input' => $input,
                'output' => $output,
                'language' => $language,
            ]);
        }

        return response()->json([
            'output' => $output,
            'language' => $language,
        ]);
    }

    private function detectLanguage($text)
    {
        $ruCount = preg_match_all('/[а-яА-Я]/u', $text);
        $enCount = preg_match_all('/[a-zA-Z]/', $text);

        return ($ruCount >= $enCount) ? 'ru' : 'en';
    }

    private function highlight($text, $language)
    {
        $pattern = ($language === 'ru') ? '/[a-zA-Z]/' : '/[а-яА-Я]/u';
        return preg_replace($pattern, '<span class="highlight">$0</span>', $text);
    }

    public function history()
    {
        $checks = Check::latest()->get();
        return view('history', compact('checks'));
    }
}
