``` bash

#Column
$this->crud->addColumn($single_array); // tambah single kolom pada table view
$this->crud->addColumns([$kolom_1, $kolom_2]);  // tambah multiple kolom pada table view
$this->crud->modifyColumn($column_name, $modif_array);
$this->crud->removeColumn('column_name'); // hapus kolom
$this->crud->removeColumns(['column_name_1', 'column_name_2']); // hapus multiple kolom
$this->crud->setColumnDetails('column_name', ['attribute' => 'value']);
$this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);

#Button
// posisi button: 'beginning' and 'end'; defaults to 'beginning' for the 'line' stack, 'end' for the others;
$this->crud->addButton($stack, $name, $type, $content, $posisi);
$this->crud->addButtonFromModelFunction($stack, $name, $model_function_name, $posisi); // button pada model function
$this->crud->addButtonFromView($stack, $name, $view, $posisi); // tambahkan button pada resources\views\vendor\starmoozie\crud\buttons
$this->crud->removeButton($name);
$this->crud->removeButtonFromStack($name, $stack);

# Filter
$this->crud->addFilter($filter_array_column, $value, $filter_logic);

#Details Row
$this->crud->enableDetailsRow();

#Export
$this->crud->enableExportButtons();

# Responsive table
$this->crud->disableResponsiveTable(); // default sudah responsive

# Query
$this->crud->addClause('active'); // apply local scope
$this->crud->addClause('tipe', 'mobil');
$this->crud->addClause('where', 'nama', '=', 'mobil');
$this->crud->addClause('whereNama', 'mobile');
$this->crud->addClause('whereHas', 'comment', function($query) {
     $query->activeComments();
 });
$this->crud->groupBy();
$this->crud->limit();
$this->crud->orderBy();

```