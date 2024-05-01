<?php
namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
        ->order(function($query){
               $query->orderBy('created_at', 'desc');
        })->addIndexColumn()
        ->addColumn('action', function ($user) {      
      $btn = "<a href='javascript:void(0);' data-toggle='modal' 
            data-id=''.$user->id.'' data-original-title='Edit' 
            id='edit-user' data-target='#editUserModal'
              class='btn btn-primary edit-user pr-4'>
             <span class='fa fa-pencil'></span></a>";
           $btn .= '<a href="javascript:void(0);" id="view-user" 
           data-toggle="modal" data-original-title="View"
 data-target="#viewUserModal"
            data-id="'.$user->id.'" class="btn btn-info bolded">
           <i class="fa fa-eye" ></i></a>';
            $btn .= '<a href="javascript:void(0);" id="delete-user" 
            data-toggle="modal" data-original-title="Delete" 
data-target="#deleteUserModal"
             data-id="'.$user->id.'" class="btn btn-danger pr-4"">
            <span class="fa fa-trash" ></span></a>';
           return $btn;
        })->addColumn('checkbox', function ($user) {
              $checkBox = '<input type="checkbox" id="'.$user->id.'"/>';
             return $checkBox;
        })->rawColumns(['action', 'checkbox']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery()->select('*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('usersdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('add your columns'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
}    