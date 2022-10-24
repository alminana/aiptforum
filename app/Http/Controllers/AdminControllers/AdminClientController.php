<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Validation\Rule;
class AdminClientController extends Controller
{
    private $rules = [
        'name' => 'required',
        'country' => 'required',
        'type' => 'required',
    ];
   
    public function index(Request $request)
    {  
        $clients = Client::latest()->take(1000)->get();

        if ($request->has('search')) {
            $clients = Client::where('name', 'like', "%{$request->search}%")
            ->paginate(10);
        }
        
        return view('admin_dashboard.client.index',compact('clients'));
    }

    public function create()
    {
        $clients = Client::latest()->take(1000)->get();        
        return view('admin_dashboard.client.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        $clients = Client::latest()->take(1000)->get();
        Client::create($validated);
        return redirect()->route('admin.clients.index')->with('success', 'Client has been Created.');
    }

    public function edit(Client $client)
    {
        return view('admin_dashboard.client.edit', [
            'client' => $client
        ]);
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate($this->rules);
        
        $client->update($validated);
        
        return redirect()->route('admin.clients.index', $client)->with('success', 'Client has been updated');
    }

    public function destroy(Client $client)
    {
      
        $client->delete();

        return redirect()->route('admin.clients.index')->with('success', 'Client has been Deleted.');
    }
}
