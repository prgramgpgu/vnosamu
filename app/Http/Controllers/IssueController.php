<?php

    namespace App\Http\Controllers;

    use App\Models\Issue;
    use App\Models\Section;
    use App\Models\Upload;
    use Illuminate\Http\Request;
    use phpDocumentor\Reflection\Types\Integer;

    class IssueController extends Controller
    {
        public function index(Section $section, $year)
        {
            $issues = Issue::where('year', $year)->get();


           $uploads = Upload::where('section_id', $section->id)->get();
           $files = [];
           foreach ($uploads as $upload) {
               $y = explode( " ", $upload->title)[0];
               if ($y == $year)
                   array_push($files, $upload);
           }
//            sort($issues);
            sort($files);
          // dd($issues);

            if ($section->link != "issues") abort(404);
            return view('issues.index', compact('section', 'issues', 'year', 'issues', 'files'));
        }

        public function show(Section $section, $year)
        {
            $issues = Issue::where('year', $year)->get();
            dd($issues);
            if ($section->link != "issues") abort(404);
            return view('issues.index', compact('section'));
        }


        public function create($section, $year)
        {
//        dd($year);
//            $issue = (new Issue())->save();
            return view('admin.issues.create', compact('year'));
        }

        public function store(Request $request)
        {
           // dd($request);
            $issue = new Issue(array('title' => $request->get('title'),
                'year' => $request->get('year'),
                'issue' => $request->get('issue'),
                'number_of_pages' => $request->get('number_of_pages'),
                'issn' => $request->get('issn'),
                'issn' => $request->get('issn'),
                'volume' => $request->get('volume'),
                'number_of_volumes' => $request->get('number_of_volumes'),
            ));

            $issue->save();

            return redirect(route('home'))->with('issues.index', 'Журнал успешно добавлен');
        }

        public function edit($section, $year, $issue )
        {
            //dd($section, $year, $issue);
            $magazine = Issue::where('year', $year)->where('issue', $issue)->first();
            //dd($magazine);
            return view("admin.issues.edit", compact( 'section', 'magazine'));
        }

        public function update(Issue $issue, Request $request)
        {
           // dd($issue);
            $issue->title = $request->get('title');
            $issue->year = $request->get('year');
            $issue->issue = $request->get('issue');
            $issue->number_of_pages = $request->get('number_of_pages');
            $issue->issn = $request->get('issn');
            $issue->volume = $request->get('volume');
            $issue->number_of_volumes = $request->get('number_of_volumes');

            $issue->save();

//            return redirect()
//                ->route('sections.show', $section->link)
//                ->with(['success' => 'Успешно сохранено']);
        }
    }

