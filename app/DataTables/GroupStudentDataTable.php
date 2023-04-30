<?php

namespace App\DataTables;

use App\Models\GroupStudent;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Services\DataTable;

class GroupStudentDataTable extends DataTable
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

            ->addColumn('delete', 'pages.groupStudent.datatable.delete')
            ->editColumn('student.name', function ($q) {
                return $q->student->name ?? "";
            })
            ->editColumn('group.from', function ($q) {
                return $q->group->from ? $q->group->from . " - " . $q->group->to : '';
            })
            ->rawColumns(['delete'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\GroupStudent $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(GroupStudent $model): QueryBuilder
    {
        return $model->select([
            'group_students.id',
            'student_id',
            'group_id'
        ])->with([
            'student:id,name',
            'group:id,from,to'
        ]);
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
                'name' => 'group_students.id',
                'data' => 'id',
                'title' => __('group.id'),
                "className" => 'search--col exact'
            ],

            [
                'name' => 'student.name',
                'data' => 'student.name',
                'title' =>  __('group.student_id'),
                "className" => 'search--col'
            ],

            [
                'name' => 'group.from',
                'data' => 'group.from',
                'title' =>  __('group.Groups'),
                "className" => 'search--col'
            ],

            // [
            //     'name' => 'edit',
            //     'data' => 'edit',
            //     'title' => 'Edit',
            //     'printable' => false,
            //     'exportable' => false,
            //     'orderable' => false,
            //     'searchable' => false,
            //     "className" => 'not--search--col'
            // ],

            [
                'name' => 'delete',
                'data' => 'delete',
                'title' => __('globalWorld.Delete'),
                'printable' => false,
                'exportable' => false,
                'orderable' => false,
                'searchable' => false,
                "className" => 'not--search--col'
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
        return 'GroupStudent_' . date('YmdHis');
    }
}