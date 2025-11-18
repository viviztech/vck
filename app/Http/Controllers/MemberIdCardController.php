<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Spatie\LaravelPdf\Facades\Pdf;
use Illuminate\Http\Request;

class MemberIdCardController extends Controller
{
    /**
     * Download ID Card
     */
    public function download(Request $request, $member, $type = 'full')
    {
        $member = Member::with(['district', 'assembly', 'state'])->findOrFail($member);
        
        try {
            switch ($type) {
                case 'full':
                    $pdf = Pdf::view('pdf.member-id-card-full', ['member' => $member])
                        ->format('A4')
                        ->orientation('portrait')
                        ->name('member-id-card-' . $member->id . '-full.pdf');
                    break;
                    
                case 'front':
                    $pdf = Pdf::view('pdf.member-id-card-front', ['member' => $member])
                        ->name('member-id-card-' . $member->id . '-front.pdf');
                    break;
                    
                case 'back':
                    $pdf = Pdf::view('pdf.member-id-card-back', ['member' => $member])
                        ->name('member-id-card-' . $member->id . '-back.pdf');
                    break;
                    
                default:
                    abort(404, 'Invalid download type');
            }
            
            return $pdf->download();
        } catch (\Exception $e) {
            \Log::error('PDF Generation Error: ' . $e->getMessage());
            abort(500, 'Error generating PDF: ' . $e->getMessage());
        }
    }
}

