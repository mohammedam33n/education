<?php

namespace App\DataTables;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ExperienceDataTable extends DataTable
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

            ->addColumn('edit', function ($query) {
                return view('pages.experience.datatable.edit', compact('query'));
            })
            // ->editColumn('from', function ($query) {
            //     return  $query->from->format('Y-m-d');
            // })

            ->addColumn('delete', 'pages.experience.datatable.delete')
            ->editColumn('teacher.name', function ($q) {
                return $q->teacher->name ?? "";
            })
            ->rawColumns(['edit', 'delete', 'name'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Experience $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Experience $model): QueryBuilder
    {
        return $model->select([
            'experiences.id',
            'title',
            'from',
            'to',
            'teacher_id',
        ])->with([
            'teacher' => function ($q) {
                return $q->select([
                    'teachers.id',
                    'teachers.name'
                ]);
            },
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
                    initEditeExperienceModal()
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
            ['name' => 'experiences.id', 'data' => 'id', 'title' => 'رقم الهوية', "className" => 'search--col exact'],

            ['name' => 'title', 'data' => 'title', 'title' => 'الخبرة', "className" => 'search--col'],

            ['name' => 'from', 'data' => 'from', 'title' => 'من ', "className" => 'search--col'],

            ['name' => 'to', 'data' => 'to', 'title' => 'الى', "className" => 'search--col'],

            ['name' => 'teacher.name', 'data' => 'teacher.name', 'title' => ' المعلم', "className" => 'search--col'],

            ['name' => 'edit', 'data' => 'edit', 'title' => 'Edit', 'printable' => false, 'exportable' => false, 'orderable' => false, 'searchable' => false, "className" => 'not--search--col'],
            ['name' => 'delete', 'data' => 'delete', 'title' => 'Delete', 'printable' => false, 'exportable' => false, 'orderable' => false, 'searchable' => false, "className" => 'not--search--col'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Experience_' . date('YmdHis');
    }
}