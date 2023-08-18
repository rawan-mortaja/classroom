<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicRequest;
use App\Models\Scopes\topicsScope;
use App\Models\Topic;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class TopicsController extends Controller
{

    public function index(Request $request): Renderable
    {

        $topics = Topic::orderBy('Created_at', 'DESC')
            ->where('user_id', '=', Auth::id())
            ->withoutGlobalScope(topicsScope::class)
            ->get(); // return collection of topic

        $success = session('success');

        return view('topics.index', compact('topics', 'success'));
    }
    public function create()
    {
        return view('topics.create');
    }


    public function store(TopicRequest $request): RedirectResponse
    {

        $validated = $request->validated();

        $topics = Topic::create($request->all());



        // PRG : Post Redirect Get
        return redirect()->route('topics.index');
    }
    public function show($id)
    {
        $topic = Topic::findOrFail($id);

        // $validated['user_id'] = Auth::user()->id;

        return view('topics.show')
            ->with([
                'topic' => $topic,
            ]);
    }

    public function edit($id)
    {
        $topic = Topic::findOrFail($id);
        return view('topics.edit', [
            'topic' => $topic
        ]);
    }

    public function update(TopicRequest $request, Topic $topic)
    {

        // $topic = Topic::findOrFail($id);

        $validated =  $request->validated();

        // Mass assignment
        $topic->update($validated);

        return Redirect::route('topics.index')
            ->with('success', 'topic updated');
    }

    public function destroy($id)
    {
        $topic = Topic::findOrFail($id);
        $topic->destroy($id);

        //Flash Messages | تعتمد على seesion

        return redirect(route('topics.index'))
            ->with('success', 'Topic deleted');
    }

    public function trashed()
    {
        $topics = topic::onlyTrashed()->latest('deleted_at')->get();
        //onlyTrashed() ; فقط المحذوف(ألموجود بالسلة)
        return view('topics.trashed', compact('topics'));
    }

    public function restore($id)
    {
        $topics = topic::onlyTrashed()->findOrFail($id);
        $topics->restore();

        return redirect()->route('topics.index')->with('success', "topic  ({ $topics->name }) restores");
    }

    public function forceDelete($id)
    {
        $topics = topic::withTrashed()->findOrFail($id);
        //withTrashed() ; المحذوفة و غير محذوفة
        $topics->forceDelete();
        // topic::deleteCoverImage('', '');
        //forceDelete(); حذف بشكل نهائي

        return redirect()->route('topicstrashed');
    }
}
