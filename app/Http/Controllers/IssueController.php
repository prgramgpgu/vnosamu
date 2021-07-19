<?php

    namespace App\Http\Controllers;

    use App\Models\Issue;
    use App\Models\Section;
    use Illuminate\Http\Request;
    use phpDocumentor\Reflection\Types\Integer;

    class IssueController extends Controller
    {
        public function index(Section $section)
        {
//        dd(isset($section));
            if ($section->link != "issues") abort(404);
            return view('issues.index', compact('section'));
        }

        public function create($section, $year)
        {
//        dd($year);
//            $issue = (new Issue())->save();
            return view('admin.issues.create', compact('year'));
        }

        public function store()
        {
            dd('store');
        }
    }

