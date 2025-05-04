<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TourSection;
use App\Models\Tour;
use App\Models\TourHighlight;
use App\Models\TourImage;
use App\Models\TourPdf;
use Illuminate\Support\Facades\Storage;

class TourManagementController extends Controller
{
    //
    public function TourSectionManagement()
    {
        $tourSections = TourSection::all();

        return view('admin.tour_management.tour_section_management.tour_section_management', compact('tourSections'));
    }

    public function CreateNewTourSection(Request $request)
    {
        $request->validate([
            'tour_section_name' => 'required|string|max:255',
        ]);

        $toursection = TourSection::create([
            'tour_section_name' => $request->tour_section_name,
        ]);

        return redirect()->back()->with('success', 'TourSection created successfully.');
    }

    public function DeleteTourSection($id)
    {
        $tourSection = TourSection::findOrFail($id);

        foreach ($tourSection->tours as $tour) {

            $tour->highlights()->delete();

            foreach ($tour->pdfs as $pdf) {
                Storage::disk('public')->delete($pdf->tour_pdf_file);
                $pdf->delete();
            }

            foreach ($tour->images as $image) {
                Storage::disk('public')->delete($image->tour_image_files);
                $image->delete();
            }

            $tour->delete();
        }

        $tourSection->delete();

        return redirect()->back()->with('success', 'TourSection deleted successfully.');
    }

    public function TourlistSection($toursectionId)
    {
        $toursection = TourSection::with(['tours', 'tours.highlights', 'tours.images', 'tours.pdfs'])->findOrFail($toursectionId);

        return view('admin.tour_management.tour_list_of_section.tour_list_of_section', compact('toursection'));
    }


    public function CreateNewTour(Request $request, $tourId)
    {
        $request->validate([
            'tour_name' => 'required|string|max:255',
            'tour_detail' => 'required|string',
            'tour_highlight_detail_string' => 'required|string',
            'title_image' => 'file|mimes:jpg,jpeg,png',
            'file_post' => 'nullable|array',
            'file_post.*' => 'file|mimes:jpg,jpeg,png,pdf|max:10240',
        ]);

        // dd($request);

        $Tour = Tour::create([
            'tour_section_id' => $tourId,
            'tour_name' => $request->tour_name,
            'tour_detail' => $request->tour_detail,
        ]);

        $highlights = explode(',', $request->tour_highlight_detail_string);

        foreach ($highlights as $highlightDetail) {
            if (!empty($highlightDetail)) {
                TourHighlight::create([
                    'tour_id' => $Tour->id,
                    'tour_highlight_detail' => $highlightDetail,
                ]);
            }
        }

        if ($request->hasFile('title_image')) {
            $file = $request->file('title_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('photo_title', $filename, 'public');

            TourImage::create([
                'tour_id' => $Tour->id,
                'tour_image_files' => $path,
                'tour_image_status' => '1',
            ]);
        }

        if ($request->hasFile('file_post')) {
            foreach ($request->file('file_post') as $file) {

                $filename = time() . '_' . $file->getClientOriginalName();

                if ($file->getClientOriginalExtension() == 'pdf') {
                    // ถ้าเป็นไฟล์ PDF
                    $path = $file->storeAs('pdf', $filename, 'public');

                    TourPdf::create([
                        'tour_id' => $Tour->id,
                        'tour_pdf_file' => $path,
                    ]);
                } elseif (in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png'])) {
                    // ถ้าเป็นไฟล์รูปภาพ (jpg, jpeg, png)
                    $path = $file->storeAs('photo', $filename, 'public');

                    TourImage::create([
                        'tour_id' => $Tour->id,
                        'tour_image_files' => $path,
                        'tour_image_status' => '2',
                    ]);
                } else {
                    return redirect()->back()->withErrors(['file_post' => 'Only PDF, JPG, JPEG, and PNG files are allowed.']);
                }
            }
        }

        return redirect()->back()->with('success', 'Tour created successfully.');
    }

    public function DeleteTour($id)
    {
        $tour = Tour::findOrFail($id);

        // ลบ Highlights
        $tour->highlights()->delete();

        // ลบ PDFs และไฟล์
        foreach ($tour->pdfs as $pdf) {
            Storage::disk('public')->delete($pdf->tour_pdf_file);
            $pdf->delete();
        }

        // ลบ Images และไฟล์
        foreach ($tour->images as $image) {
            Storage::disk('public')->delete($image->tour_image_files);
            $image->delete();
        }

        // ลบ Tour หลัก
        $tour->delete();

        return redirect()->back()->with('success', 'Tour deleted successfully.');
    }
}
