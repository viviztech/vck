<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Spatie\LaravelPdf\Facades\Pdf;
use Illuminate\Http\Request;

class ApplicationPdfController extends Controller
{
    /**
     * Download Application as PDF
     */
    public function download(Request $request, $application)
    {
        $application = Application::with([
            'district',
            'assembly',
            'post',
            'state',
            'postingstage',
            'subbody'
        ])->findOrFail($application);
        
        try {
            $fileName = 'application_' . $application->name . '_' . $application->id . '.pdf';
            
            $pdf = Pdf::view('pdf.application', [
                'application' => $application
            ])
            ->format('A4')
            ->orientation('portrait')
            ->name($fileName);
            
            return $pdf->download();
        } catch (\Exception $e) {
            \Log::error('Application PDF Generation Error: ' . $e->getMessage());
            abort(500, 'Error generating PDF: ' . $e->getMessage());
        }
    }
}

