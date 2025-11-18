@php
    $frontBg = url('assets/images/id_card/front.jpg');
    $backBg = url('assets/images/id_card/back.jpg');
    
    // Calculate age from date of birth
    $age = $member->dob ? \Carbon\Carbon::parse($member->dob)->age : null;
    
    // Format gender
    $genderTamil = match($member->gender) {
        'Male' => 'ஆண்',
        'Female' => 'பெண்',
        'Other' => 'மற்றவை',
        default => ''
    };
    $genderEnglish = $member->gender ?? '';
    
    // Format joining date (using created_at)
    $joiningDate = $member->created_at ? $member->created_at->format('d.m.Y') : now()->format('d.m.Y');
    
    // Get photo path
    $photoPath = null;
    if ($member->photo) {
        if (file_exists(storage_path('app/public/' . $member->photo))) {
            $photoPath = url('storage/' . $member->photo);
        } elseif (file_exists(public_path('storage/' . $member->photo))) {
            $photoPath = url('storage/' . $member->photo);
        }
    }
    
    // Detect if content is Tamil
    $isTamil = function($text) {
        return preg_match('/[\x{0B80}-\x{0BFF}]/u', $text ?? '') === 1;
    };
    
    $hasTamilData = $isTamil($member->name ?? '') ||
                    $isTamil($member->father_name ?? '') ||
                    $isTamil($member->district->name_ta ?? '') ||
                    $isTamil($member->assembly->name_ta ?? '');
    
    // Define labels based on language
    $labels = [
        'name' => $hasTamilData ? 'பெயர்' : 'Name',
        'father_name' => $hasTamilData ? 'தந்தை பெயர்' : 'Father Name',
        'age_gender' => $hasTamilData ? 'வயது / பாலினம்' : 'Age / Gender',
        'join_date' => $hasTamilData ? 'உறுப்பினர் தேதி' : 'Join Date',
        'assembly' => $hasTamilData ? 'சட்டமன்றம்' : 'Assembly',
        'district' => $hasTamilData ? 'மாவட்டம்' : 'District',
        'membership_id' => $hasTamilData ? 'உறுப்பினர் எண்' : 'Membership ID',
    ];
    
    // Get values based on language
    $nameValue = $member->name ?? 'N/A';
    $fatherNameValue = $member->father_name ?? 'N/A';
    $ageGenderValue = ($age ? $age . ' / ' : '') . ($hasTamilData ? $genderTamil : $genderEnglish);
    $joinDateValue = $joiningDate;
    $assemblyValue = $hasTamilData ? ($member->assembly->name_ta ?? $member->assembly->name_en ?? 'N/A') : ($member->assembly->name_en ?? 'N/A');
    $districtValue = $hasTamilData ? ($member->district->name_ta ?? $member->district->name_en ?? 'N/A') : ($member->district->name_en ?? 'N/A');
    $membershipIdValue = $member->member_no ?? 'N/A';
@endphp
<!DOCTYPE html>
<html lang="{{ $hasTamilData ? 'ta' : 'en' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member ID Card (Full) - {{ $member->name }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mukta+Malar:wght@400;600;700&display=swap');
        
        /* A4 page with two cards side by side */
        @page {
            size: A4;
            margin: 0;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Mukta Malar', 'DejaVu Sans', sans-serif;
            margin: 0;
            padding: 0;
        }

        .page-container {
            width: 210mm;
            height: 297mm;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10mm;
            padding: 10mm;
        }

        .id-card {
            width: 85.6mm;
            height: 53.98mm;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            overflow: hidden;
            border: 1px solid #ccc;
        }

        /* Front Card */
        .front-card {
            background-image: url('{{ $frontBg }}');
        }

        .content-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            padding: 4mm;
        }

        .left-content {
            flex: 1.2;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-right: 3mm;
        }

        .field-row {
            margin-bottom: 2.5mm;
            font-size: 7pt;
            line-height: 1.4;
        }

        .field-label {
            font-weight: bold;
            display: inline-block;
            min-width: 25mm;
            color: #000;
        }

        .field-value {
            color: #000;
            font-weight: normal;
        }

        .right-photo {
            flex: 0.8;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-left: 2mm;
        }

        .photo-container {
            width: 28mm;
            height: 35mm;
            border: 2px solid #dc2626;
            border-radius: 3px;
            overflow: hidden;
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .photo-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .photo-placeholder {
            width: 100%;
            height: 100%;
            background-color: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 6pt;
            color: #666;
            text-align: center;
            padding: 2mm;
        }

        /* Back Card */
        .back-card {
            background-image: url('{{ $backBg }}');
        }

        @media print {
            .id-card {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                color-adjust: exact;
            }
        }
    </style>
</head>
<body>
    <div class="page-container">
        <!-- Front Side -->
        <div class="id-card front-card">
            <div class="content-overlay">
                <div class="left-content">
                    <div class="field-row">
                        <span class="field-label">{{ $labels['name'] }}:</span>
                        <span class="field-value">{{ $nameValue }}</span>
                    </div>
                    <div class="field-row">
                        <span class="field-label">{{ $labels['father_name'] }}:</span>
                        <span class="field-value">{{ $fatherNameValue }}</span>
                    </div>
                    <div class="field-row">
                        <span class="field-label">{{ $labels['age_gender'] }}:</span>
                        <span class="field-value">{{ $ageGenderValue }}</span>
                    </div>
                    <div class="field-row">
                        <span class="field-label">{{ $labels['join_date'] }}:</span>
                        <span class="field-value">{{ $joinDateValue }}</span>
                    </div>
                    <div class="field-row">
                        <span class="field-label">{{ $labels['assembly'] }}:</span>
                        <span class="field-value">{{ $assemblyValue }}</span>
                    </div>
                    <div class="field-row">
                        <span class="field-label">{{ $labels['district'] }}:</span>
                        <span class="field-value">{{ $districtValue }}</span>
                    </div>
                    <div class="field-row">
                        <span class="field-label">{{ $labels['membership_id'] }}:</span>
                        <span class="field-value">{{ $membershipIdValue }}</span>
                    </div>
                </div>
                <div class="right-photo">
                    <div class="photo-container">
                        @if($photoPath)
                            <img src="{{ $photoPath }}" alt="Member Photo">
                        @else
                            <div class="photo-placeholder">
                                {{ $hasTamilData ? 'புகைப்படம் இல்லை' : 'No Photo' }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Back Side -->
        <div class="id-card back-card">
            <!-- Back side only shows background image -->
        </div>
    </div>
</body>
</html>
