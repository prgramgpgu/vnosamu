<?php

    namespace App\Http\Controllers;

    use App\Models\File;
    use App\Models\Issue;
    use App\Models\Section;
    use App\Models\Upload;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Storage;

    class FileController extends Controller
    {
        public function index(Section $section)
        {
            $path = 'public/files/' . $section->link . '/';
            $uploads = Upload::where('section_id', $section->id)->get();
            $files = [];
            foreach ($uploads as $upload) {
                $file_path = $path . $upload['filename'];
                $name = $upload['title'];
                $id = $upload['id'];
                $size = Storage::size($file_path);
                $files[] = array('name' => $name, 'size' => $size, 'path' => $file_path, 'id' => $id);
            }
            return response()->json($files);
        }


        public function getIssues(Section $section, $yearR, $issueR, $volumeR)
        {
            //dd($yearR, $issueR, $volumeR);
            if ($section->link == "issues") {
//                 $array = explode(" ", $title);
                $year = $yearR;
                $number = $issueR;
                $volume = $volumeR;
                $path = 'public/files/' . $section->link . '/' . $year . '/' . $number . '/' . $volume . '/';

            } else {
                $path = 'public/files/' . $section->link . '/';
            }


//           dd($path);
            $title = $year . ' ' . $number . ' ' . $volume;
            $uploads = Upload::where('title', $title)->get();
            $files = [];
            foreach ($uploads as $upload) {
                $file_path = $path . $upload['filename'];
                $name = $upload['title'];
                $id = $upload['id'];
                $size = Storage::size($file_path);
                $files[] = array('name' => $name, 'size' => $size, 'path' => $file_path, 'id' => $id);
            }
            return response()->json($files);
        }

        public function create(Section $section)
        {
            return view('create', compact('section'));
        }

        public function store(Request $request, Section $section)
        {
            $section->files()->create([
                'title' => $request->get('title'),
            ]);

            return back()->with('message', 'Файл был успешно добавлен');
        }

        public function upload(Request $request, Section $section)
        {
//            dd($section);
            $uploadedFile = $request->file('file');
            $filename = time() . $uploadedFile->getClientOriginalName();
            $title = explode('.', $uploadedFile->getClientOriginalName())[0];

            if ($section->link == "issues") {
                $array = explode(" ", $title);
                $year = $array[0];
                $number = $array[1];
                $volume = $array[2];
                $path = 'public/files/' . $section->link . '/' . $year . '/' . $number . '/' . $volume . '/';


            } else {
                $path = 'public/files/' . $section->link . '/';
            }

            Storage::disk('local')->putFileAs(
                $path,
                $uploadedFile,
                $filename
            );

            $path = $path . $filename;

            $upload = new Upload();
            $upload->filename = $filename;
            $upload->title = $title;
            $upload->path = $path;
            $upload->section()->associate($section);
            $upload->save();

            return response()->json([
                'id' => $upload->id
            ]);
        }

        public function getFile(Upload $file)
        {
            $section = $file->section->link;
            $filename = $file->filename;
            $file = storage_path('app/public/files/' . $section . '/' . $filename);
            return response()->file($file);
        }

        public function getIssue(Upload $file)
        {
            //   dd($file);
            $section = $file->section->link;
            $filename = $file->filename;

            $array = explode(" ", $file->title);
            $year = $array[0];
            $number = $array[1];
            $volume = $array[2];

          // dd($year, $number, $volume);
            $file = storage_path('app/public/files/' . $section . '/' . $year . '/' . $number . '/' . $volume . '/' . $filename);
            return response()->file($file);
        }

        public function destroy(Request $request)
        {
            $file = Upload::where('id', $request->id)->first();
            $link = $file->section->link;
            $filename = $file->filename;
            error_log($filename);
            Upload::where('id', $request->id)->delete();
            unlink(storage_path('app/public/files/' . $link . '/' . $filename));
            $file->delete();
        }
    }

