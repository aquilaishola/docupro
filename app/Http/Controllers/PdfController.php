<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    // Show the live editor page
    public function editor()
    {
        return view('editor');
    }

    // Generate PDF from live content
    public function generate(Request $request)
    {
        $userContent = $request->input('content', '<p>No content provided</p>');

        // Wrap user content in a styled template
        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>PDF-gen</title>
            <style>
                body {
                    font-family: DejaVu Sans, sans-serif;
                    padding: 32px;
                    color: #1f2937;
                    background: #ffffff;
                }
                h1, h2, h3 { color: #2563eb; margin-bottom: 8px; }
                p { font-size: 14px; line-height: 1.6; margin-bottom: 16px; }
                .date { font-size: 12px; color: #6b7280; margin-bottom: 24px; }
                .footer {
                    margin-top: 40px;
                    font-size: 12px;
                    text-align: center;
                    color: #9ca3af;
                }
            </style>
        </head>
        <body>
            <div class="date">Generated on '.now()->format('F j, Y g:i A').'</div>
            '.$userContent.'
            <div class="footer">© '.date('Y').' Dev Aquila</div>
        </body>
        </html>';

        $pdf = Pdf::loadHTML($html)->setPaper('a4', 'portrait');

        return $pdf->download('my-pdf.pdf');
    }
}
