// app/Http/Controllers/FilterController.php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\Csv\Writer;

class FilterController extends Controller
{
    public function index()
    {
        return view('filters.index');
    }

    public function filter(Request $request)
    {
        $query = Student::query();

        if ($request->has('10th_marks')) {
            $query->where('10th_marks', '>=', $request->input('10th_marks'));
        }

        if ($request->has('12th_marks')) {
            $query->where('12th_marks', '>=', $request->input('12th_marks'));
        }

        if ($request->has('cgpa')) {
            $query->where('cgpa', '>=', $request->input('cgpa'));
        }

        if ($request->has('course')) {
            $query->where('course', $request->input('course'));
        }

        $students = $query->get();

        // Generate CSV
        $csv = Writer::createFromString('');
        $csv->insertOne(['Student ID', 'Name', '10th Marks', '12th Marks', 'CGPA', 'Course']);

        foreach ($students as $student) {
            $csv->insertOne([$student->id, $student->name, $student->10th_marks, $student->12th_marks, $student->cgpa, $student->course]);
        }

        $filePath = 'exports/students_' . now()->format('Y-m-d_H-i-s') . '.csv';
        Storage::disk('local')->put($filePath, $csv->getContent());

        return response()->download(storage_path('app/' . $filePath))->deleteFileAfterSend(true);
    }
}
