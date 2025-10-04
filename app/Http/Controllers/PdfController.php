<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\PdfFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    // Show the live editor page
    public function editor()
    {
        return view('pdf.create');
    }

    // Generate PDF from live content
    public function generate(Request $request)
    {
        $userContent = $request->input('content', '<p>No content provided</p>');

        // Build HTML
        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>DocuPro - Create and Edit PDFs Professionally</title>
            <style>
                body { font-family: DejaVu Sans, sans-serif; padding: 32px; color: #1f2937; background: #ffffff; }
                h1, h2, h3 { color: #2563eb; margin-bottom: 8px; }
                p { font-size: 14px; line-height: 1.6; margin-bottom: 16px; }
                .date { font-size: 12px; color: #6b7280; margin-bottom: 24px; }
                .footer { margin-top: 40px; font-size: 12px; text-align: center; color: #9ca3af; }
            </style>
        </head>
        <body>
            <div class="date">Generated on '.now()->format('F j, Y g:i A').'</div>
            '.$userContent.'
            <div class="footer">© '.date('Y').' DocuPro</div>
        </body>
        </html>';

        $pdf = Pdf::loadHTML($html)->setPaper('a4', 'portrait');

        // Generate unique filename
        $fileName = 'pdfs/' . uniqid() . '.pdf';

        // Save PDF to storage
        Storage::disk('public')->put($fileName, $pdf->output());

        // Save record to database
        PdfFile::create([
            'user_id' => Auth::id(),
            'content' => $userContent,
            'file_path' => $fileName,
        ]);

        // Download with same filename
        return Storage::disk('public')->download($fileName, basename($fileName));
    }

    // Show user PDF history
    public function history()
    {
        $pdfs = PdfFile::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('pdf.history', compact('pdfs'));
    }

    // Load a PDF's content into the editor
    public function edit(PdfFile $pdf)
    {
        if ($pdf->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('pdf.create', [
            'pdfContent' => $pdf->content,
            'pdf' => $pdf
        ]);
    }

    // Update an existing PDF
    public function update(Request $request, PdfFile $pdf)
    {
        if ($pdf->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $userContent = $request->input('content', '<p>No content provided</p>');

        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>DocuPro</title>
            <style>
                body { font-family: DejaVu Sans, sans-serif; padding: 32px; color: #1f2937; background: #ffffff; }
                h1, h2, h3 { color: #2563eb; margin-bottom: 8px; }
                p { font-size: 14px; line-height: 1.6; margin-bottom: 16px; }
                .date { font-size: 12px; color: #6b7280; margin-bottom: 24px; }
                .footer { margin-top: 40px; font-size: 12px; text-align: center; color: #9ca3af; }
            </style>
        </head>
        <body>
            <div class="date">Edited on '.now()->format('F j, Y g:i A').'</div>
            '.$userContent.'
            <div class="footer">© '.date('Y').' DocuPro</div>
        </body>
        </html>';

        $pdfFile = Pdf::loadHTML($html)->setPaper('a4', 'portrait');

        // Overwrite existing PDF file
        Storage::disk('public')->put($pdf->file_path, $pdfFile->output());

        // Update content in DB
        $pdf->update(['content' => $userContent]);

        // Download with same filename as stored
        return Storage::disk('public')->download($pdf->file_path, basename($pdf->file_path));
    }
}