<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Section $s
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $section = new Section(array('title' => $request->get('title'),
            'description' => $request->get('description'),
        ));

        $section->save();

        return redirect(route('home'))->with('status', 'Раздел успешно добавлен');
    }
    /**
         * Show the form for editing the specified resource.
         *
         * @param Section $section
         * @return \Illuminate\Http\Response
         */
        public function edit(Section $section)
        {
            return view("admin.sections.edit", compact('section'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param Section $section
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Section $section)
        {
            $section->title = $request->get('title');
            $section->description = $request->get('description');
            $section->save();

            return redirect()
                ->route('sections.show', $section->link)
                ->with(['success' => 'Успешно сохранено']);
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            //
        }
}
