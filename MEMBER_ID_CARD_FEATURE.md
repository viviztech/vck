# Member ID Card Feature

## Overview
This feature allows admins to view detailed member information and download professional ID cards in PDF format.

## Features

### 1. Enhanced Member View Page
- Comprehensive member information display with organized sections:
  - **Personal Information**: Photo, Member ID, Name, Father Name, DOB, Gender, Blood Group
  - **Contact Information**: Phone, Email, Address, Pincode, Voter ID
  - **Administrative Details**: State, District, Assembly, Block, Perur, City, Corporation
  - **Registration Details**: Registration date and last update

### 2. ID Card Download Options
Three download options are available from the member view page:

#### a) Download ID Card (Both Sides) - Primary Option
- Downloads a full A4 PDF with both front and back of the ID card
- Perfect for printing and cutting
- Includes all member details on the front
- Contains guidelines and contact information on the back

#### b) Download Front Only
- Downloads only the front side in credit card size (85.6mm x 53.98mm)
- Optimized for quick printing

#### c) Download Back Only
- Downloads only the back side in credit card size
- Contains party guidelines and contact information

## ID Card Design

### Front Side Features
- VCK Logo in top-left corner
- Organization name in Tamil and English
- Member photo with frame
- Member ID badge
- Key information fields:
  - Name
  - Date of Birth
  - District
  - Assembly
  - Phone Number
  - Address
- Issue date
- Professional gradient background with party colors

### Back Side Features
- Organization name in Tamil and English
- Important guidelines for card holders
- Party headquarters information
- Website and email contact details
- Authorized signature section
- QR code placeholder

## Technical Details

### File Locations
- **View Page**: `app/Filament/Resources/Members/Pages/ViewMember.php`
- **PDF Templates**:
  - Full card: `resources/views/pdf/member-id-card-full.blade.php`
  - Front only: `resources/views/pdf/member-id-card.blade.php`
  - Back only: `resources/views/pdf/member-id-card-back.blade.php`
- **Background Image**: `public/assets/images/id-card-bg.jpg`
- **Logo**: `public/assets/images/resources/vck-logo-round-1.png`

### Dependencies
- **Package**: barryvdh/laravel-dompdf (already installed)
- **Configuration**: `config/dompdf.php`

### Card Specifications
- **Size**: CR80 standard (85.6mm x 53.98mm / 3.375" x 2.125")
- **Format**: PDF
- **Colors**: Purple gradient (#667eea to #764ba2)
- **Fonts**: Arial family for compatibility

## Usage Instructions

### For Admins:
1. Navigate to the Members section in the admin panel
2. Click on any member to view their details
3. At the top of the page, you'll see three action buttons:
   - **Download ID Card (Both Sides)** - Green button (recommended)
   - **Download Front Only** - Blue button
   - **Download Back Only** - Gray button
4. Click any button to download the respective PDF
5. Print the PDF and cut along the card boundaries if using the full version

### Customization Options

#### Changing Background Image
Replace the file at: `public/assets/images/id-card-bg.jpg`

#### Modifying Card Design
Edit the respective Blade template files in `resources/views/pdf/`

#### Updating Party Information
Edit the contact section in the back card template:
```php
<div class="contact-section">
    <div class="contact-item"><strong>Headquarters:</strong> Chennai, Tamil Nadu</div>
    <div class="contact-item"><strong>Website:</strong> www.vck.in</div>
    <div class="contact-item"><strong>Email:</strong> info@vck.in</div>
</div>
```

## Troubleshooting

### Issue: PDF not generating
**Solution**: Ensure the storage/fonts directory exists and is writable:
```bash
mkdir -p storage/fonts
chmod -R 775 storage/fonts
```

### Issue: Images not showing in PDF
**Solution**: Check that the following files exist:
- `public/assets/images/id-card-bg.jpg`
- `public/assets/images/resources/vck-logo-round-1.png`
- Member photo in `storage/app/public/[photo_path]`

### Issue: Tamil text not displaying correctly
**Solution**: The current design uses Arial which has limited Tamil support. For better Tamil rendering, consider:
1. Adding Tamil-compatible fonts to `storage/fonts/`
2. Updating the font-family in the CSS
3. Running font cache refresh: `php artisan cache:clear`

## Future Enhancements

Potential improvements:
- Add QR code with member verification link
- Include barcode with member ID
- Add signature upload and display
- Multi-language support for card content
- Batch download for multiple members
- Custom card templates per district/region
- Expiry date and renewal reminder system

## Support

For issues or feature requests related to this functionality, please contact the development team or create an issue in the project repository.

---

**Created**: October 2025
**Version**: 1.0
**Status**: Production Ready
