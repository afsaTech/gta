<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\TopNotchDestinationRequest as TopNotchRequest;
use App\Models\TopNotchDestination;
use Illuminate\Support\Str;

class TopNotchDestinationController extends Controller
{
    /**
     * Display a listing of the top notch destinations.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topNotchDestinations = TopNotchDestination::all();

        return view(config('system.paths.backend.page') . 'topnotchdestinations.index')->with('tnds', $topNotchDestinations);
    }

    /**
     * Display the create form for the top notch destination.
     *
     * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view(config('system.paths.backend.page') . 'topnotchdestinations.create');
    }

    /**
     * Store a new top notch destination.
     *
     * @param  \App\Http\Requests\TopNotchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TopNotchRequest $request, TopNotchDestination $topNotchDestination)
    {
        $validated = $request->validated();
        $image_url = $this->storeImages($request, $topNotchDestination);

        $topNotchDestination = TopNotchDestination::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'location' => $validated['location'],
            'rating' => $validated['rating'],
            'image_url' => $image_url,
        ]);

        return redirect()->route('top-notch-destinations.index')->withSuccess(__('Premier pick created successfully.'));
    }

    /**
     * Display the specified top notch destination.
     *
     * @param  \App\Models\TopNotchDestination  $topNotchDestination
     * @return \Illuminate\Http\Response
     */
    public function show(TopNotchDestination $topNotchDestination)
    {
        return view(config('system.paths.backend.page') . 'topnotchdestinations.show')->with('tnd', $topNotchDestination);
    }

    /**
     * Shows the editing form for the top notch destination.
     *
     * @param  \App\Models\TopNotchDestination  $topNotchDestination
     * @return \Illuminate\Http\Response
     */
    public function edit(TopNotchDestination $topNotchDestination)
    {
        return view(config('system.paths.backend.page') . 'topnotchdestinations.edit')->with('tnd', $topNotchDestination);
    }

    /**
     * Update the specified top notch destination.
     *
     * @param  \App\Http\Requests\TopNotchRequest  $request
     * @param  \App\Models\TopNotchDestination  $topNotchDestination
     * @return \Illuminate\Http\Response
     */
    public function update(TopNotchRequest $request, TopNotchDestination $topNotchDestination)
    {
        $validated = $request->validated();

        $image_url = $request->fileValidator($request, $topNotchDestination);

        $topNotchDestination->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'location' => $validated['location'],
            'rating' => $validated['rating'],
            'image_url' => $image_url,
        ]);

        return redirect()->route('top-notch-destinations.index')->withSuccess(__('Premier pick updated successfully.'));
    }

    /**
     * Remove the specified top notch destination.
     *
     * @param  \App\Models\TopNotchDestination  $topNotchDestination
     * @return \Illuminate\Http\Response
     */
    public function destroy(TopNotchDestination $topNotchDestination)
    {
        $topNotchDestination->delete();

        return redirect()->route('top-notch-destinations.index')->withSuccess(__('Premier pick deleted successfully.'));
    }

    /**
     * Remove the specified resource from the database permanently.
    */
    public function forceDelete(TopNotchDestination $topNotchDestination)
    {
        // Get the image URL from the DB
        $imageUrl = $topNotchDestination->image_url;
        $msg = "";

        // Delete the image file from the storage folder
        if(Storage::disk('public')->delete($imageUrl)) {
            // Delete the image record from the DB
            $topNotchDestination->forceDelete();   
            
            $msg = redirect()->route('top-notch-destinations.index')->withSuccess(__('Premier pick deleted successfully.'));
         } else {
            $msg = redirect()->route('top-notch-destinations.index')->withErrors(__('Premier pick deletion unsuccessful'));
         }   
         
         return $msg;
    }

    /**
     * Store the images associated with the topnotchdestination.
     */
    protected function storeImages($request, $topNotchDestination)
    {
        if ($request->hasFile('image_url')) {

                $image = $request->file('image_url');

                // Generate a unique name for the image using timestamp and UUID
                $imageName = now()->timestamp . '_' . Str::uuid()->toString() . '.' . $image->getClientOriginalExtension();

                // Store the image in the specified folder
                $image_url = $image->storeAs('tnd/images', $imageName, 'public');
        }
        
        return $image_url ?? null;
    }
}