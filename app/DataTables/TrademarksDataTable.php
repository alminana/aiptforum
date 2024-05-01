<?php

namespace App\DataTables;

use App\Models\TradeMarkTicket;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TrademarksDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
        ->order(function($query){
            $query->orderBy('created_at', 'desc');
            })->addIndexColumn()
            ->addColumn('action', function ($trademark) {      
        $btn = "<a href='javascript:void(0);' data-toggle='modal' 
                data-id=''.$trademark->id.'' data-original-title='Edit' 
                id='edit-user' data-target='#edittrademarkModal'
                class='btn btn-primary edit-user pr-4'>
                <span class='fa fa-pencil'></span></a>";
                $btn .= '<a href="javascript:void(0);" id="view-trademark" 
                data-toggle="modal" data-original-title="View"
        data-target="#viewtrademarkModal"
                data-id="'.$trademark->id.'" class="btn btn-info bolded">
                <i class="fa fa-eye" ></i></a>';
                $btn .= '<a href="javascript:void(0);" id="delete-trademark" 
                data-toggle="modal" data-original-title="Delete" 
        data-target="#deletetrademarkModal"
                data-id="'.$trademark->id.'" class="btn btn-danger pr-4"">
                <span class="fa fa-trash" ></span></a>';
                return $btn;
            })->addColumn('checkbox', function ($trademark) {
                $checkBox = '<input type="checkbox" id="'.$utrademarkser->id.'"/>';
                return $checkBox;
            })->rawColumns(['action', 'checkbox']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\TrademarksDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TrademarksDataTable $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('trademarksdatatable-table')
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
        return 'Trademarks_' . date('YmdHis');
    }
}
