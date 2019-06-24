<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreClientsRequest;
use App\Http\Requests\Admin\UpdateClientsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Yajra\DataTables\DataTables;

class ClientsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Client.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('client_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Client::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('client_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'clients.id',
                'clients.client_name',
                'clients.client_address',
                'clients.client_gstin',
                'clients.client_emailid',
                'clients.client_mobileno',
                'clients.payment_status',
                'clients.upload_file',
                'clients.start_date',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'client_';
                $routeKey = 'admin.clients';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('client_name', function ($row) {
                return $row->client_name ? $row->client_name : '';
            });
            $table->editColumn('client_address', function ($row) {
                return $row->client_address ? $row->client_address : '';
            });
            $table->editColumn('client_gstin', function ($row) {
                return $row->client_gstin ? $row->client_gstin : '';
            });
            $table->editColumn('client_emailid', function ($row) {
                return $row->client_emailid ? $row->client_emailid : '';
            });
            $table->editColumn('client_mobileno', function ($row) {
                return $row->client_mobileno ? $row->client_mobileno : '';
            });
            $table->editColumn('payment_status', function ($row) {
                return $row->payment_status ? $row->payment_status : '';
            });
            $table->editColumn('upload_file', function ($row) {
                if($row->upload_file) { return '<a href="'.asset(env('UPLOAD_PATH').'/'.$row->upload_file) .'" target="_blank">Download file</a>'; };
            });
            $table->editColumn('start_date', function ($row) {
                return $row->start_date ? $row->start_date : '';
            });

            $table->rawColumns(['actions','massDelete','upload_file']);

            return $table->make(true);
        }

        return view('admin.clients.index');
    }

    /**
     * Show the form for creating new Client.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('client_create')) {
            return abort(401);
        }
        return view('admin.clients.create');
    }

    /**
     * Store a newly created Client in storage.
     *
     * @param  \App\Http\Requests\StoreClientsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientsRequest $request)
    {
        if (! Gate::allows('client_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $client = Client::create($request->all());



        return redirect()->route('admin.clients.index');
    }


    /**
     * Show the form for editing Client.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('client_edit')) {
            return abort(401);
        }
        $client = Client::findOrFail($id);

        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update Client in storage.
     *
     * @param  \App\Http\Requests\UpdateClientsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientsRequest $request, $id)
    {
        if (! Gate::allows('client_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $client = Client::findOrFail($id);
        $client->update($request->all());



        return redirect()->route('admin.clients.index');
    }


    /**
     * Display Client.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('client_view')) {
            return abort(401);
        }
        $client = Client::findOrFail($id);

        return view('admin.clients.show', compact('client'));
    }


    /**
     * Remove Client from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('client_delete')) {
            return abort(401);
        }
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('admin.clients.index');
    }

    /**
     * Delete all selected Client at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('client_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Client::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Client from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('client_delete')) {
            return abort(401);
        }
        $client = Client::onlyTrashed()->findOrFail($id);
        $client->restore();

        return redirect()->route('admin.clients.index');
    }

    /**
     * Permanently delete Client from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('client_delete')) {
            return abort(401);
        }
        $client = Client::onlyTrashed()->findOrFail($id);
        $client->forceDelete();

        return redirect()->route('admin.clients.index');
    }
}
