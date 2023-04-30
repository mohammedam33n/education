<?php

namespace App\DataTables;

use App\Models\GroupType;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Services\DataTable;

class GroupTypeDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            // ->addColumn('edit', 'pages.student.datatable.edit')
            ->addColumn('edit', function ($query) {
                return view('pages.groupType.datatable.edit', compact('query'));
            })
            ->addColumn('delete', 'pages.groupType.datatable.delete')
            ->editColumn('name', function ($q) {

                return "<a class='text-primary' href=" . route('admin.group_types.show', $q->id) . " title='Enter Page show Group Type' >" . $q->name . "</a>";
            })
            ->rawColumns(['edit', 'delete', 'name'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\GroupType $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(GroupType $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('product-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'dom'          => 'Blrtip',
                'lengthMenu'   => [[10, 25, 50, -1], [10, 25, 50, 'All records']],
                'buttons'      => [
                    ['extend' => 'print', 'className' => 'btn btn-primary mr-5px', 'text' => 'Print'],
                    ['extend' => 'excel', 'className' => 'btn btn-success ', 'text' => 'Export'],
                ],
                'order' => [
                    0, 'desc'
                ],
                'scrollX' => true,
                'initComplete' => "function() {
                this.api().columns().every(function(){
                    var column = this;
                    var exact = $(column.header()).hasClass('exact')
                    var input = document.createElement(\"input\")
                    input.style.width = column.header().style.width
                    $(input).appendTo($(column.footer()).empty())
                    .on('keyup change clear',function(){
                        if(exact)
                        {
                            var val = $(this).val()
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        }
                        else
                        {
                            column.search($(this).val() , false, false, true).draw()
                        }
                    })

                    if($(column.header()).hasClass('not--search--col'))
                    {
                        $(column.footer()).empty()
                    }
                })
            }",
                "fnDrawCallback" => "function( oSettings ) {
                refreshAllTableLinks()
                initEditeGroupTypeModal()
            }",

            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            [
                'name' => 'id',
                'data' => 'id',
                'title' => __('group.id'),
                "className" => 'search--col exact'
            ],

            [
                'name' => 'name',
                'data' => 'name',
                'title' =>  __('group.name'),
                "className" => 'search--col'
            ],

            [
                'name' => 'price',
                'data' => 'price',
                'title' => __('group.price'),
                "className" => 'search--col'
            ],

            [
                'name' => 'days_num',
                'data' => 'days_num',
                'title' =>  __('group.days_num'),
                "className" => 'search--col'
            ],

            ['name' => 'edit', 'data' => 'edit', 'title' =>  __('globalWorld.Edit'), 'printable' => false, 'exportable' => false, 'orderable' => false, 'searchable' => false, "className" => 'not--search--col'],


            [
                'name' => 'delete',
                'data' => 'delete',
                'title' =>  __('globalWorld.Delete'),
                'printable' => false, 'exportable' => false, 'orderable' => false, 'searchable' => false, "className" => 'not--search--col'
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'GroupType_' . date('YmdHis');
    }
}